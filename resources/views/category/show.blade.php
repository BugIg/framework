@extends('avored::layouts.app')

@section('title')
{{ $category->name }}
@endsection


@section('content')
    <div>
     <div class="flex flex-wrap -mx-3 overflow-hidden">
    @foreach ($category->products as $product)
        
        
       
       

        <div class="my-3 px-3 w-1/3 overflow-hidden">
            <a href="{{ route('avored.product.show', $product->slug) }}">
                <img class="w-full" src="{{ $product->main_image_url }}" alt="{{ $product->name }}">
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

    
    @endforeach
    
    </div>
@endsection


