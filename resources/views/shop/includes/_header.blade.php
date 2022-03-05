<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    @section('meta')
    <meta content="{{__('shop/global.description')}}" name="description">
    <meta content=",عبدالخالق حداني,عبدالخالق,حداني,حداني عبد الخالق,haddany,abdelkhalek,informatics experts,abdelkhalek haddany,programming services,haddany blog, development, web developement, mobile application" name="keywords">
    @show
    
    <link href="{{ asset('assets/css/main.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/style-ltr.css')}}" rel="stylesheet" type="text/css" id="style">
    <link href="{{ asset('assets/vendors/bootstrap/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- Required Core Stylesheet -->
    <link rel="stylesheet" href="{{asset('assets/vendors/FlexSlider/flexslider.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/vendors/SmartPhoto/smart_photo.min.css')}}" type="text/css">  
    <link rel="apple-touch-icon" href="{{asset('assets/images/shop/logo.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/shop/logo.png')}}">
    <script src="{{ asset('assets/js/showMessage.js') }}"></script>

    @yield('stylesheet')
    <title>@yield('title','Eco Maroc')</title>
</head>
<body>
