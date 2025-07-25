<x-auth-layout>

    <!-- Form Header -->
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-900 mb-1">Masuk</h2>
        <p class="text-sm text-gray-500">Selamat datang kembali! Silakan masuk ke akun Anda.</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <!-- Email Address -->
        <div>
            <input id="email" 
                   type="email" 
                   name="email" 
                   value="{{ old('email') }}" 
                   required 
                   autofocus 
                   autocomplete="username"
                   placeholder="Email"
                   class="w-full px-3 py-3 border border-gray-300 rounded-lg focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-all placeholder-gray-400 text-gray-700 text-sm"
            />
            <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs" />
        </div>

        <!-- Password -->
        <div>
            <input id="password" 
                   type="password" 
                   name="password" 
                   required 
                   autocomplete="current-password"
                   placeholder="Password"
                   class="w-full px-3 py-3 border border-gray-300 rounded-lg focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-all placeholder-gray-400 text-gray-700 text-sm"
            />
            <x-input-error :messages="$errors->get('password')" class="mt-1 text-xs" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center">
            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
            <label for="remember_me" class="ml-2 text-sm text-gray-600">Ingat saya</label>
        </div>

        <!-- Submit Button -->
        <div class="pt-3">
            <button type="submit" 
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-3 px-4 rounded-lg transition-colors text-sm">
                Masuk
            </button>
        </div>

        <!-- Links -->
        <div class="text-center space-y-2">
            @if (Route::has('password.request'))
                <div>
                    <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 hover:text-indigo-700">
                        Lupa password?
                    </a>
                </div>
            @endif
            
            <p class="text-sm text-gray-600">
                Belum punya akun? <a href="{{ route('register') }}" class="text-indigo-600 hover:text-indigo-700 font-medium">Daftar di sini</a>
            </p>
        </div>
    </form>
</x-auth-layout>
