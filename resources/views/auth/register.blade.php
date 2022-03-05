
@extends('shop/layouts/authers/_master')
@section('title','Register')
@section('content')
<div class="login">
    <div class="container">
    <div class="section-title">
        <h2 class="title">
            Register
        </h2>
    </div>

    <form class="auth-form login-form" method="POST" action="{{route('register')}}">
        @csrf

        <input class="form-control @error('first_name') is-invalid @enderror"value="{{ old('first_name') }}" type="text" name="first_name" placeholder="Your First Name">
        @error('first_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <input class="form-control @error('last_name') is-invalid @enderror"value="{{ old('last_name') }}" type="text" name="last_name" placeholder="Your Last Name"> 
        @error('last_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <input class="form-control @error('phone') is-invalid @enderror"value="{{ old('phone') }}" type="phone" name="phone" placeholder="Your Phone">
        @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <input class="form-control @error('email') is-invalid @enderror"value="{{ old('email') }}" type="email" name="email" placeholder="Your Email"> 
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <input class="form-control @error('password') is-invalid @enderror"value="{{ old('password') }}" type="password" name="password" placeholder="Your Password"> 
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Your Password">
        @error('password_confirm')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <input class="form-control @error('birth_day') is-invalid @enderror"value="{{ old('birth_day') }}" type="date" name="birth_day"> 
        @error('birth_day')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <div class="remember_me">
            <input type="checkbox" name="is_subscribe"> 
            <span> Receive offers from our partners</span>
        </div>

        <input class="form-control" type="submit" value="Register">
        <div class="sign-up">
            If you have an acount you can <a href="{{route('login')}}">login  here</a>
        </div>
    </form>
</div>
</div>
@stop