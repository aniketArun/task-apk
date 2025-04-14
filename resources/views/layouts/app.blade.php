<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <!-- <link rel="preconnect" href="https://fonts.bunny.net"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="">
    <div class="container my-3">
        <!-- Authentication Links -->
        @auth
            <span class="me-2">Hi, {{ auth()->user()->name }}</span>
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-sm btn-danger">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="btn btn-sm btn-primary">Login</a>
            <a href="{{ route('register') }}" class="btn btn-sm btn-secondary">Register</a>
        @endauth
    </div>

    <div class="min-h-screen bg-gray-100">
        <!-- Navigation -->
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main class="container">
            @yield('content')
        </main>
    </div>
       <!-- Bootstrap JS Bundle -->
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
