<?php

namespace App\Http\Controllers\Employer;

use Laravel\Fortify\Rules\Password;
use Illuminate\Routing\Controller;

trait PasswordValidationRules
{
    /**
     * Get the validation rules used to validate passwords.
     *
     * @return array
     */
    protected function passwordRules()
    {
        return ['required', 'string', new Password, 'confirmed'];
    }
}
