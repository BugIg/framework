@extends('avored-admin::layouts.admin')

@section('pageTitle')
    {{ __('avored-admin::user.user-group.create-title') }}
@endsection

@section('actions')
    <div class="flex justify-start">
         <span class="inline-flex rounded-md shadow-sm">
            <button type="submit"
                    onclick="document.getElementById('userGroup-save').submit()"
                    class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-red-600 hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-700 ">
              {{ __('avored-admin::system.comms.save') }}
            </button>
        </span>

        <span class="ml-3 inline-flex rounded-md shadow-sm">
            <a href="{{ route('admin.user-group.index') }}"
               class="py-2 px-4 border border-gray-300 rounded-md text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800">
                {{ __('avored-admin::system.comms.cancel') }}
            </a>
        </span>
    </div>
@endsection


@section('content')

    <div class="w-full mx-auto px-4 sm:px-6 md:px-8">
        <div class="py-4">
            <form id="userGroup-save" method="post" action="{{ route('admin.user-group.store') }}">
                @csrf

                @foreach ($tabs as $tab)
                    <x-avored-tab
                        :tab="$tab"
                    >
                        @php
                            $path = $tab->view();
                        @endphp
                        @include($path)

                    </x-avored-tab>
                @endforeach

                <div class="pt-5">
                    <div class="flex justify-start">
                         <span class="inline-flex rounded-md shadow-sm">
                            <button type="submit"
                               class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-red-600 hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-700 ">
                              {{ __('avored-admin::system.comms.save') }}
                            </button>
                        </span>

                        <span class="ml-3 inline-flex rounded-md shadow-sm">
                            <a href="{{ route('admin.user-group.index') }}"
                                    class="py-2 px-4 border border-gray-300 rounded-md text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800">
                                {{ __('avored-admin::system.comms.cancel') }}
                            </a>
                        </span>

                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
