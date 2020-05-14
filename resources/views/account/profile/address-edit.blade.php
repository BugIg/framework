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
            <form action="{{ route('avored.account.profile.address.update', $address->id) }}" method="post">
            @csrf
            @method('put')
            <div class="bg-white  overflow-hidden  sm:rounded-lg">
                <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Edit your address information
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
                            <input id="first_name" 
                                value="{{ $address->first_name }}"
                                name="first_name"
                                class="flex-1 form-input block w-full rounded-none rounded-r-md  sm:text-sm sm:leading-5" />
                        </div>
                    </div>
                    <div class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <div class="text-sm leading-5 font-medium text-gray-500">
                            Last Name
                        </div>
                        <div class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            <input id="last_name" 
                                value="{{ $address->last_name }}"
                                name="last_name"
                                class="flex-1 form-input block w-full rounded-none rounded-r-md  sm:text-sm sm:leading-5" />
                        </div>
                    </div>
                    <div class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <div class="text-sm leading-5 font-medium text-gray-500">
                            Phone
                        </div>
                        <div class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            <input id="phone" 
                                value="{{ $address->phone }}"
                                name="phone"
                                class="flex-1 form-input block w-full rounded-none rounded-r-md  sm:text-sm sm:leading-5" />
                        </div>
                    </div>
                    <div class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <div class="text-sm leading-5 font-medium text-gray-500">
                            Address1
                        </div>
                        <div class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            <input id="address1" 
                                value="{{ $address->address1 }}"
                                name="address1"
                                class="flex-1 form-input block w-full rounded-none rounded-r-md sm:text-sm sm:leading-5" />
                        </div>
                    </div>
                    <div class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <div class="text-sm leading-5 font-medium text-gray-500">
                            Address2
                        </div>
                        <div class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            <input id="address2" 
                                value="{{ $address->address2 }}"
                                name="address2"
                                class="flex-1 form-input block w-full rounded-none rounded-r-md sm:text-sm sm:leading-5" />
                        </div>
                    </div>
                    <div class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <div class="text-sm leading-5 font-medium text-gray-500">
                            City
                        </div>
                        <div class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            <input id="city" 
                                value="{{ $address->city }}"
                                name="city"
                                class="flex-1 form-input block w-full rounded-none rounded-r-md sm:text-sm sm:leading-5" />
                        </div>
                    </div>
                    <div class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <div class="text-sm leading-5 font-medium text-gray-500">
                            State
                        </div>
                        <div class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            <input id="state" 
                                value="{{ $address->state }}"
                                name="state"
                                class="flex-1 form-input block w-full rounded-none rounded-r-md sm:text-sm sm:leading-5" />
                        </div>
                    </div>

                    <div class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <div class="text-sm leading-5 font-medium text-gray-500">
                            Country
                        </div>
                        <div class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            <input id="country_id" 
                                value="{{ $address->country_id }}"
                                name="country_id"
                                class="flex-1 form-input block w-full rounded-none rounded-r-md sm:text-sm sm:leading-5" />
                        </div>
                    </div>

                    <div class="mt-8 ml-auto sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <button type="submit" 
                            class="py-3 px-5 border border-red-700 bg-red-500 rounded-md 
                                leading-4 font-medium text-red-900 hover:text-red-700 
                                focus:outline-none focus:border-red-300 focus:shadow-outline-blue active:bg-red-500 active:text-red-800">
                            Save
                        </button>
                        <a href="{{ route('avored.account.profile.show') }}" 
                            class="py-3 ml-5 px-5 border  bg-gray-300 rounded-md 
                                leading-4 font-medium text-gray-900 hover:text-gray-500 
                                focus:outline-none focus:border-gray-300 focus:shadow-outline-blue">
                            Cancel
                        </a>
                    </div>
                </div>
            </div>
        </form>
       
        </div>
    </div>
</div>

@endsection


