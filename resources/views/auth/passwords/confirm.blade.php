@extends('shop/layouts/authers/_master')
@section('title','Welcome')
@section('content')
<div class="login">
    <div class="container">
    <div class="section-title">
        <h2 class="title">
            {{ __('Confirm Password') }}
        </h2>
    </div>
        <form class="auth-form" method="POST" action="{{ route('password.confirm') }}">
            @csrf

                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="enter the password" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <input type="submit" class="form-control"
                        value="{{ __('Confirm Password') }}">

                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
        </form>
    </div>
</div>
@endsection
