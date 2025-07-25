@auth
    <!-- Provider Navigation -->
    <nav class="bg-white shadow-sm border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="{{ route('provider.dashboard') }}" class="flex items-center">
                        <img src="{{ asset('assets/logo.png') }}" alt="Bursa Talenta" class="h-10 w-auto">
                    </a>
                </div>

                <!-- User Profile -->
                <div class="flex items-center">
                    <div class="flex items-center sm:ms-6">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                    <div class="flex items-center space-x-3">
                                        <img class="h-8 w-8 rounded-full bg-indigo-100" 
                                             src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&color=7C3AED&background=EDE9FE" 
                                             alt="{{ auth()->user()->name }}">
                                        <div class="hidden md:block text-left">
                                            <div class="text-sm font-medium text-gray-900">{{ auth()->user()->name }}</div>
                                        </div>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </div>
            </div>
        </div>
    </nav>
@endauth
