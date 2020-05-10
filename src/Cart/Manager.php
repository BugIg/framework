<?php

namespace AvoRed\Framework\Cart;

use Illuminate\Support\Collection;
use Illuminate\Session\SessionManager;
use AvoRed\Framework\Catalog\Models\Product;

class Manager
{
    /**
     * Cart Product collection.
     * @var \Illuminate\Support\Collection
     */
    protected $cartCollection;

    /**
     * AvoRed Cart Session Manager.
     * @var \Illuminate\Session\SessionManager
     */
    public $sessionManager;

    /**
     * Cart Manager Construct.
     * @var \Illuminate\Session\SessionManager
     */
    public function __construct(SessionManager $manager)
    {
        $this->sessionManager = $manager;
        $this->cartCollection = $this->getSession();
    }

    
    /**
     * Destroy Product from Cart By Given Slug.
     * @param string $slug
     * @return self
     */
    public function destroy(string $slug)
    {
        $this->cartCollection->pull($slug);
        return $this;
    }
    /**
     * update Product from Cart By Given Slug.
     * @param string $slug
     * @return self
     */
    public function update(string $slug, $qty)
    {
        $product = $this->cartCollection->get($slug);
        $product->qty($qty);

        $this->cartCollection->put($slug, $product);
        $this->updateSessionCollection();
        return $this;
    }
    /**
     * Add Product to Cart By Given Slug.
     * @param string $slug
     * @param int $qty
     * @param array $attributes
     * @return array
     */
    public function add(string $slug, $qty = 1, $attributes = [])
    {
        $status = false;
        $message = '';
        $product = Product::slug($slug);
        $cartProduct = $this->createCartProductFromProduct($product);
        $cartProduct->qty($qty);

        $this->cartCollection->put($slug, $cartProduct);
        $this->updateSessionCollection();
        $status = true;
        $message = __('avored-admin::catalog.cart_success_notification');
        

        return [$status, $message];
    }

    /**
     * Create Cart Product From slug.
     * @param \AvoRed\Framework\Database\Models\Product $product
     * @param mixed $attributes
     * @return \AvoRed\Framework\Cart\CartProduct $cartProduct
     */
    public function createCartProductFromProduct(Product $product, $attributes = null): CartProduct
    {
        $cartProduct = new CartProduct;

        $cartProduct->name($product->name)
            ->id($product->id)
            ->slug($product->slug)
            ->price($product->price)
            ->attributes($attributes ?? [])
            ->image($product->main_image_url);

        return $cartProduct;
    }

    /**
     * Clear the All Cart Products.
     * @return void
     */
    public function clear()
    {
        $this->sessionManager->forget($this->getSessionKey());
    }

    /**
     * Get the Current Collection for the Prophetoducts.
     * @return \Illuminate\Support\Collection
     */
    public function getSession()
    {
        $sessionKey = $this->getSessionKey();
        if ($this->sessionManager->has($sessionKey)) {
            return $this->sessionManager->get($sessionKey);
        } else {
            return new Collection;
        }
    }

    /**
     * Get the Session Key for the Session Manager.
     * @return string $sessionKey
     */
    public function getSessionKey()
    {
        return config('avored.cart.session_key') ?? 'cart_products';
    }

    /**
     * Update the Session Collection.
     * @return self $this
     */
    protected function updateSessionCollection()
    {
        $this->sessionManager->put($this->getSessionKey(), $this->cartCollection);

        return $this;
    }

    /**
     * Get the List of All the Current Session Cart Products.
     * @return \Illuminate\Support\Collection
     */
    public function all()
    {
        return $this->getSession();
    }

    /**
     * Get the List of All the Current Session Cart Products.
     * @return \Illuminate\Support\Collection
     */
    public function toArray()
    {
        $products = $this->all();
        $items = Collection::make([]);
        foreach ($products as $product) {
            $items->push([
                'slug' => $product->slug(),
                'image' => $product->image(),
                'price' => $product->price(),
                'qty' => $product->qty(),
                'name' => $product->name(),
                'attributes' => $product->attributes(),
            ]);
        }

        return $items;
    }

    /**
     * Get the List of All the Current Session Cart Products.
     * @return mixed $cartTotal
     */
    public function total($format = true)
    {
        $products = $this->all();
        $total = 0;
        foreach ($products as $product) {
            $total += $product->total();
        }
        $total = $total;

        if ($format === true) {
            return number_format($total, 2);
        }

        return $total;
    }

    /**
     * Get the Total Number of Products into the Cart.
     * @return int $count
     */
    public function count()
    {
        return $this->getSession()->count();
    }
}
