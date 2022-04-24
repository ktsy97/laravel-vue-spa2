<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @hasSection('title')
    <title>@yield('title') | {{ config('app.name', 'Vue-Laravel-Weather') }}</title>
    @else
    <title>{{ config('app.name') }}</title>
    @endif
    <!-- Styles -->
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
</head>

<body class="@guest bg-dark @else bg-light @endguest">
    <div id="app">
        <x-header></x-header>
        <router-view></router-view>
    </div>

    @yield('content')

    <!-- Scripts -->
    <script src="{{ mix('/js/app.js') }}" defer></script>
</body>

</html>
