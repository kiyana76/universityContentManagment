<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Rules\mobileChecker;
use Auth;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255', 'min:3'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'family' => ['required', 'string', 'min:3', 'max:255'],
            'mobile' => [new mobileChecker]
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $data['verification_token'] = str_random(16);
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'family' => $data['family'],
            'mobile' => $data['mobile'],
            'verification_token' => $data['verification_token'],
            'type' => 'user'
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 201)
            : redirect($this->redirectPath());
    }

    public function verifyEmail($token) {
        // check user token and current status
        $user = User::where('verification_token', $token)
            ->whereNull('email_verified_at')
            ->firstOrFail();

        $user->email_verified_at = Carbon::now();
        $user->verification_token = null;
        $user->save();

        auth()->login($user,true);

        return redirect($this->redirectTo);
    }

    public function sendVerifyEmail(Request $request) {
        $user = User::whereEmail($request->user_email)->firstOrFail();
        if($user->hasVerifiedEmail()) {
            auth()->login($user);
        }

        event(new Registered($user));

        return back()->with([
            'alert-title'  => 'ایمیل فعالسازی حساب کاربری شما ارسال شد.',
            'alert-class'  => 'success',
        ]);

    }
}
