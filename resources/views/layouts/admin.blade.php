<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('meta_title', 'AvoRed E commerce')</title>

    <script defer src="{{ asset('vendor/avored/js/app.js') }}"></script>


    <link href="{{ asset('vendor/avored/css/app.css') }}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
</head>
<body>
    <div id="app" class="antialiased h-screen flex flex-col">
        @include('avored::partials.header')
        <div class="flex flex-1 overflow-hidden">
            @include('avored::partials.sidebar')
            @yield('content')
        </div>
    </div>
    @stack('scripts')
</body>
</html>
