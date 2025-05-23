<x-guest-layout>
    <div class="min-h-screen flex flex-col justify-center items-center bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
        <!-- Logo du Royaume du Maroc -->
        <div class="mb-6">
            <img src="{{ asset('images/maroc-logo.png') }}" alt="Logo Royaume du Maroc" class="h-24 mx-auto">
        </div>

        <!-- Titre -->
        <h2 class="text-center text-2xl font-extrabold text-red-800 mb-2">وزارة الداخلية - Royaume du Maroc</h2>
        <h3 class="text-center text-lg text-gray-700 mb-6">تطبيق تدبير المراسلات الإدارية</h3>

        <!-- Formulaire de réinitialisation du mot de passe -->
        <form method="POST" action="{{ route('password.store') }}" class="bg-white shadow-md rounded-lg px-8 pt-6 pb-8 w-full max-w-md border border-red-200">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Button -->
            <div class="flex items-center justify-end mt-6">
                <x-primary-button class="bg-red-700 hover:bg-red-800 text-white">
                    {{ __('Reset Password') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
