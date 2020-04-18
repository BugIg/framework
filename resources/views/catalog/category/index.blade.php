@extends('avored::layouts.admin')

@section('pageTitle')
    {{ __('avored::catalog.category.title') }}
@endsection

@section('content')

    <div class="w-full mx-auto px-4 sm:px-6 md:px-8">
        <div class="py-4">
            <x-avored-table
                :data="$categories"
                :columns="$columns"
            />
        </div>

    </div>
@endsection
