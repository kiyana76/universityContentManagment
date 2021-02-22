<?php

namespace App\Utilities\FileUploader;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Uploader
{
    static private $validator;
    static private $validatorSuccess = false;
    static private $inputName        = "image";
    static private $type             = "image";
    static private $max              = 2048;
    static private $model            = null;
    static private $uploadErrors     = [];
    static private $fileAddress      = null;
    static private $file;


    /**
     * Uploader constructor.
     */
    public function __construct()
    {
        self::$validator = new FileValidator;
    }


    /**
     * $inputName Setter
     *
     * @param string $inputName
     *
     * @return Uploader
     */
    public static function setInputName(string $inputName)
    {
        self::$inputName = $inputName;

        return new static;
    }


    /**
     * $type Setter
     *
     * @param string $type
     *
     * @return Uploader
     */
    public static function setType(string $type)
    {

        if (method_exists(self::$validator, $type)) {
            self::$type = $type;
        }
        else {
            self::$type                 = null;
            self::$uploadErrors['type'] = "Invalid Type sets.";
        }

        return new static;
    }


    /**
     * $max Setter
     *
     * @param int $max
     *
     * @return Uploader
     */
    public static function setMax(int $max)
    {
        self::$max = $max;

        return new static;
    }


    /**
     * $model Setter with check model exists
     *
     * @param string $model
     *
     * @return Uploader
     */
    public static function setModel(string $model)
    {
        if (class_exists($model)) {
            $modelInstance = new $model;
            if ($modelInstance instanceof Model) {
                $array       = explode('\\', $model);
                self::$model = Str::plural(strtolower(end($array)));

                return new static;
            }
        }
        self::$uploadErrors['model'] = "model not found";

        return new static;

    }


    /**
     * Validate file With self::$validate
     */
    static private function validate()
    {
        $validator = self::$validator->{self::$type}(self::$inputName, self::$max);

        self::$validatorSuccess = $validator['status'] == FileValidator::SUCCESS_VALIDATION;

        if (!self::$validatorSuccess) {
            self::$uploadErrors['validation'] = $validator['errors'];

        }
        else {
        self::$file = request()->file(self::$inputName);
        }
    }


    /**
     * check validation and upload errors and upload file
     *
     * @return static
     */
    static public function create()
    {
        self::validate();

        if (self::hasErrors()) {
            return new static;
        }

        $model = self::$model;

        if (is_null($model)) {
            $filePath = "";
        }
        else {
            $year     = Carbon::now()->year;
            $month    = Carbon::now()->month < 10 ? "0" . Carbon::now()->month  : Carbon::now()->month;

            $filePath = "{$model}/{$year}/$month";
        }

        $fileName = str_replace(' ','_',self::$file->getClientOriginalName());
        if (file_exists(public_path("/storage/{$filePath}/$fileName"))) {
            $fileName = time() . "_{$fileName}";
        }

        self::$file->move(public_path("/storage/{$filePath}/"), $fileName);

        self::$fileAddress = "{$filePath}/{$fileName}";

        return new static;

    }


    /**
     * check uploader has any error.
     *
     * @return bool
     */
    static public function hasErrors()
    {
        return !empty(self::$uploadErrors);
    }


    /**
     * return uploader errors.
     *
     * @return array
     */
    static public function errors()
    {
        return self::$uploadErrors;
    }


    /**
     * return file address after upload
     *
     * @return null|string
     */
    static public function address()
    {
        return self::$fileAddress;
    }

}
