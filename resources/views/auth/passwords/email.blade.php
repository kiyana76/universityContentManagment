@extends('master')
@section('content')
    <section class="sign-area panel p-40">
        <h3 class="sign-title">بازیابی رمز ورود</h3>
        <div class="row row-rl-0">
            <div class="col-sm-12">
                <form class="p-40" action="{{ route('password.email') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label class="sr-only">پست الکترونیکی</label>
                        <input type="email" name="email" id="email" class="form-control input-lg" placeholder="پست الکترونیکی" required autocomplete="email" value="{{ old('email') }}">
                    </div>
                    <button type="submit" class="btn btn-block btn-lg">ارسال ایمیل</button>
                </form>
            </div>
        </div>
    </section>
@endsection
