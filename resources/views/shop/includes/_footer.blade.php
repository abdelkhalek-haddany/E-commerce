    
<script type="text/javascript" type="text/javascript"src="{{asset('assets/vendors/jquery/jquery-3.5.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>
<script src="{{asset('assets/js/shopping-cart.js')}}"></script>
{{-- <!-- <script src="{{ asset('js/app.js') }}"></script> --> --}}
<script src="{{ asset('/js/app.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript" src="{{asset('assets/vendors/FlexSlider/jquery.flexslider.js')}}"></script>
<script src="{{asset('assets/vendors/SmartPhoto/smart_photo.min.js')}}"></script>
@yield('javascript')
<script>
    // Can also be used with $(document).ready()
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    controlNav: "thumbnails"
  });
});
</script>
</body>
</html>