<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function showLoginForm(Request $request)
    {
        if(auth()->user() && auth()->user()->isAdmin())
            return redirect()->route('admin.dashboard');

        return view('admin.login');
    }

    public function login(Request $request)
    {
        if( auth()->user() && auth()->user()->isAdmin())
            return redirect()->route('admin.dashboard');

        $this->validate($request, [
            'username' => 'required|email',
            'password' => 'required|min:6',
            'captcha' => 'required|captcha',
        ]);


        if (auth()->attempt([
            'email'    => $request->username,
            'password' => $request->password,
            'type'     => 'admin',
        ], $request->remember)) {
            return redirect()->route('admin.dashboard');
        }

        // Authentication failed, redirect back to the login form
        return redirect()
            ->back()
            ->withInput($request->only('email', 'remember'))
            ->withErrors(['Username or Password is invalid.']);
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('admin.login');
    }
}
