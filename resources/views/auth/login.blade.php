<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                          type="password"
                          name="password"
                          required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-between mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>

    <!-- Divider and Google Sign-In Button -->
    <div class="text-center my-4"><br>

        <hr class="my-2">
        <br>
        <span class="text-gray-500">Or</span>
    </div>
<br>
    <div class="flex justify-center">
        <a href="{{ route('google-auth') }}" class="flex items-center justify-center bg-blue border rounded-full py-2 px-4 shadow-sm hover:bg-blue-900 focus:outline-none focus:ring-focus:ring-indigo-800 focus:ring-offset-4">
            <!-- Google Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 48 48">
                <path fill="#4285F4" d="M24 9.5c3.5 0 6.4 1.1 8.7 3.2L39.8 6.7C35.6 3 30.2 0 24 0 14.6 0 6.4 5.9 2.4 14.4l8.1 6.3C12.5 14.5 17.8 9.5 24 9.5z"></path>
                <path fill="#34A853" d="M46.5 20H24v8.5h12.7c-1.3 3.7-3.8 6.7-7.1 8.7l8.2 6.4c4.9-4.5 7.7-11.3 7.7-18.6 0-1.4-0.1-2.7-0.3-4z"></path>
                <path fill="#FBBC05" d="M11.1 29.7c-1-3-1-6.3 0-9.3l-8.2-6.4C0.8 17.5 0 20.7 0 24s0.8 6.5 2.9 10.3l8.2-6.4z"></path>
                <path fill="#EA4335" d="M24 48c6.4 0 11.8-2.1 15.7-5.7l-8.2-6.4c-2.4 1.7-5.4 2.7-8.7 2.7-6.2 0-11.6-4-13.5-9.5l-8.1 6.3C6.4 42 14.6 48 24 48z"></path>
            </svg>
            &nbsp;&nbsp;&nbsp;
            <span class="text-sm text-left text-gray-700 dark:text-gray-200">Continue with Google</span>
        </a>
    </div>
</x-guest-layout>
