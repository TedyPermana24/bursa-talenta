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
        <!-- Navigation with Logo -->
        <nav class="absolute top-0 left-0 w-full z-20 p-6">
            <div class="flex items-center">
                <img src="{{ asset('assets/logo.png') }}" alt="Bursa Talenta Logo" class="w-22 h-22 object-contain mr-2">
            </div>
        </nav>

        <div class="min-h-screen flex mt-12">
            <!-- Left Side - Illustration -->
            <div class="hidden lg:flex lg:w-3/5 bg-white relative">
                <!-- Main Content -->
                <div class="flex-1 flex flex-col justify-center items-center px-8 py-16">
                    <div class="max-w-lg">
                        <h1 class="text-3xl font-bold text-gray-900 mb-2 leading-relaxed text-left">
                            Mari bergabung dengan<br>
                            Bursa Talenta!
                        </h1>
                        
                        <!-- Main Illustration Image -->
                        <div class="flex justify-center">
                            <img src="{{ asset('assets/bursa-talenta.png') }}" 
                                 alt="Bursa Talenta Illustration" 
                                 class="w-full max-w-md h-auto object-contain">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side - Form -->
            <div class="w-full lg:w-2/5 flex items-center justify-start pl-2 pr-6 py-12 bg-white">
                <div class="w-full max-w-sm">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>
