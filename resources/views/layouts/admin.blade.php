<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('meta_title', 'AvoRed E commerce')</title>

    <script defer src="{{ asset('vendor/avored/js/app.js') }}"></script>
    <link href="{{ asset('vendor/avored/css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    @yield('content')
</div>
@stack('scripts')
</body>
</html>
