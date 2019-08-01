<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('css')

    </head>
    <body>
        @include('partials.navbar')

        <main role="main">

            @include('partials.flash-messages')
            
            @yield('content')

            @include('partials.footer')
        </main>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://kit.fontawesome.com/0d9c5a4db2.js"></script>
    @yield('javascript')
</html>
