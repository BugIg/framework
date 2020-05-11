@extends('avored-admin::layouts.admin')

@section('pageTitle')
    {{ __('avored-admin::order.order.title') }}
@endsection


@section('content')

    <div class="w-full mx-auto px-4 sm:px-6 md:px-8">
        <div class="py-4">
            <x-avored-table
                :table="$orderTable"
            />
        </div>

    </div>
@endsection
