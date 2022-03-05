<div class="container">
<div class="footer-links">
  <div class="row d-flex justify-content-center">
  
  <div class="col-md-4">
    <h4>{{__('shop/layouts/footers/links.home')}}</h4>
    <ul>
      <li><a href="{{url('#app')}}">{{__('shop/layouts/footers/links.slider')}}</a></li>
      
      <li><a href="{{url('#hot_deals')}}">{{__('shop/layouts/footers/links.hot_deals')}}</a></li>
      
      <li><a href="{{url('#new_products')}}">{{__('shop/layouts/footers/links.new_products')}}</a></li>
      
      <li><a href="{{url('#offers')}}">{{__('shop/layouts/footers/links.offers')}}</a></li>
      
      <li><a href="{{url('#news')}}">{{__('shop/layouts/footers/links.news')}}</a></li>
    </ul>
  </div>


  <div class="col-md-4">
    <h4>{{__('shop/layouts/footers/links.pages')}}</h4>
    <ul>
      <li><a href="{{url('/')}}">{{__('shop/layouts/footers/links.home')}}</a></li>
      
      <li><a href="{{route('shopping-cart')}}">{{__('shop/layouts/footers/links.shipping_cart')}}</a></li>
      
      <li><a href="{{route('wishlist')}}">{{__('shop/layouts/footers/links.wishlist')}}</a></li>
      
      <li><a href="{{route('about')}}">{{__('shop/layouts/footers/links.about')}}</a></li>
      
      <li><a href="{{route('testimonials')}}">{{__('shop/layouts/footers/links.testimonials')}}</a></li>
    </ul>
  </div>

  <div class="col-md-4">
    <h4>{{__('shop/layouts/footers/links.categories')}}</h4>
    <ul class="categories">
      @foreach (categories() as $category)
      <li><a href="{{route('category', "$category->id")}}">{{$category->title}}</a></li>
      @endforeach
    </ul>
  </div>

</div>
</div>