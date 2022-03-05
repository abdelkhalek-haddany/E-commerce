<main id="app">
<div id="upper" class="header-upper d-none d-md-block">
    <div class="container">
        <div class="row">
      <div class="col-sm-6">
            <div class="email detail-item"><i class="fas fa-envelope"></i>
              <a href="mailto:{{__('shop/layouts/headers/upper.support_email')}}">
                <span>{{__('shop/layouts/headers/upper.support_email')}}</span>
              </a>
            </div>
            <div class="deals detail-item"><i class="fas fa-tags"></i>
              <a href="#hot_deals"><span>{{__('shop/layouts/headers/upper.today_deals')}}</span>
              </a></div>
      </div>
      <div class="col-sm-6 d-flex justify-content-end">
        <div class="auth item">
          @if(Auth::check())
              <a class="login" href="{{route("logout")}}" rel="nofollow" title="Log out">
                {{__('shop/layouts/headers/upper.log_out')}}
              </a>
          @else
              <i class="fas fa-user"></i>
              <a class="register" href="{{route("register")}}" data-link-action="display-register-form">
                {{__('shop/layouts/headers/upper.register')}}
              </a>
              <span class="or-text">{{__('shop/layouts/headers/upper.or')}}</span>
              <a class="login" href="{{route("login")}}" rel="nofollow" title="Log in to your customer account">
                {{__('shop/layouts/headers/upper.sign_in')}}
              </a>
          @endif
        </div>

        {{-- <div class="dropdown item">
          <span class="dropdown-toggle" type="button" id="dropdown-currency" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Currency
          </span>
          <div class="dropdown-menu" aria-labelledby="dropdown-currency">
            <a class="dropdown-item" href="#">MDH</a>
            <a class="dropdown-item" href="#">USD</a>
          </div>
        </div> --}}
        <div class="item">
        <ul class="navbar-nav"> 
        <div class="dropdown">
          <span class="dropdown-toggle" type="button" id="dropdown-language" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{__('shop/layouts/headers/navbar.language')}}
          </span>
          <div class="dropdown-menu" aria-labelledby="dropdown-language">
                <a class="dropdown-item" id="en" rel="alternate" hreflang="en" href="{{ LaravelLocalization::getLocalizedURL("en", null, [], true) }}">
                    English
                </a>

                <a class="dropdown-item" id="ar" rel="alternate" hreflang="ar" href="{{ LaravelLocalization::getLocalizedURL("ar", null, [], true) }}">
                    العربية
                </a>
            </div>
          </div>
        </ul>
        </div>
        </div>
    </div>
    </div>
  </div>