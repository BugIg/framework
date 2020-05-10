@extends('avored::layouts.app')

@section('title')
{{ $product->name }}
@endsection


@section('content')
    <div class="flex">
        <div class="w-1/3 p-6">
            <img src="https://placehold.it/500x500" alt="{{ $product->name }}" />
        </div>
        <div class="w-2/3 p-6 ml-3">
            <h1 class="text-xl">{{ $product->name }}</h1>

            <form method="post" action="{{ route('avored.add.to.cart') }}" class="mt-3">
                @csrf()
                <div class="flex">
                <input type="number" name="qty" value="1" class="form-input" />
                <input type="hidden" name="slug" value="{{ $product->slug }}" class="form-input" />

                <div class="ml-3">
                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        Add to cart
                    </button>
                </div>
                </div>
            </form>

            <div class="mt-3">
                {!! $product->description !!}
            </div>
        </div>
    </div>
@endsection


