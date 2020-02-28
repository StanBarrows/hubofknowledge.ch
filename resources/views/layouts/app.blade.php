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

</head>

<body>

<div class="bg-gray-800 pb-32">
    @include('layouts.partials.navigation')
    <header class="py-10">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl leading-9 font-bold text-white">
                {{ config('app.name') }}
            </h2>

        </div>

    </header>
</div>
<main class="-mt-32">
    <div class="max-w-7xl mx-auto pb-12 px-4 sm:px-6 lg:px-8">
        @yield('content')
    </div>
</main>

<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@2.0/dist/alpine.js" defer></script>

</body>
</html>
