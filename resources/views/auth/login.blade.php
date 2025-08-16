<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-[#f0f4ff] to-[#dce4f8] py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md p-10 space-y-8 shadow-xl bg-white/90 rounded-2xl backdrop-blur-md animate-fade-in">
            <div>
                <h2 class="mt-2 text-3xl font-extrabold text-center text-blue-700 animate-bounce">
                    Welcome Back
                </h2>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4 text-green-600" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="mt-8 space-y-6">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="font-semibold text-blue-700" />
                    <x-text-input id="email" type="email" name="email"
                        class="block w-full mt-1 border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                        :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" class="font-semibold text-blue-700" />
                    <x-text-input id="password" type="password" name="password"
                        class="block w-full mt-1 border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                        required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="text-blue-600 border-gray-300 rounded shadow-sm focus:ring-blue-500"
                            name="remember">
                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-sm text-blue-600 hover:text-blue-800" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>

                <!-- Actions -->
                <div>
                    <button type="submit"
                        class="w-full px-6 py-2 font-bold text-white transition-transform transform bg-blue-600 rounded-lg shadow-md hover:bg-blue-700 hover:scale-105">
                        {{ __('Log in') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    <style>
        @keyframes fade-in {
            from { opacity: 0; transform: scale(0.95); }
            to { opacity: 1; transform: scale(1); }
        }
        .animate-fade-in {
            animation: fade-in 0.6s ease-out;
        }
    </style>
</x-guest-layout>


