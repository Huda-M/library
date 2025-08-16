<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-[#f8f5f0] to-[#e6e0f8] py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-2xl p-10 space-y-8 shadow-xl bg-white/90 rounded-2xl backdrop-blur-md animate-fade-in">
            <div>
                <h2 class="mt-2 text-3xl font-extrabold text-center text-blue-700 animate-bounce">
                    Create Your Account
                </h2>
            </div>

            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="mt-8 space-y-6">
                @csrf

                <!-- First Name -->
                <div>
                    <x-input-label for="first_name" :value="('First Name')" class="font-semibold text-blue-700" />
                    <x-text-input id="first_name" type="text" name="first_name"
                        class="block w-full mt-1 border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                        :value="old('first_name')" required autofocus autocomplete="first_name" />
                    <x-input-error :messages="$errors->get('first_name')" class="mt-2 text-red-500" />
                </div>

                <!-- Last Name -->
                <div>
                    <x-input-label for="last_name" :value="('Last Name')" class="font-semibold text-blue-700" />
                    <x-text-input id="last_name" type="text" name="last_name"
                        class="block w-full mt-1 border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                        :value="old('last_name')" required autocomplete="last_name" />
                    <x-input-error :messages="$errors->get('last_name')" class="mt-2 text-red-500" />
                </div>

                <!-- Address -->
                <div>
                    <x-input-label for="address" :value="('Address')" class="font-semibold text-blue-700" />
                    <x-text-input id="address" type="text" name="address"
                        class="block w-full mt-1 border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                        :value="old('address')" required autocomplete="address" />
                    <x-input-error :messages="$errors->get('address')" class="mt-2 text-red-500" />
                </div>

                <!-- Email -->
                <div>
                    <x-input-label for="email" :value="('Email')" class="font-semibold text-blue-700" />
                    <x-text-input id="email" type="email" name="email"
                        class="block w-full mt-1 border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                        :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
                </div>

                <!-- Phone -->
                <div>
                    <x-input-label for="phone" :value="('Phone')" class="font-semibold text-blue-700" />
                    <x-text-input id="phone" type="text" name="phone"
                        class="block w-full mt-1 border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                        :value="old('phone')" required autocomplete="phone" />
                    <x-input-error :messages="$errors->get('phone')" class="mt-2 text-red-500" />
                </div>

                <!-- Photo -->
                <div>
                    <x-input-label for="photo" :value="('Photo')" class="font-semibold text-blue-700" />
                    <x-text-input id="photo" type="file" name="photo"
                        class="block w-full mt-1 text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-100 file:text-blue-700 hover:file:bg-blue-200"
                        :value="old('photo')" required autocomplete="photo" />
                    <x-input-error :messages="$errors->get('photo')" class="mt-2 text-red-500" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="('Password')" class="font-semibold text-blue-700" />
                    <x-text-input id="password" type="password" name="password"
                        class="block w-full mt-1 border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                        required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <x-input-label for="password_confirmation" :value="('Confirm Password')" class="font-semibold text-blue-700" />
                    <x-text-input id="password_confirmation" type="password" name="password_confirmation"
                        class="block w-full mt-1 border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                        required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500" />
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-between">
                    <a href="{{ route('login') }}" class="text-sm font-medium text-blue-600 hover:text-blue-800">
                        Already registered?
                    </a>
                    <button type="submit"
                        class="px-6 py-2 font-bold text-white transition-transform transform bg-blue-600 rounded-lg shadow-md hover:bg-blue-700 hover:scale-105">
                        Register
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
