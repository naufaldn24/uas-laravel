<x-guest-layout>
    <div class="w-full max-w-md p-8 bg-white/80 backdrop-blur-md shadow-2xl rounded-2xl border border-gray-200">
        <h2 class="text-2xl font-bold text-center text-indigo-700 mb-2">Admin Login</h2>
        <p class="text-center text-sm text-gray-500 mb-6">Sign in to access the dashboard</p>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="mt-1 block w-full" type="email" name="email" :value="old('email')"
                    required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mb-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="mt-1 block w-full" type="password" name="password" required
                    autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between mb-6">
                <label for="remember_me" class="inline-flex items-center text-sm">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ml-2 text-gray-600">Remember me</span>
                </label>
                @if (Route::has('password.request'))
                    <a class="text-sm text-indigo-600 hover:underline" href="{{ route('password.request') }}">
                        Forgot password?
                    </a>
                @endif
            </div>

            <div>
                <x-primary-button class="w-full justify-center">
                    {{ __('Enter Admin') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>