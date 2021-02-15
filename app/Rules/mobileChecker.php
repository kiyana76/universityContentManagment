<?php

namespace App\Rules;

use App\Utilities\StringUtil;
use Illuminate\Contracts\Validation\Rule;

class mobileChecker implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $value = StringUtil::toLatinNumber($value);

        // Check if it's Iran phone number format or not
        if (substr($value, 0, 2) == "00" || substr($value, 0, 1) == "+") {
            return preg_match('/^(\+|00)[0-9]{1,3}[0-9]{4,14}(?:x.+)?$/m', $value);
        }
        else {
            return preg_match('/^(?:0|\+?98)9[0-9]{9}$/m', $value);
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'شماره موبایل معتبر نمی‌باشد.';
    }
}
