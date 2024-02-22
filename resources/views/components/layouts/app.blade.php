<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="application-name" content="{{ config('app.name') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $meta['description'] ?? 'Introduction for lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.' }}">

    <title>{{ config('app.name') }}</title>

    @vite('resources/css/app.css')
</head>

<body class="antialiased bg-white">
    {{ $slot }}

    @vite('resources/js/app.js')
    @stack('scripts')
</body>

</html>
