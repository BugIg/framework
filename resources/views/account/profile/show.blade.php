@extends('avored::layouts.app')

@section('title')
My Account
@endsection


@section('content')
   
<div class="flex">
    <div class="w-2/6 border shadow rounded md:w-1/6 p-5">
        @include('avored::account._sidebar')
    </div>
    <div class="w-4/6 ml-5 md:w-5/6 shadow rounded p-5">
        <div class="bg-white  overflow-hidden  sm:rounded-lg">
            <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Your information
                </h3>
                <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">
                    Personal details and application.
                </p>
            </div>
            <div class="px-4 py-5 sm:p-0">
                
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 sm:py-5">
                    <div class="text-sm leading-5 font-medium text-gray-500">
                        First name
                    </div>
                    <div class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $user->first_name }}
                    </div>
                </div>
                <div class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                    <div class="text-sm leading-5 font-medium text-gray-500">
                        Last Name
                    </div>
                    <div class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                        {{  $user->last_name }}
                    </div>
                </div>
                <div class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                    <div class="text-sm leading-5 font-medium text-gray-500">
                        Email address
                    </div>
                    <div class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                        {{  $user->email }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


