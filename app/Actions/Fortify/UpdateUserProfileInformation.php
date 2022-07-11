<?php

namespace App\Actions\Fortify;

use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        if(Auth::guard('employer')->user() != null){
            Validator::make($input, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'max:255', Rule::unique('employers')->ignore($user->id)],
                'telepon' => ['required', 'string', 'max:20'],
                'alamat' => ['required', 'string', 'max:255'],
                'kodepos' => ['required', 'string', 'max:20'],
                'kota' => ['required', 'string', 'max:255'],
                'provinsi' => ['required', 'string', 'max:255'],
                'photo' => ['nullable', 'image', 'max:1024'],
            ])->validateWithBag('updateProfileInformation');
    
            if (isset($input['photo'])) {
                $user->updateProfilePhoto($input['photo']);
            }
    
            if ($input['email'] !== $user->email &&
                $user instanceof MustVerifyEmail) {
                $this->updateVerifiedUser($user, $input);
            } else {
                $user->forceFill([
                    'name' => $input['name'],
                    'email' => $input['email'],
                    'telepon' => $input['telepon'],
                    'alamat' => $input['alamat'],
                    'kodepos' => $input['kodepos'],
                    'kota' => $input['kota'],
                    'provinsi' => $input['provinsi'],
                ])->save();
            }
        }else{

            Validator::make($input, [
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
                'photo' => ['nullable', 'image', 'max:1024'],
            ])->validateWithBag('updateProfileInformation');
    
            if (isset($input['photo'])) {
                $user->updateProfilePhoto($input['photo']);
            }
    
            if ($input['email'] !== $user->email &&
                $user instanceof MustVerifyEmail) {
                $this->updateVerifiedUser($user, $input);
            } else {
                $user->forceFill([
                    'first_name' => $input['first_name'],
                    'last_name' => $input['last_name'],
                    'email' => $input['email'],
                ])->save();
            }
        }
    }
    

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {  
        if(Auth::guard('employer')->user() != null){
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();
        }else{
        $user->forceFill([
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();
        }

        $user->sendEmailVerificationNotification();
    }
}
