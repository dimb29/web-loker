<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if(Auth::guard('employer')->user() != null)
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            wire:model="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-jet-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                @if(Auth::guard('employer')->user()->profile_photo_path != null)
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ url(Auth::guard('employer')->user()->profile_photo_path) }}" alt="{{ Auth::guard('employer')->user()->name }}" class="rounded-full h-20 w-20 object-cover">
                </div>
                @endif

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview">
                    <span class="block rounded-full w-20 h-20"
                          x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-jet-secondary-button>


                <x-jet-input-error for="photo" class="mt-2" />
            </div>

            <!-- First Name -->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="name" value="{{ __('Nama Perusahaan') }}" />
                <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
                <x-jet-input-error for="name" class="mt-2" />
            </div>

            <!-- Email -->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
                <x-jet-input-error for="email" class="mt-2" />
            </div>

            <!-- Telepon -->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="telepon" value="{{ __('Nomor Telepon') }}" />
                <x-jet-input id="telepon" type="text" class="mt-1 block w-full" wire:model.defer="state.telepon" autocomplete="telepon" />
                <x-jet-input-error for="telepon" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <div class="flex flex-row">
                    <!-- Alamat -->
                    <div class="w-3/4 mr-2">
                        <x-jet-label for="alamat" value="{{ __('Alamat Perusahaan') }}" />
                        <x-jet-input id="alamat" type="text" class="mt-1 block w-full" wire:model.defer="state.alamat" autocomplete="alamat" />
                        <x-jet-input-error for="alamat" class="mt-2" />
                    </div>

                    <!-- Kode Pos -->
                    <div class="w-1/4">
                        <x-jet-label for="kodepos" value="{{ __('Kode Pos') }}" />
                        <x-jet-input id="kodepos" type="text" class="mt-1 block w-full" wire:model.defer="state.kodepos" autocomplete="kodepos" />
                        <x-jet-input-error for="kodepos" class="mt-2" />
                    </div>
                </div>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <div class="flex flex-row">
                    <!-- Alamat -->
                    <div class="w-1/2 mr-2">
                        <x-jet-label for="kota" value="{{ __('Kota') }}" />
                        <x-jet-input id="kota" type="text" class="mt-1 block w-full" wire:model.defer="state.kota" autocomplete="kota" />
                        <x-jet-input-error for="kota" class="mt-2" />
                    </div>

                    <!-- Provinsi -->
                    <div class="w-1/2">
                        <x-jet-label for="provinsi" value="{{ __('Provinsi') }}" />
                        <x-jet-input id="provinsi" type="text" class="mt-1 block w-full" wire:model.defer="state.provinsi" autocomplete="provinsi" />
                        <x-jet-input-error for="provinsi" class="mt-2" />
                    </div>
                </div>
            </div>
        @else
                <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                    <!-- Profile Photo File Input -->
                    <input type="file" class="hidden"
                                wire:model="photo"
                                x-ref="photo"
                                x-on:change="
                                        photoName = $refs.photo.files[0].name;
                                        const reader = new FileReader();
                                        reader.onload = (e) => {
                                            photoPreview = e.target.result;
                                        };
                                        reader.readAsDataURL($refs.photo.files[0]);
                                " />

                    <x-jet-label for="photo" value="{{ __('Photo') }}" />

                    <!-- Current Profile Photo -->
                    <div class="mt-2" x-show="! photoPreview">
                        <img src="{{ url($this->user->profile_photo_path) }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                    </div>

                    <!-- New Profile Photo Preview -->
                    <div class="mt-2" x-show="photoPreview">
                        <span class="block rounded-full w-20 h-20"
                            x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                        </span>
                    </div>

                    <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                        {{ __('Select A New Photo') }}
                    </x-jet-secondary-button>

                    <!-- @if ($this->user->profile_photo_path)
                        <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                            {{ __('Remove Photo') }}
                        </x-jet-secondary-button>
                    @endif -->

                    <x-jet-input-error for="photo" class="mt-2" />
                </div>

            <!-- First Name -->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="first_name" value="{{ __('First Name') }}" />
                <x-jet-input id="first_name" type="text" class="mt-1 block w-full" wire:model.defer="state.first_name" autocomplete="first_name" />
                <x-jet-input-error for="first_name" class="mt-2" />
            </div>

            <!-- Last Name -->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="last_name" value="{{ __('Last Name') }}" />
                <x-jet-input id="last_name" type="text" class="mt-1 block w-full" wire:model.defer="state.last_name" autocomplete="last_name" />
                <x-jet-input-error for="last_name" class="mt-2" />
            </div>

            <!-- Email -->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
                <x-jet-input-error for="email" class="mt-2" />
            </div>
        @endif
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
