@extends('emails.master')
@section('content')
    <div>
        <h2>{{ $user->full_name }}  عزیز سلام</h2>
        <p>با کلیک بروی دکمه زیر حساب کاربری شما فعال می‌شود.</p>
        <div style="text-align: center">
            <button class="button"><a href="{{ route('verify', $user->verification_token) }}">کلیک کنید!</a></button>
        </div>
        <div style="text-align: center">
            <p style="font-size: small">با تشکر از طرف تیم جزوه سرا!</p>
        </div>
    </div>
@endsection
