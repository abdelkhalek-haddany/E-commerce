@extends('shop/layouts/authers/_master')
@section('meta')
    <meta content="abdelkhalek haddany about,about blog" name="description">
    <meta content="about haddany, about abdelkhalek, about abdelkhalek haddany,abdelkhalek haddany social media"
        name="keywords">
@endsection
@section('title', __('shop/layouts/headers/navbar.about'))
@section('content')
    <div id="about" class="about">
        <div class="section-title">
            <h2 class="title">
                {{ __('shop/layouts/headers/navbar.about') }}
            </h2>

        </div>
        <div class="container">
            <div class="about-content">
                <div class="row about-me">
                    <div class="col-lg-4  order-lg-2">
                        <div class="about-img">
                            <img src="{{ asset('assets/images/about2.svg') }}" alt="image">
                        </div>
                    </div>
                    <div class="col-lg-8 pt-4 pt-lg-0 order-lg-1 order-xm-1 content">
                        <h3 class="sub-title wow fadeInTopLeft">{{ __('shop/pages/about.for_me') }}</h3>
                        <p>
                            {{ __('shop/pages/about.for_me_content') }}
                        </p>
                        <br>
                        <ul>
                            <li><i class="fas fa-check"></i><span>{{ __('shop/pages/about.web_dev') }}</span></li>
                            <li><i class="fas fa-check"></i><span>{{ __('shop/pages/about.web_des') }}</span></li>
                            <li><i class="fas fa-check"></i><span>{{ __('shop/pages/about.mob_apps') }}</span></li>
                        </ul>
                        <h5>
                            {{ __('shop/pages/about.my_acounts') }}
                        </h5>
                        <div class="social-links mt-3">
                            <a href="{{ __('shop/global.twitter_link') }}" target="_blank"
                                class="twitter">{{ __('shop/global.twitter') }}<i class="fab fa-twitter"></i></a>
                            <a href="{{ __('shop/global.instagram_link') }}" target="_blank"
                                class="instagram">{{ __('shop/global.instagram') }}<i
                                    class="fab fa-instagram"></i></a>
                            <a href="{{ __('shop/global.linkedin_link') }}" target="_blank"
                                class="linkedin">{{ __('shop/global.linkedin') }}<i class="fab fa-linkedin"></i></a>
                            <a href="{{ __('shop/global.youtube_link') }}" target="_blank"
                                class="youtube">{{ __('shop/global.youtube') }}<i class="fab fa-youtube"></i></a>
                            <a href="{{ __('shop/global.facebook_link') }}" target="_blank"
                                class="facebook">{{ __('shop/global.facebook') }}<i class="fab fa-facebook"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row about-blog">
                    <div class="col-lg-4  order-lg-1">
                        <div class="about-img">
                            <img src="{{ asset('assets/images/blog-about.gif') }}" alt="image">
                        </div>
                    </div>
                    <div class="col-lg-8 pt-4 pt-lg-0 order-lg-2 order-xm-1 content">
                        <h3 class="sub-title for-blog">{{ __('shop/pages/about.for_blog') }}</h3>
                        <p>
                            {{ __('shop/pages/about.for_blog_content') }}
                        </p>
                        <br>
                        <a href="{{ route('posts') }}"
                            class="btn-start-blog scrollto">{{ __('shop/pages/about.go_to_blog') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
