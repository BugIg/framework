@extends('avored::layouts.admin')

@section('content')
    <div class="w-full mx-auto px-4 sm:px-6 md:px-8">
        <h1 class="text-2xl font-semibold text-gray-900">{{ __('avored::catalog.category.title') }}</h1>
    </div>

    <div class="w-full mx-auto px-4 sm:px-6 md:px-8">

        <div class="py-4">
            <x-avored-table
                :data="$categories"
                :columns="$columns"
            />
        </div>

    </div>
@endsection
