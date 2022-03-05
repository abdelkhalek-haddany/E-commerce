@extends('shop/layouts/authers/_master')
@section('title','Login')
@section('content')
<div class="login">
    <div class="container">
    <div class="section-title">
        <h2 class="title">
            Login
        </h2>
    </div>

    <form class="auth-form login-form" method="POST" action="{{route('login')}}">
        @csrf
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Your email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Your password" name="password" required autocomplete="current-password">

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
                <div class="remember_me">
            <input type="checkbox" name="remember_me"> 
            <span>Remeber me next time</span>
        </div>

        <input class="form-control" type="submit" value="Login">

        @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                Forgot Your Password?
            </a>
        @endif

        <div class="sign-up">
            If you don't have an acount you can <a href="{{route('register')}}">create account here</a>
        </div>
    </form>
    
    
</div>
</div>
@stop
