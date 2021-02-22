<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class CaptchaServiceController extends Controller
{
    public function reloadCaptcha() {
        return response()->json(['captcha'=> captcha_img('math')]);
    }
}
