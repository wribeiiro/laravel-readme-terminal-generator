<?php

namespace App\Validations;

use Illuminate\Support\Facades\Validator;

abstract class AbstractValidation
{
    public static function validate(array $data, array $rules): string
    {
        $errors = "";
        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            $errors = implode('.', $validator->errors()->all());
        }

        return $errors;
    }
}
