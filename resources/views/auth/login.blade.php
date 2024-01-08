<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="mb-4">
            <h1 class="uppercase font-black text-3xl">UdD Queuing System</h1>
        </div>
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <div class="mb-6">
                <h1 class="uppercase font-black text-xl">Login</h1>
            </div>
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                        :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                {{-- <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                            name="remember">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div> --}}

                <div class="flex items-center justify-end mt-4">
                    {{-- @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif --}}

                    <x-primary-button class="ms-3">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
        <div class="w-full mt-6 px-6 py-4 bg-white shadow-md sm:rounded-lg">
        <h1 class="uppercase font-black text-xl mb-2">Accounts</h1>
        <h1 class="font-black text-lg">Password: universidad</h1>
        <h3 class="font-black text-md">Note: Email number = window number.</h3>
        <h3 class="font-black text-md">Example: registrar1@gmail.com is for Registrar Window 1</h3>
        <div class="grid grid-cols-4 gap-2">
            <div>
                registrar1@gmail.com<br>
                registrar2@gmail.com<br>
                registrar3@gmail.com<br>
                registrar4@gmail.com<br>
                registrar5@gmail.com<br>
                registrar6@gmail.com<br>
                registrar7@gmail.com<br>
            </div>
            <div>
                cashier1@gmail.com<br>
                cashier2@gmail.com<br>
                cashier3@gmail.com<br>
                cashier4@gmail.com<br>
                cashier5@gmail.com<br>
            </div>
            <div>
                acad1@gmail.com<br>
                acad2@gmail.com
            </div>
            <div>
                sao1@gmail.com
            </div>
        </div>
        </div>
    </div>
</x-guest-layout>
