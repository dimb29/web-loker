<?php

namespace Laravel\Jetstream\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateProfileInformationForm extends Component
{
    use WithFileUploads;

    /**
     * The component's state.
     *
     * @var array
     */
    public $state = [];

    /**
     * The new avatar for the user.
     *
     * @var mixed
     */
    public $photo;

    /**
     * Prepare the component.
     *
     * @return void
     */
    public function mount()
    {
        if(Auth::guard('employer')->user() != null){
            $this->state = Auth::guard('employer')->user()->withoutRelations()->toArray();
        }else{
            $this->state = Auth::user()->withoutRelations()->toArray();
        }
    }

    /**
     * Update the user's profile information.
     *
     * @param  \Laravel\Fortify\Contracts\UpdatesUserProfileInformation  $updater
     * @return void
     */
    public function updateProfileInformation(UpdatesUserProfileInformation $updater)
    {
        $this->resetErrorBag();

        if(Auth::guard('employer')->user() != null){
            $updater->update(
                Auth::guard('employer')->user(),
                $this->photo
                    ? array_merge($this->state, ['photo' => $this->photo])
                    : $this->state
            );
        }else{
            $updater->update(
                Auth::user(),
                $this->photo
                    ? array_merge($this->state, ['photo' => $this->photo])
                    : $this->state
            );
        }

        if (isset($this->photo)) {
            return redirect()->route('employer-profil');
        }

        $this->emit('saved');

        $this->emit('refresh-navigation-dropdown');
    }

    /**
     * Delete user's profile photo.
     *
     * @return void
     */
    public function deleteProfilePhoto()
    {
        if(Auth::guard('employer')->user() != null){
            Auth::guard('employer')->user()->deleteProfilePhoto();
        }else{
            Auth::user()->deleteProfilePhoto();
        }

        $this->emit('refresh-navigation-dropdown');
    }

    /**
     * Get the current user of the application.
     *
     * @return mixed
     */
    public function getUserProperty()
    {
        if(Auth::guard('employer')->user() != null){
            return Auth::guard('employer')->user();
        }else{
            return Auth::user();
        }
    }

    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('profile.update-profile-information-form');
    }
}
