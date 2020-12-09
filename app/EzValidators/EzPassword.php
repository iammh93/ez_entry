<?php

namespace App\EzValidators;

use Laravel\Fortify\Rules\Password as BasePassword;

class EzPassword extends BasePassword {
    protected $length = 6;
}
