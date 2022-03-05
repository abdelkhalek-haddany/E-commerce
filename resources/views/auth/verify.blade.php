@extends('shop/layouts/authers/_master')
@section('title','Email Verify')
@section('content')
<div class="verify">
<div class="container">
    <div class="section-title">
        <h2 class="title">
            {{ __('Verify Your Email Address') }}
        </h2>
    </div>
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif
                    <div class="text">
                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    </div>
                    <form class="d-inline auth-form " method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <input type="submit" value="{{ __('click here to request another') }}">.
                    </form>
    </div>
</div>
@endsection
