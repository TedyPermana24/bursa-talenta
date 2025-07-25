<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Provider Dashboard</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-50">
    <div class="min-h-screen">
        <!-- Navigation -->
        <x-provider-navbar />
        
        <!-- Main Content -->
        <div class="flex">
            <!-- Sidebar -->
            <div class="w-64 bg-white shadow-sm min-h-screen">
                <div class="p-6">
                    <!-- Profile Section -->
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="h-16 w-16 rounded-full bg-indigo-100 flex items-center justify-center">
                            <img class="h-16 w-16 rounded-full" 
                                 src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&color=7C3AED&background=EDE9FE" 
                                 alt="{{ auth()->user()->name }}">
                        </div>
                        <div>
                            <div class="text-sm font-medium text-gray-900">{{ auth()->user()->name }}</div>
                            <div class="text-xs text-gray-500">Provider</div>
                        </div>
                    </div>

                    <!-- Navigation Menu -->
                    <div class="space-y-1">
                        <a href="{{ route('provider.dashboard') }}" 
                           class="{{ request()->routeIs('provider.dashboard') ? 'bg-indigo-50 text-indigo-700' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }} group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                            <svg class="{{ request()->routeIs('provider.dashboard') ? 'text-indigo-500' : 'text-gray-400' }} mr-3 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                            Manajemen Lowongan Kerja
                        </a>
                        
                        <a href="#" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                            <svg class="text-gray-400 mr-3 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            Manajemen Kegiatan
                        </a>
                    </div>
                </div>
            </div>

            <!-- Content Area -->
            <div class="flex-1">
                {{ $slot }}
            </div>
        </div>
    </div>

    <script>
        // Toggle Status Function
        function toggleStatus(jobId) {
            fetch(`/provider/jobs/${jobId}/toggle-status`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json',
                },
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                }
            });
        }
    </script>
</body>
</html>
