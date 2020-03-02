<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tailwindcss/ui@latest/dist/tailwind-ui.min.css">

    @include('layouts.partials.favicon')

</head>

<body>

<div class="min-h-screen bg-gray-100">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.0.1/dist/alpine.js" defer></script>
<script src="https://kit.fontawesome.com/0930b50369.js" crossorigin="anonymous"></script>

@includeWhen(app()->isProduction(), 'layouts.partials.analytics')

</body>
</html>
