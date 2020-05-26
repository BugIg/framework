<?php

namespace AvoRed\Framework\Order\GraphQL\Mutations;

use AvoRed\Framework\Order\Models\Order;
use AvoRed\Framework\Order\Models\OrderProduct;
use AvoRed\Framework\Order\Models\OrderStatus;
use AvoRed\Framework\Support\Facades\Cart;
use AvoRed\Framework\Support\Facades\Payment;
use AvoRed\Framework\System\Models\Currency;
use AvoRed\Framework\User\Models\Address;
use AvoRed\Framework\User\Models\User;
use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class PlaceOrder
{
    /**
     * Return a value for the field.
     *
     * @param  null  $rootValue Usually contains the result returned from the parent field. In this case, it is always `null`.
     * @param  mixed[]  $args The arguments that were passed into the field.
     * @param  \Nuwave\Lighthouse\Support\Contracts\GraphQLContext  $context Arbitrary data that is shared between all fields of a single query.
     * @param  \GraphQL\Type\Definition\ResolveInfo  $resolveInfo Information about the query itself, such as the execution state, the field name, path to the field from the root, and more.
     * @return mixed
     */
    public function __invoke($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $this->user($args);
        $this->shippingAddress($args);
        $this->billingAddress($args);
        $this->paymentOption($args);
        $this->orderStatus();

        $orderData = [
            'shipping_option' => $args['shipping_option'],
            'payment_option' => $args['payment_option'],
            'order_status_id' => $this->orderStatus->id,
            'currency_id' => $this->getCurrency()->id,
            'user_id' => $this->user->id,
            'shipping_address_id' => $this->shippingAddress->id,
            'billing_address_id' => $this->billingAddress->id,
        ];
        $order = Order::create($orderData);
        $this->syncProducts($order, $args);
        Cart::clear();

        return $order;
    }

    /**
     * Create/Get User to placed an Order.
     * @return self
     */
    public function user($args)
    {
        if (Auth::check()) {
            $this->user = Auth::user();
        } else {
            $email = $args['user']['email'];
            $this->user = User::whereEmail($email)->first();

            if ($this->user === null) {
                $userData = $args['user'];
                $userData['password'] = Hash::make($args['user']['password']);
                $this->user = User::create($userData);
            }
        }

        return $this;
    }

    /**
     * Create/Get User to placed an Order.
     * @return \AvoRed\Framework\Database\Models\Address $addressModel
     */
    public function shippingAddress($args)
    {
        $addressData = $args['shipping'];

        if (isset($addressData['address_id'])) {
            $this->shippingAddress = Address::find($addressData['address_id']);

            return $this;
        }
        $addressData['type'] = 'SHIPPING';
        $addressData['user_id'] = $this->user->id;

        $this->shippingAddress = Address::create($addressData);

        return $this;
    }

    /**
     * Create/Get User to placed an Order.
     * @return \AvoRed\Framework\Database\Models\Address $addressModel
     */
    public function billingAddress($args)
    {
        $addressData = $args['billing'];

        if (isset($addressData['address_id'])) {
            $this->billingAddress = Address::find($addressData['address_id']);

            return $this;
        }

        //@todo fix
        $flag = $args['use_different_address'] ?? true;

        if ($flag == 'true') {
            $addressData['type'] = 'BILLING';
            $addressData['user_id'] = $this->user->id;

            $this->billingAddress = Address::create($addressData);
        } else {
            $this->billingAddress = Address::create($this->billingAddress->toArray());
        }

        return $this;
    }

    /**
     * Set Default Order Status Model.
     * @return \AvoRed\Framework\Database\Models\Address $addressModel
     */
    public function orderStatus()
    {
        $this->orderStatus = OrderStatus::where('is_default', true)->first();
    }

    /**
     * check and process payment option
     */
    public function paymentOption($args)
    {
        $payment = Payment::get($args['payment_option']);
        $payment->process();
    }

    /**
     * Successfull Page Display.
     * @param \AvoRed\Framework\Database\Models\Order $order
     * @return \Illuminate\Response\Renderable
     */
    public function successful(Order $oder)
    {
        return view('order.successful');
    }

    /**
     * Get the current default currency from session.
     * @return \AvoRed\Framework\Database\Models\Currency
     */
    protected function getCurrency(): Currency
    {
        //@todo fix
        return Currency::first();
        // return session()->get('default_currency');
    }

    /**
     * Sync Products and Attributes with Order Tables.
     * @param \AvoRed\Framework\Database\Models\Order $order
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    private function syncProducts(Order $order, $request)
    {
        $cartProducts = Cart::all();

        foreach ($cartProducts as $cartProduct) {
            $orderProductData = [
                'product_id' => $cartProduct->id(),
                'order_id' => $order->id,
                'qty' => $cartProduct->qty(),
                'price' => $cartProduct->price(),
                'tax_amount' => $cartProduct->taxAmount(),
            ];
            $orderProductModel = OrderProduct::create($orderProductData);

            $attributes = $cartProduct->attributes();

            if ($attributes !== null && count($attributes) > 0) {
                foreach ($attributes as $attribute) {
                    $orderProductAttributeData = [
                        'order_product_id' => $orderProductModel->id,
                        'attribute_id' => $attribute['attribute_id'],
                        'attribute_dropdown_option_id' => $attribute['attribute_dropdown_option_id'],
                    ];
                    OrderProduct::create($orderProductAttributeData);
                }
            }
        }
    }
   
}
