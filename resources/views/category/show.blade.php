@extends('avored::layouts.app')

@section('title')
{{ $category->name }}
@endsection


@section('content')
    <div>
    @foreach ($category->products as $product)
        @if ($loop->index % 3 === 0 || $loop->first() === true)
        <div class="w-full">
        @endif

        <div class="max-w-sm rounded overflow-hidden shadow-lg">
            <a href="{{ route('avored.product.show', $product->slug) }}">
            <img class="w-full" src="https://placehold.it/250x250" alt="{{ $product->name }}">
            </a>
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">{{ $product->name }}</div>
                <p class="text-red-700 text-base">
                    ${{ number_format($product->price, 2) }}
                </p>
            </div>
            <div class="px-6 py-4">  
                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    Add to cart
                </button>
            </div>
        </div>

        @if ($loop->index % 3 === 0 || $loop->first() === true)
        </div>
        @endif
    @endforeach
    </div>
@endsection


