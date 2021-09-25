<?php

namespace App\Validations;

use App\Validations\AbstractValidation;

class ReadmeFormValidation extends AbstractValidation
{
    public static function formValidate(array $data): string
    {
        return self::validate($data, [
            'username' => 'required',
            'about' => 'required',
            'bgcolor' => 'required',
        ]);
    }
}
