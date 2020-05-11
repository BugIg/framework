@extends('avored::layouts.app')

@section('title')
Checkout
@endsection


@section('content')
<checkout-page 
    :items="{{ $cartItems }}"
    :addresses="{{ $addresses }}"
inline-template>
    <div>
    <form id="checkout-form" method="post" action="{{ route('avored.order.place') }}">
        @csrf
        <div class="flex">
            <div class="w-1/2">
                @include('avored::checkout.cards.user')
                @include('avored::checkout.cards.billing')
                @include('avored::checkout.cards.shipping')
            </div>    
            <div class="w-1/2 ml-5">

                @include('avored::checkout.cards.payment-options')
                @include('avored::checkout.cards.shipping-options')
                @include('avored::checkout.cards.cart')

                
            </div>    
        </div>

        <!-- PLACE ORDER BUTTON -->
        <div class="mt-5 flex justify-end items-end">
            <button type="button" @click="handleSubmit" 
                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                Place Order
            </button>
        </div>
        </form>
    </div>
</checkout-page>
@endsection


