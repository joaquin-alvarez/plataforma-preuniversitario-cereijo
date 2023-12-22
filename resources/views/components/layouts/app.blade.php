<!DOCTYPE html>
<html data-theme="corporate" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://unpkg.com/htmx.org@1.9.9"></script>
    <title>{{ $title ?? 'Comunicados Cereijo' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased" hx-boost="true">
    <x-success-alert/>

    {{ $slot }}

    @stack('scripts')
</body>
</html>
