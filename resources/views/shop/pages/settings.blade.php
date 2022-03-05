@extends('shop/layouts/authers/_master')
@section('title',__('shop/pages/settings.settings'))
@section('content')
<div class="settings">
    <div class="container">
    <div class="section-title">
        <h2 class="title">
            {{__('shop/pages/settings.settings')}}
        </h2>
    </div>
    <div class="setting-container">
        <div class="setting-option">
            <h3>{{__('shop/pages/settings.dark_mode')}}</h3>
            <label class="switch">
                <input type="checkbox" id="CheckThemeBox" onchange="toggleCheckTheme()" checked>
                <span class="slider round"></span>
            </label>
        </div>
        {{-- <button class="reset-setting">Reset Setting</button> --}}
    </div>
</div>
</div>
@endsection
@section('javascript')
<script src="{{asset('assets/js/settings.js')}}"></script>
@endsection