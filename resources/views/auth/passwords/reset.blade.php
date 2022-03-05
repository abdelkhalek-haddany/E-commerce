@extends('shop/layouts/authers/_master')
@section('title','Welcome')
@section('content')
<div class="login">
    <div class="container">
    <div class="section-title">
        <h2 class="title">
            {{ __('Reset Password') }}
        </h2>
    </div>
        <form class="auth-form" method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" placeholder="Enter your email" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter the password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm the password" required autocomplete="new-password">

                    <input type="submit" class="form-control"
                        value="{{ __('Reset Password') }}">
        
        </form>
    </div>
</div>
@endsection
