<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        if(!auth()->user()->isAdmin())
            return redirect()->route('admin.login');
        return view('admin.pages.dashboard');
    }
}
