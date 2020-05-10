@extends('avored::layouts.app')

@section('title')
Checkout
@endsection


@section('content')
   
    <div class="flex">
        <div class="w-1/2">
            @include('avored::checkout.cards.user')
        </div>    
        <div class="w-1/2 ml-5">

            <div class="flex font-semibold border-b border-gray-200 pb-5">
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
                @foreach ($cartItems as $cartItem)
                    <div class="w-9/12">
                        {{ $cartItem->name() }}
                    </div>
                    <div class="w-24 text-right">
                        {{ $cartItem->qty() }}
                    </div>
                    <div class="w-40 text-right">
                        ${{ number_format($cartItem->price(), 2) }}
                    </div>
                    <div class="w-40 text-right">
                        ${{ number_format($cartItem->total(), 2) }}
                    </div>
                @endforeach
            </div>
        </div>    
    </div>

    <!-- PLACE ORDER BUTTON -->
    <div class="mt-5 flex justify-end items-end">
        <a href="{{ route('avored.checkout.show') }}" 
            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
            Place Order
        </a>
    </div>
@endsection


