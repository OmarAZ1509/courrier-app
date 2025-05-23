<x-guest-layout>
    <div class="min-h-screen flex flex-col justify-center items-center bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
        <!-- Logo du Royaume du Maroc -->
        <div class="mb-6">
            <img src="{{ asset('images/maroc-logo.png') }}" alt="Logo Royaume du Maroc" class="h-24">
        </div>

        <!-- Titre -->
        <h2 class="text-center text-2xl font-extrabold text-red-800 mb-2">وزارة الداخلية - Royaume du Maroc</h2>
        <h3 class="text-center text-lg text-gray-700 mb-6">منصة تدبير المراسلات الإدارية</h3>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="bg-white shadow-md rounded-lg px-8 pt-6 pb-8 w-full max-w-md border border-red-200">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Mot de passe')" />
                <x-text-input id="password" class="block mt-1 w-full"
                    type="password"
                    name="password"
                    required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-red-700 shadow-sm focus:ring-red-500" name="remember">
                    <span class="ml-2 text-sm text-gray-600">Se souvenir de moi</span>
                </label>
            </div>

            <!-- Buttons -->
            <div class="flex items-center justify-between mt-6">
                @if (Route::has('password.request'))
                    <a class="text-sm text-red-700 hover:text-red-900" href="{{ route('password.request') }}">
                        {{ __('Mot de passe oublié ?') }}
                    </a>
                @endif

                <x-primary-button class="bg-red-700 hover:bg-red-800 text-white">
                    {{ __('Se connecter') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
