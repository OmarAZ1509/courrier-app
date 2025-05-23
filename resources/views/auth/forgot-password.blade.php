<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400 text-right">
        {{ __('هل نسيت كلمة السر؟ لا مشكلة. فقط أخبرنا بعنوان بريدك الإلكتروني وسنرسل لك رابطًا لإعادة تعيين كلمة السر، والذي سيمكنك من اختيار كلمة مرور جديدة.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('البريد الإلكتروني')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('إرسال رابط إعادة تعيين كلمة السر') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
