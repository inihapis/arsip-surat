<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession
        <div class="text-center">
            <h2 class="text-xl font-extrabold">Sistem Informasi Manajemen Surat</h2>
            <p class="text-lg">PT. LANGGENG INOVASI TEKNOLOGI</p>
        </div>
        <div class="py-5 flex items-center text-sm text-gray-800 before:flex-1 before:border-t before:border-primary/30 before:me-6 after:flex-1 after:border-t after:border-primary/30 after:ms-6">Silahkan Login</div>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center text-center mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="w-full justify-center">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
        <hr class="border-primary/30 mt-6 mb-4">
        <h3 class="text-center text-gray-800">
        &copy; 2024 <a class="font-bold hover:text-primary transition-all duration-200 underline underline-offset-2 decoration-1 hover:no-underline cursor-pointer " href="https://langgenginovasiteknologi.com/" target="_blank">PT. Langgeng Inovasi Teknologi</a>
        </h3>
    </x-authentication-card>
</x-guest-layout>
