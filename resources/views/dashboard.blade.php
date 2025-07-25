<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-50">
    <!-- Navigation -->
    <x-navbar />

    @guest
        <!-- Guest Navigation -->
        <div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <!-- Logo for Guest -->
                    <div class="flex items-center">
                        <img src="{{ asset('assets/logo.png') }}" alt="Bursa Talenta" class="h-10 w-auto">
                    </div>

                    <!-- Auth Buttons -->
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('login') }}"
                            class="text-gray-700 hover:text-gray-900 px-3 py-2 text-sm font-medium">
                            Sign In
                        </a>
                        <a href="{{ route('register') }}"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                            Register
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endguest

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Search and Filter Section -->
        <div class="flex items-center justify-between space-x-4 mb-8 p-4 border border-gray-300 rounded-lg">
            <!-- Filter Box -->
            <x-filter-box />

            <!-- Search Box -->
            <x-search-box />
        </div>

        <!-- Job Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @for ($i = 0; $i < 6; $i++)
                <x-job-card />
            @endfor
        </div>
    </div>
</body>

</html>
