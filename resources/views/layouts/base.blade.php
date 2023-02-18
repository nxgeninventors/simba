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
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/app-icons/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/app-icons/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/app-icons/favicon-16x16.png') }} ">
        <link rel="icon" type="image/png" href="{{ asset('images/app-icons/favicon.ico') }}">
        <link rel="manifest" href="{{ asset('images/app-icons/site.webmanifest') }}">
        <link rel="mask-icon" href="{{ asset('images/app-icons/safari-pinned-tab.svg') }}" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="theme-color" content="#ffffff">
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