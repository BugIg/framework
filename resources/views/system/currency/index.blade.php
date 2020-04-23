@extends('avored::layouts.admin')

@section('pageTitle')
    {{ __('avored::system.currency.title') }}
@endsection


@section('actions')
    <span class="inline-flex rounded-md shadow-sm">
      <a href="{{ route('admin.currency.create') }}"
         class="inline-flex items-center px-4 py-2 border text-sm leading-5 font-medium rounded-md text-white
                bg-red-600 hover:bg-red-500 focus:outline-none focus:border-red-700">

          <svg class="-ml-1 mr-2 h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
              <path class="heroicon-ui" d="M17 11a1 1 0 0 1 0 2h-4v4a1 1 0 0 1-2 0v-4H7a1 1 0 0 1 0-2h4V7a1 1 0 0 1 2 0v4h4z"/>
          </svg>
          {{ __('avored::system.comms.create') }}
      </a>
    </span>
@endsection


@section('content')

    <div class="w-full mx-auto px-4 sm:px-6 md:px-8">
        <div class="py-4">
            <x-avored-table
                :table="$currencyTable"
            />
        </div>
    </div>
@endsection
