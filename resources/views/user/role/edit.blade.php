@extends('avored::layouts.admin')

@section('pageTitle')
    {{ __('avored::user.role.edit-title') }}
@endsection


@section('actions')
    <div class="flex justify-start">
         <span class="inline-flex rounded-md shadow-sm">
            <button type="submit"
                    onclick="document.getElementById('role-save').submit()"
                    class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-red-600 hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-700 ">
              {{ __('avored::system.comms.save') }}
            </button>
        </span>

        <span class="ml-3 inline-flex rounded-md shadow-sm">
            <a href="{{ route('admin.role.index') }}"
               class="py-2 px-4 border border-gray-300 rounded-md text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800">
                {{ __('avored::system.comms.cancel') }}
            </a>
        </span>
    </div>
@endsection

@section('content')

    <div class="w-full mx-auto px-4 sm:px-6 md:px-8">
        <div class="py-4">
            <form id="role-save" method="post" action="{{ route('admin.role.update', $role->id) }}">
                @csrf
                @method('put')

                @foreach ($tabs as $tab)
                    <div>
                        <div>
                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                {{ $tab->label() }}
                            </h3>
                            <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">
                                {{ $tab->description() }}
                            </p>
                        </div>
                        <div class="mt-6 sm:mt-5 border-t border-gray-200 pt-5">
                            @php
                                $path = $tab->view();
                            @endphp
                            @include($path)
                        </div>
                    </div>

                @endforeach

                <div class="mt-8 border-t border-gray-200 pt-5">
                    <div class="flex justify-start">
                         <span class="inline-flex rounded-md shadow-sm">
                            <button type="submit"
                               class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-red-600 hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-700 ">
                              {{ __('avored::system.comms.save') }}
                            </button>
                        </span>

                        <span class="ml-3 inline-flex rounded-md shadow-sm">
                            <a href="{{ route('admin.role.index') }}"
                                    class="py-2 px-4 border border-gray-300 rounded-md text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800">
                                {{ __('avored::system.comms.cancel') }}
                            </a>
                        </span>

                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
