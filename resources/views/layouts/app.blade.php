<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>
    <!-- Styles -->

    <link rel="stylesheet" href="{{ mix('css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ mix('css/tailwind.css') }}">

    @include('layouts.partials.favicon')

    @yield('styles')

    <style>

        [disabled] {
            background-color: #e6e6e6;
            cursor: not-allowed;
        }

    </style>

</head>

<body>

<div class="min-h-screen bg-gray-100">

    @include('layouts.partials.navigation')

    <div class="py-10">

        @yield('content')

    </div>

    @include('layouts.partials.footer')

</div>

<script src="{{ mix('js/alpine.js') }}" defer></script>

@includeWhen(app()->isProduction(), 'layouts.partials.analytics')

</body>
</html>
