<x-auth-layout>
    <!-- Form Header -->
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-900 mb-1">Daftar dulu yuk!</h2>
        <p class="text-sm text-gray-500">Silahkan isi form berikut</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <!-- Email Address -->
        <div>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                placeholder="Email"
                class="w-full px-3 py-3 border border-gray-300 rounded-lg focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-all placeholder-gray-400 text-gray-700 text-sm" />
            <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs" />
        </div>

        <!-- Name / Role -->
        <div>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                autocomplete="name" placeholder="Nama"
                class="w-full px-3 py-3 border border-gray-300 rounded-lg focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-all placeholder-gray-400 text-gray-700 text-sm" />
            <x-input-error :messages="$errors->get('name')" class="mt-1 text-xs" />
        </div>

        <!-- Password -->
        <div>
            <input id="password" type="password" name="password" required autocomplete="new-password"
                placeholder="Password"
                class="w-full px-3 py-3 border border-gray-300 rounded-lg focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-all placeholder-gray-400 text-gray-700 text-sm" />
            <x-input-error :messages="$errors->get('password')" class="mt-1 text-xs" />
        </div>

        <!-- Confirm Password -->
        <div>
            <input id="password_confirmation" type="password" name="password_confirmation" required
                autocomplete="new-password" placeholder="Konfirmasi Password"
                class="w-full px-3 py-3 border border-gray-300 rounded-lg focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-all placeholder-gray-400 text-gray-700 text-sm" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-xs" />
        </div>

        <!-- Submit Button -->
        <div class="pt-3">
            <button type="submit"
                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-3 px-4 rounded-lg transition-colors text-sm">
                Daftar
            </button>
        </div>

        <!-- Terms and Login Link -->
        <div class="text-center pt-3 space-y-2">
            <p class="text-sm text-gray-600">
                Sudah mempunyai akun? <a href="{{ route('login') }}"
                    class="text-indigo-600 hover:text-indigo-700 font-medium">Masuk</a>
            </p>
            <p class="text-xs text-gray-400 leading-relaxed">
                Dengan membuat akun, saya setuju dengan <a href="#"
                    class="text-indigo-600 hover:text-indigo-700">Syarat dan Ketentuan</a> dan <a href="#"
                    class="text-indigo-600 hover:text-indigo-700">Kebijakan Privasi</a>
            </p>
        </div>
    </form>
</x-auth-layout>
