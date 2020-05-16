@extends('avored-admin::layouts.admin')

@section('pageTitle')
    {{ __('avored-admin::system.dashboard.title') }}
@endsection


@section('content')

<div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
    <!-- Replace with your content -->
    <div class="py-4 flex items-center w-full">
        <div class="w-1/3 text-center">
            <div class="rounded-lg h-96">
                {{ $orderWidget->render() }}
            </div>
        </div>
        <div class="w-1/3 ml-4 text-center">
            <div class="rounded-lg h-96">
                {{ $customerWidget->render() }}
            </div>
        </div>
        <div class="w-1/3 ml-4 text-center">
            <div class="rounded-lg h-96">
                {{ $revenueWidget->render() }}
            </div>
        </div>
    </div>
    <!-- /End replace -->
</div>

@endsection
