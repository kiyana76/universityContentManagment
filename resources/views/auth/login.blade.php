@extends('master')

@section('content')
    <section class="sign-area panel p-40">
        @php
            $email_link = Session::get('enable_email_btn');
            $exist_user_email = Session::get('exist_user_email');
        @endphp

        @isset($email_link)
            <div class="mb-10">
                <form action="{{ route('send.verify.email') }}" method="post">
                    @csrf
                    <input type="hidden" name="exist_user_email" value="{{ $exist_user_email }}">
                    <button type="submit" class="btn-block btn btn-success mb-10">ارسال مجدد لینک فعال سازی</button>
                </form>
            </div>
        @endisset
        <h3 class="sign-title">ورود <small>یا <a href="{{ route('register') }}" class="color-green">ساخت حساب جدید</a></small></h3>
        <div class="row row-rl-0">
            <div class="col-sm-6 col-md-7 col-right">
                <form class="p-40" action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label class="sr-only">پست الکترونیکی</label>
                        <input type="email" id="email" name="email" class="form-control input-lg" placeholder="پست الکترونیکی">
                    </div>
                    <div class="form-group">
                        <label class="sr-only">رمز ورود</label>
                        <input type="password" id="password" name="password" class="form-control input-lg" placeholder="رمز ورود">
                    </div>
                    <div class="form-group">
                        <a href="{{ route('password.request') }}" class="forgot-pass-link color-green">رمز عبور خود را فراموش کرده اید؟</a>
                    </div>
                    <div class="custom-checkbox mb-20">
                        <input type="checkbox" id="remember_account" checked>
                        <label class="color-mid" for="remember_account">مرا به خاطر بسپار</label>
                    </div>
                    <button type="submit" class="btn btn-block btn-lg">ورود</button>
                </form>
                <span class="or">یا</span>
            </div>
            <div class="col-sm-6 col-md-5 col-left">
                <div class="social-login p-40">
                    <div class="mb-20">
                        <button class="btn btn-lg btn-block btn-social btn-google-plus"><i class="fa fa-google-plus"></i>ورود با حساب گوگل</button>
                    </div>
                    <div class="custom-checkbox mb-20">
                        <input type="checkbox" id="remember_social" checked>
                        <label class="color-mid" for="remember_social">مرا به خاطر بسپار</label>
                    </div>
                    <div class="text-center color-mid">
                        حساب کاربری ندارید؟ <a href="{{ route('register') }}" class="color-green">ساخت حساب</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
