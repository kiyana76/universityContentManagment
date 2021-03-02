@extends('master')
@section('content')
    <section class="sign-area panel p-40">
        <h3 class="sign-title">ثبت نام <small>یا <a href="{{ route('login') }}" class="color-green">ورود</a></small></h3>
        <div class="row row-rl-0">
            <div class="col-sm-6 col-md-7 col-right">
                <form class="p-40" action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label class="sr-only">نام</label>
                        <input type="text" name="name" id="name" class="form-control input-lg" placeholder="نام" required value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label class="sr-only">نام خانوادگی</label>
                        <input type="text" name="family" id="family" class="form-control input-lg" placeholder="نام خانوادگی" required value="{{ old('family') }}">
                    </div>
                    <div class="form-group">
                        <label class="sr-only">پست الکترونیکی</label>
                        <input type="email" name="email" id="email" class="form-control input-lg" placeholder="پست الکترونیکی" required autocomplete="email" value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <label class="sr-only">موبایل</label>
                        <input type="number" name="mobile" id="mobile" class="form-control input-lg" placeholder="موبایل" value="{{ old('mobile') }}">
                    </div>
                    <div class="form-group">
                        <label class="sr-only">رمز عبور</label>
                        <input type="password" name="password" id="password" class="form-control input-lg" placeholder="رمز عبور" required>
                    </div>
                    <div class="form-group">
                        <label class="sr-only">تایید رمز عبور</label>
                        <input type="password" id="password-confirm" name="password_confirmation" class="form-control input-lg" placeholder="تایید رمز عبور" required>
                    </div>
                    {{--<div class="custom-checkbox mb-20">
                        <input type="checkbox" id="agree_terms">
                        <label class="color-mid" for="agree_terms">أنا أوافق على <a href="terms_conditions.html" class="color-green">تعليمات الاستخدام</a> و <a href="terms_conditions.html" class="color-green">بيان الخصوصية</a>.</label>
                    </div>--}}
                    <button type="submit" class="btn btn-block btn-lg">ثبت نام</button>
                </form>
                <span class="or">یا</span>
            </div>
            <div class="col-sm-6 col-md-5 col-left">
                <div class="social-login p-40">
                    <div class="mb-20">
                        <button class="btn btn-lg btn-block btn-social btn-google-plus"><i class="fa fa-google-plus"></i>ورود با گوگل</button>
                    </div>
                    {{--<div class="custom-checkbox mb-20">
                        <input type="checkbox" id="remember_social" checked>
                        <label class="color-mid" for="remember_social">احتفظ بتسجيل دخولي على هذا الحاسوب.</label>
                    </div>--}}
                    <div class="text-center color-mid">
                        آیا حساب کاربری دارید؟ <a href="{{ route('login') }}" class="color-green">ورود</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
