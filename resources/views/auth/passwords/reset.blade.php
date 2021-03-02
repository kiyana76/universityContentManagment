@extends('master')
@section('content')
    <section class="sign-area panel p-40">
        <h3 class="sign-title">تغییر رمز عبور</h3>
        <div class="row row-rl-0">
            <div class="col-sm-12">
                <form class="p-40" action="{{ route('password.update') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="token" value="{{ $token }}">
                    </div>

                    <div class="form-group">
                        <label class="sr-only">پست الکترونیکی</label>
                        <input id="email" type="email" class="form-control input-lg" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                    </div>

                    <div class="form-group">
                        <label class="sr-only">رمز عبور جدید</label>
                        <input id="password" type="password" class="form-control input-lg" name="password" value="{{ $email ?? old('email') }}" required autocomplete="new-password">
                    </div>

                    <div class="form-group">
                        <label class="sr-only">تکرار رمز عبور جدید</label>
                        <input id="password-confirm" type="password" class="form-control input-lg" name="password_confirmation" required autocomplete="new-password">
                    </div>
                    <button type="submit" class="btn btn-block btn-lg">تغییر رمز عبور</button>
                </form>
            </div>
        </div>
    </section>
@endsection
