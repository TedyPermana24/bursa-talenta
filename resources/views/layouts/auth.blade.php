<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased bg-white">
    <x-navbar />

    <div class="min-h-screen mt-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 min-h-screen">
                <!-- Left Side - Illustration -->
                <div class="flex flex-col justify-center items-start py-8 h-full">
                    <div class="max-w-lg">
                        <h1 class="text-3xl font-bold text-gray-900 mb-2 leading-relaxed">
                            Mari bergabung dengan<br>
                            Bursa Talenta!
                        </h1>

                        <!-- Main Illustration Image -->
                        <div class="flex justify-center">
                            <img src="{{ asset('assets/bursa-talenta.png') }}" alt="Bursa Talenta Illustration"
                                class="w-full max-w-md h-auto object-contain">
                        </div>
                    </div>
                </div>

                <!-- Right Side - Form -->
                <div class="flex flex-col justify-center items-center py-8 h-full">
                    <div class="w-full max-w-sm">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
