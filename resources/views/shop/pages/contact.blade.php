@extends('shop/layouts/authers/_master')
@section('title',__("shop/pages/contact.contact_us"))
@section('content')
<div class="login">
    <div class="container">
    <div class="section-title">
        <h2 class="title">
            {{__("shop/pages/contact.contact_us")}}
        </h2>
    </div>
    <add-message></add-message>        

<div class="map">
    <h3>{{__('shop/pages/contact.our_location')}}</h3>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d109512.08938941224!2d-7.002629558316523!3d30.93550352330085!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xdbb104077422057%3A0x26b3cb529b37ab00!2sOuarzazate%2045000!5e0!3m2!1sen!2sma!4v1643975270016!5m2!1sen!2sma" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</div>
</div>
</div>

@stop