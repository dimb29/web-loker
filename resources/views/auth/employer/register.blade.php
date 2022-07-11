<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('registers') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Nama Perusahaan') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="telepon" value="{{ __('Nomor Telepon') }}" />
                <x-jet-input id="telepon" class="block mt-1 w-full" type="text" name="telepon" :value="old('telepon')" required />
            </div>

            <div class="flex flex-row">
                <div class="mt-4 w-3/4 mr-2">
                    <x-jet-label for="alamat" value="{{ __('Alamat') }}" />
                    <x-jet-input id="alamat" class="block mt-1 w-full" type="text" name="alamat" :value="old('alamat')" required />
                </div>

                <div class="mt-4 w-1/4">
                    <x-jet-label for="kodepos" value="{{ __('Kode Pos') }}" />
                    <x-jet-input id="kodepos" class="block mt-1 w-full" type="text" name="kodepos" :value="old('kodepos')" required />
                </div>
            </div>

            <div class="flex flex-row">
                <div class="mt-4 mr-1">
                    <x-jet-label for="kota" value="{{ __('Kota') }}" />
                    <x-jet-input id="kota" class="block mt-1 w-full" type="text" name="kota" :value="old('kota')" required />
                </div>

                <div class="mt-4">
                    <x-jet-label for="provinsi" value="{{ __('Provinsi') }}" />
                    <x-jet-input id="provinsi" class="block mt-1 w-full" type="text" name="provinsi" :value="old('provinsi')" required />
                </div>
            </div>

            <div class="mt-4">
                <x-jet-label for="referral" value="{{ __('Kode Referral') }}" />
                <x-jet-input id="referral" class="block mt-1 w-full" type="text" name="referral" :value="old('referral')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
