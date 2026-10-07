<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Summa Dealership') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=jaldi:400" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen flex flex-col justify-center items-center px-4 py-8 sm:px-0 bg-gray-100">
        <div class="w-full sm:max-w-md bg-white shadow-md rounded-lg px-6 py-6 sm:px-8 sm:py-8">
            {{ $slot }}
        </div>
    </div>
</body>
</html>