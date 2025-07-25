<x-auth-layout>
    <!-- Form Header -->
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-900 mb-1">Lupa Password?</h2>
        <p class="text-sm text-gray-500">Tidak masalah. Berikan alamat email Anda dan kami akan mengirimkan link reset
            password yang memungkinkan Anda memilih password baru.</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
        @csrf

        <!-- Email Address -->
        <div>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                autocomplete="username" placeholder="Email"
                class="w-full px-3 py-3 border border-gray-300 rounded-lg focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-all placeholder-gray-400 text-gray-700 text-sm" />
            <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs" />
        </div>

        <!-- Submit Button -->
        <div class="pt-3">
            <button type="submit"
                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-3 px-4 rounded-lg transition-colors text-sm">
                Kirim Link Reset Password
            </button>
        </div>

        <!-- Links -->
        <div class="text-center space-y-2">
            <p class="text-sm text-gray-600">
                Ingat password Anda? <a href="{{ route('login') }}"
                    class="text-indigo-600 hover:text-indigo-700 font-medium">Masuk di sini</a>
            </p>
        </div>
    </form>
</x-auth-layout>
