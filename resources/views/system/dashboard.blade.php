@extends('avored::layouts.admin')
{{--<div>Dashboard</div>--}}

@section('content')
<div class="h-12 bg-white flex items-center justify-between shadow">
    <div class="px-4">
        <h1 class="text-gray-800 text-xl">Header</h1>
    </div>
    <div class="flex items-center px-4">
        <div>User</div>
        <div class="ml-2"><img src="./images/avatar-small.jpg" alt="" class="h-8 rounded-full border" /></div>
        <a class="dropdown-item" href="{{ route('admin.logout') }}"
           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</div>

<div class="flex flex-1">
    <div class="bg-gray-800 p-6 w-64">
        <ul>
            <li>
                <a href="" class="flex items-center px-4 py-2 my-3 rounded hover:bg-gray-900 hover:text-gray-400 bg-gray-900 text-gray-400">
                    <svg class="h-4" viewBox="0 0 24 24">
                        <path
                            fill="currentColor"
                            d="M19,20H5V4H7V7H17V4H19M12,2A1,1 0 0,1 13,3A1,1 0 0,1 12,4A1,1 0 0,1 11,3A1,1 0 0,1 12,2M19,2H14.82C14.4,0.84 13.3,0 12,0C10.7,0 9.6,0.84 9.18,2H5A2,2 0 0,0 3,4V20A2,2 0 0,0 5,22H19A2,2 0 0,0 21,20V4A2,2 0 0,0 19,2Z"
                        />
                    </svg>
                    <span class="ml-2">Nav Links</span>
                </a>
            </li>

        </ul>
    </div>
    <div class="flex-1">
        <div class="p-8">
            <h1 class="text-2xl text-gray-800">Test</h1>
            <div class="bg-gray-500 h-4 mt-4"></div>
            <div class="bg-gray-500 h-4 mt-4"></div>
            <div class="bg-gray-500 h-4 mt-4"></div>
            <div class="bg-gray-500 h-4 mt-4"></div>
            <div class="bg-gray-500 h-4 mt-4"></div>
            <div class="bg-gray-500 h-4 mt-4"></div>
            <div class="bg-gray-500 h-4 mt-4"></div>
        </div>
    </div>
</div>
@endsection
