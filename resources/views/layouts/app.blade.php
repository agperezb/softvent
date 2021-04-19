<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

    <link rel="icon" type="image/png" href="{{asset('settings/favicon.png')}}"/>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
</head>
<body class="font-sans antialiased">
@include('layouts.validation')
@if(Auth::guest())
    @yield('content')
@else
    @if(Auth::user()->user_profile == 'customer')
        @yield('content')
    @else
        @include('layouts.main')
    @endif
@endif
</body>
</html>
