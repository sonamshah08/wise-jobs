<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'WiseJobs')</title>
    <link rel="icon" href="{{ asset('images/logo-small.jpeg') }}" type="image/x-icon">

    <!-- Inline Critical CSS -->
    <style>
        /* smooth scrolling */
        html {
            scroll-behavior: smooth;
            height: 100%;
        }

        /* Body Styles */
        body {
            background-color: var(--body-bg-color);
            color: var(--body-text-color);
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .container {
            flex: 1;
        }

        .footer {
            padding: 1rem;
            border-top: 1px solid #ccc;
            margin-top: auto;
            position: relative;
            bottom: 0;
        }
    </style>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Preload Key Resources -->
    <link rel="preload" href="{{ asset('css/style.css') }}" as="style">
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" as="style">
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" as="script">

    <!-- Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Additional Styles -->
    @stack('styles')
</head>
<body>
    @unless(request()->routeIs('login'))
        @include('layouts.header')
    @endunless

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    @unless(request()->routeIs('login'))
        @include('layouts.footer')
    @endunless

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Additional Scripts -->
    @stack('scripts')
</body>
</html>
