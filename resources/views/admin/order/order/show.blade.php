@extends('avored-admin::layouts.admin')

@section('pageTitle')
    {{ __('avored-admin::system.terms.order') . ' '  . __('avored-admin::system.comms.view')}}
@endsection


@section('content')

    <div class="w-full mx-auto px-4 sm:px-6 md:px-8">
        <div class="py-4 flex">
            <div class="w-1/3 p-6 border border-gray-200 shadow-md">
                

                <h3 class="text-md font-semibold mt-5  text-center">
                    Order Information
                </h3>
               
                <div class="text-gray-600 flex mt-3">
                    <span class="w-1/2">{{ __('avored-admin::system.terms.order') }}:</span>
                    <span class="w-1/2">#{{ $order->id }}</span>
                </div>
                <div class="text-gray-600 flex mt-3">
                    <span class="w-1/2">{{ __('avored-admin::system.comms.created_at') }}:</span>
                    <span class="w-1/2">{{ $order->created_at->format('d-m-Y') }}</span>
                </div>
                <div class="text-gray-600 flex mt-3">
                    <span class="w-1/2">{{ __('avored-admin::system.comms.status') }}:</span>
                    <span class="w-1/2">{{ $order->orderStatus->name }}</span>
                </div>


                <h3 class="text-md font-semibold mt-5 text-center">
                    Customer Information
                </h3>
                <div class="mt-3">
                    <span class="w-1/2">{{ __('avored-admin::system.comms.first_name') }}:</span>
                    <span class="w-1/2">{{ $order->user->first_name }}</span>
                </div>
                <div class="mt-3">
                    <span class="w-1/2">{{ __('avored-admin::system.comms.last_name') }}:</span>
                    <span class="w-1/2">{{ $order->user->last_name }}</span>
                </div>
                <div class="mt-3">
                    <span class="w-1/2">{{ __('avored-admin::system.comms.email') }}:</span>
                    <span class="w-1/2">{{ $order->user->email }}</span>
                </div>

                <h3 class="text-md font-semibold mt-5 text-center">
                    User Shipping Information
                </h3>
                
                <div class="mt-3">
                    <span class="w-1/2">{{ __('avored-admin::system.comms.first_name') }}:</span>
                    <span class="w-1/2">{{ $order->shippingAddress->first_name }}</span>
                </div>
                <div class="mt-3">
                    <span class="w-1/2">{{ __('avored-admin::system.comms.last_name') }}:</span>
                    <span class="w-1/2">{{ $order->shippingAddress->last_name }}</span>
                </div>
                
                <div class="mt-3">
                    <span class="w-1/2">{{ __('avored-admin::system.comms.phone') }}:</span>
                    <span class="w-1/2">{{ $order->shippingAddress->phone }}</span>
                </div>
                
                <div class="mt-3">
                    <span class="w-1/2">{{ __('avored-admin::system.comms.company_name') }}:</span>
                    <span class="w-1/2">{{ $order->shippingAddress->company_name }}</span>
                </div>
                
                <div class="mt-3">
                    <span class="w-1/2">{{ __('avored-admin::system.comms.address1') }}:</span>
                    <span class="w-1/2">{{ $order->shippingAddress->address1 }}</span>
                </div>
                
                <div class="mt-3">
                    <span class="w-1/2">{{ __('avored-admin::system.comms.address2') }}:</span>
                    <span class="w-1/2">{{ $order->shippingAddress->address2 }}</span>
                </div>
                
                <div class="mt-3">
                    <span class="w-1/2">{{ __('avored-admin::system.comms.city') }}:</span>
                    <span class="w-1/2">{{ $order->shippingAddress->city }}</span>
                </div>
                
                <div class="mt-3">
                    <span class="w-1/2">{{ __('avored-admin::system.comms.state') }}:</span>
                    <span class="w-1/2">{{ $order->shippingAddress->state }}</span>
                </div>
                
                <div class="mt-3">
                    <span class="w-1/2">{{ __('avored-admin::system.comms.postcode') }}:</span>
                    <span class="w-1/2">{{ $order->shippingAddress->postcode }}</span>
                </div>

                <div class="mt-3">
                    <span class="w-1/2">{{ __('avored-admin::system.comms.country') }}:</span>
                    <span class="w-1/2">{{ $order->shippingAddress->country->name ?? '' }}</span>
                </div>
                

                <h3 class="text-md font-semibold mt-5 text-center">
                    User Billing Information
                </h3>
                
                <div class="mt-3">
                    <span class="w-1/2">{{ __('avored-admin::system.comms.first_name') }}:</span>
                    <span class="w-1/2">{{ $order->billingAddress->first_name }}</span>
                </div>
                <div class="mt-3">
                    <span class="w-1/2">{{ __('avored-admin::system.comms.last_name') }}:</span>
                    <span class="w-1/2">{{ $order->billingAddress->last_name }}</span>
                </div>
                
                <div class="mt-3">
                    <span class="w-1/2">{{ __('avored-admin::system.comms.phone') }}:</span>
                    <span class="w-1/2">{{ $order->billingAddress->phone }}</span>
                </div>
                
                <div class="mt-3">
                    <span class="w-1/2">{{ __('avored-admin::system.comms.company_name') }}:</span>
                    <span class="w-1/2">{{ $order->billingAddress->company_name }}</span>
                </div>
                
                <div class="mt-3">
                    <span class="w-1/2">{{ __('avored-admin::system.comms.address1') }}:</span>
                    <span class="w-1/2">{{ $order->billingAddress->address1 }}</span>
                </div>
                
                <div class="mt-3">
                    <span class="w-1/2">{{ __('avored-admin::system.comms.address2') }}:</span>
                    <span class="w-1/2">{{ $order->billingAddress->address2 }}</span>
                </div>
                
                <div class="mt-3">
                    <span class="w-1/2">{{ __('avored-admin::system.comms.city') }}:</span>
                    <span class="w-1/2">{{ $order->billingAddress->city }}</span>
                </div>
                
                <div class="mt-3">
                    <span class="w-1/2">{{ __('avored-admin::system.comms.state') }}:</span>
                    <span class="w-1/2">{{ $order->billingAddress->state }}</span>
                </div>
                
                <div class="mt-3">
                    <span class="w-1/2">{{ __('avored-admin::system.comms.postcode') }}:</span>
                    <span class="w-1/2">{{ $order->billingAddress->postcode }}</span>
                </div>

                <div class="mt-3">
                    <span class="w-1/2">{{ __('avored-admin::system.comms.country') }}:</span>
                    <span class="w-1/2">{{ $order->billingAddress->country->name ?? '' }}</span>
                </div>



            </div>
            

            <div class="w-2/3 p-6 ml-3 border  border-gray-200">


                <h3 class="font-semibold mt-5  text-center">
                    Order Product List
                </h3>
                <div class="flex mt-6 font-semibold border-b border-gray-200 pb-5">
                    <div class="w-9/12">
                        Name
                    </div>
                    <div class="w-24 text-right">
                        Qty
                    </div>
                    <div class="w-40 text-right">
                        Price
                    </div>
                    <div class="w-40 text-right">
                        LineTotal
                    </div>
                </div>
                <div class="mt-5 flex">
                    @foreach ($order->products as $cartItem)
                        
                        <div class="w-9/12">
                            {{ $cartItem->product->name }}
                        </div>
                        <div class="w-24 text-right">
                            {{ $cartItem->qty }}
                        </div>
                        <div class="w-40 text-right">
                            ${{ number_format($cartItem->price, 2) }}
                        </div>
                        <div class="w-40 text-right">
                            ${{ number_format($cartItem->price * $cartItem->qty, 2) }}
                        </div>
                    @endforeach
                </div>


                <h3 class="font-semibold mt-5  text-center">
                    Order History GOES HERE
                </h3>
            </div>
        </div>
    </div>
@endsection
