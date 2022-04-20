<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'fortify-vue-bootstrap') }}</title>
    <!-- Styles -->
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    <style>
        body {
            position: relative;
        }

        .links {
            padding: 12px;
            text-align: right;
        }

        .links a {
            color: white;
            text-decoration: none;
            padding: 6px 12px;
            border-radius: 5px;
        }

        .links a:hover {
            background-color: #313233;
        }

        .title {
            position: absolute;
            color: white;
            font-size: 3rem;
            top: 50%;
            left: 50%;
            transform: translateY(-50%) translateX(-50%);
            -webkit-transform: translateY(-50%) translateX(-50%);
        }
    </style>
    <!-- icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
</head>

<body class="bg-dark h-100">
    <div class="links">
        @guest
        <a href="/login">Login</a>
        <a href="/register">Register</a>
        @else
        <a href="/home">Home</a>
        @endguest
    </div>

    <span class="title">
        laravel
    </span>

    <script src="{{ mix('/js/app.js') }}" defer></script>
</body>

</html>
