@extends('shop/layouts/authers/_master')
@section('title',__('shop/pages/thanks_page.thank_you'))
@section('content')
<div class="thank-you">
    <div class="container">
    <h1 class="header">{{__('shop/pages/thanks_page.thank_you')}}{{$name}}!</h1>

	<div class="main-content">
		<i class="fa fa-check main-content__checkmark"></i>
		<p class="main-content__body" data-lead-id="main-content-body">{{__('shop/pages/thanks_page.thanks')}}</p>
	</div>
    <div class="social-links">
                <div class="header">{{__('shop/pages/thanks_page.following_as')}}</div>
                <a href="{{__('shop/global.twitter_link')}}" target="_blank" class="twitter">{{__('shop/global.twitter')}}<i class="fab fa-twitter"></i></a>
                <a href="{{__('shop/global.instagram_link')}}" target="_blank" class="instagram">{{__('shop/global.instagram')}}<i class="fab fa-instagram"></i></a>
                <a href="{{__('shop/global.linkedin_link')}}" target="_blank" class="linkedin">{{__('shop/global.linkedin')}}<i class="fab fa-linkedin"></i></a>
                <a href="{{__('shop/global.youtube_link')}}" target="_blank" class="youtube">{{__('shop/global.youtube')}}<i class="fab fa-youtube"></i></a>
                <a href="{{__('shop/global.facebook_link')}}" target="_blank" class="facebook">{{__('shop/global.facebook')}}<i class="fab fa-facebook"></i></a>
    </div>
</div>
</div>
@stop