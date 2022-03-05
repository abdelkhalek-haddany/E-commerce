<div class="mobile-botton-menu d-flex align-items-center justify-content-center d-md-none text-center">
  <div class="stickymenu-item"><a href="{{url('/')}}"><i class="fas fa-home"></i><span>{{__('shop/layouts/headers/navbar.home')}}</span></a></div>
  <div class="stickymenu-item"><a href="{{route('settings')}}"><i class="fas fa-cog fa-spin"></i><span>{{__('shop/layouts/headers/navbar.settings')}}</span></a></div>
  <div class="stickymenu-item"><div class="shopping-cart"></div><a href="{{route('shopping-cart')}}"><i class="fas fa-shopping-cart"></i><span>{{__('shop/layouts/headers/navbar.cart')}}</span>
  <div class="cart-products-count">{{cartItemsCount()}}</div>
    </a>
</div>
<div class="stickymenu-item"><a href="{{route('wishlist')}}"><i class="fas fa-heart"></i><span>{{__('shop/layouts/headers/navbar.wishlist')}}</span></a></div>
@auth
@if(Auth::user()->userType=="admin")                                                   
<div class="stickymenu-item">
    <a class="primary-link"  href="{{route('admin.dashboard')}}">                                
        <i class="fas fa-tachometer-alt"></i><span>{{__('shop/layouts/headers/navbar.dashboard')}}</span></a>
</div>
@endif

@if(Auth::user()->userType=="vendor")                                                   
    <div class="stickymenu-item">
        <a class="primary-link"  href="{{route('vendor.dashboard')}}">                                
            <i class="fas fa-tachometer-alt"></i><span>{{__('shop/layouts/headers/navbar.dashboard')}}</span></a>
    </div>
@endif

@if(Auth::user()->userType=="livreur")                                                   
        <div class="stickymenu-item">
            <a class="primary-link"  href="{{route('livreur.dashboard')}}">                                
                <i class="fas fa-tachometer-alt"></i><span>{{__('shop/layouts/headers/navbar.dashboard')}}</span></a>
        </div>
@endif
@endauth
  </div>
</div>