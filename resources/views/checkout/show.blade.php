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
        <div class="flex">
            <div class="w-1/2">
                @include('avored::checkout.cards.user')
                @include('avored::checkout.cards.billing')
                @include('avored::checkout.cards.shipping')
            </div>    
            <div class="w-1/2 ml-5">

                @include('avored::checkout.cards.payment')
                @include('avored::checkout.cards.cart')

                
            </div>    
        </div>

        <!-- PLACE ORDER BUTTON -->
        <div class="mt-5 flex justify-end items-end">
            <a href="{{ route('avored.checkout.show') }}" 
                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                Place Order
            </a>
        </div>
    </div>
</checkout-page>
@endsection


