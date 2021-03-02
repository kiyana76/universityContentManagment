<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Resource;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $resources = Resource::approve()->get()->take(20);
        return view('guest.index', compact('resources'));
    }
}
