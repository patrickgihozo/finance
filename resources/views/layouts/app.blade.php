<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'My Finance') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
    body.dark-mode {
        background: #181a1b !important;
        color: #f8f9fa !important;
    }
    body.dark-mode .bg-gray-100,
    body.dark-mode .bg-light {
        background: #23272b !important;
    }
    body.dark-mode .navbar,
    body.dark-mode .card,
    body.dark-mode .table,
    body.dark-mode .modal-content {
        background: #23272b !important;
        color: #f8f9fa !important;
    }
    body.dark-mode .table-light {
        background: #343a40 !important;
        color: #f8f9fa !important;
    }
    body.dark-mode .btn,
    body.dark-mode .dropdown-menu {
        background: #23272b !important;
        color: #f8f9fa !important;
        border-color: #444 !important;
    }
    body.dark-mode .btn-outline-dark {
        color: #f8f9fa !important;
        border-color: #f8f9fa !important;
    }
    body.dark-mode .dropdown-menu {
        background: #23272b !important;
    }
</style>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <!-- Bootstrap Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
            <div class="container">
                <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">My Finance</a>
                <div class="ms-auto d-flex align-items-center">
                    <div class="btn-group me-3">
                        <a href="{{ route('dashboard') }}" class="btn btn-outline-primary">Home</a>
                        <a href="{{ route('transactions.create') }}" class="btn btn-outline-success">Add Transaction</a>
                        <a href="{{ route('transactions.history') }}" class="btn btn-outline-info">View Transaction History</a>
                    </div>
                    @auth
                    <div class="dropdown">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                            <li class="dropdown-item text-muted">{{ Auth::user()->email }}</li>
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Edit Profile</a></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    @endauth
                    <button class="btn btn-outline-dark ms-3" onclick="document.body.classList.toggle('dark-mode');">
    Dark Mode
</button>
                </div>
            </div>
        </nav>
        <!-- Optional: Keep your custom navigation if needed -->
        {{-- @include('layouts.navigation') --}}

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>