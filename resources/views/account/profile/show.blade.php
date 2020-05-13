@extends('avored::layouts.app')

@section('title')
My Account
@endsection


@section('content')
   
    <div class="flex font-semibold border-b border-gray-200 pb-5">
       {{ $user->first_name }}
    </div>
    <div class="mt-5 flex">
       
    </div>

@endsection


