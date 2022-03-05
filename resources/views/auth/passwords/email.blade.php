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
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form class="auth-form " method="POST" action="{{ route('password.email') }}">
                @csrf

                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Your Email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    <input type="submit" class="form-control" value="{{ __('Send Password Reset Link') }}">
            </form>
    </div>
</div>
@endsection
