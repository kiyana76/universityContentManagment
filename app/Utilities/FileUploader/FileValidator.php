<?php

namespace App\Utilities\FileUploader;

use Validator;

class FileValidator
{
    const SUCCESS_VALIDATION = 1;
    const FAILED_VALIDATION  = 0;


    public function image($inputName, int $max)
    {
        $role = [
             $inputName => "required|image|mimes:jpeg,jpg,png,gif|max:" . $max,
        ];
        $validator = Validator::make(request()->only($inputName), $role);

        if ($validator->fails()) {
            return [
                 'status' => self::FAILED_VALIDATION,
                 'errors' => $validator->errors()->all(),
            ];
        }

        return [
             'status' => self::SUCCESS_VALIDATION,
        ];

    }


    public function file($inputName, int $max) {
        $role = [
            $inputName => "required|file|mimes:pdf,zip,rar|max:" . $max,
        ];

        $validator = Validator::make(request()->only($inputName), $role);

        if ($validator->fails()) {
            return [
                'status' => self::FAILED_VALIDATION,
                'errors' => $validator->errors()->all(),
            ];
        }
        return [
            'status' => self::SUCCESS_VALIDATION,
        ];
    }


    public function ignore($inputName, int $max)
    {
        $role = [
             $inputName => "max:{$max}",
        ];

        $validator = Validator::make(request()->only($inputName), $role);

        if ($validator->fails()) {
            return [
                 'status' => self::FAILED_VALIDATION,
                 'errors' => $validator->errors()->all(),
            ];
        }

        return [
             'status' => self::SUCCESS_VALIDATION,
        ];
    }
}
