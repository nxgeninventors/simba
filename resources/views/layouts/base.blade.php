<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>{{ config('app.name', 'Simba') }}</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
        <script src="https://use.fontawesome.com/releases/v6.2.1/js/all.js" data-auto-a11y="true" ></script>
        <!-- Fonts -->

        
        <!-- Fav Icons -->
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('images/app-icons/apple-icon-57x57.png') }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('images/app-icons/apple-icon-60x60.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('images/app-icons/apple-icon-72x72.png') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('images/app-icons/apple-icon-76x76.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('images/app-icons/apple-icon-114x114.png') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('images/app-icons/apple-icon-120x120.png') }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('images/app-icons/apple-icon-144x144.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('images/app-icons/apple-icon-152x152.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/app-icons/apple-icon-180x180.png') }}">
        <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('images/app-icons/android-icon-192x192.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/app-icons/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('images/app-icons/favicon-96x96.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/app-icons/favicon-16x16.png') }}">
        <link rel="manifest" href="{{ asset('images/app-icons/manifest.json') }}">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="{{ asset('images/app-icons/ms-icon-144x144.png') }}">
        <meta name="theme-color" content="#ffffff">
        <!-- Fav Icons End-->

        @vite(['resources/css/app.scss', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-50 dark:bg-gray-800">
        @include('layouts.partials.navbar-dashboard')
        <div class="flex pt-16 overflow-hidden bg-gray-50 dark:bg-gray-900">
            @include('layouts.partials.sidebar')

            <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900">
                <main>
                    {{ $slot }}
                </main>
                @include('layouts.partials.footer-dashboard')
            </div>
        </div>
        
    </body>
</html>