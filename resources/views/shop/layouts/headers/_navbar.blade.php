<nav id="navbar_top" class="navbar navbar-expand-md">
    <div class="container">
        <div class="app-bar-search d-md-none">
            <form action="{{route('search')}}">
                @csrf
            <input placeholder='Search for...' class='search-input' type="text" name="q">
            <i class="fa fa-search search-icon"></i>
        </form>
        </div>

        <a class="navbar-brand hvr-grow-rotate" href="{{url('/')}}">
            <span>{{__('shop/layouts/headers/navbar.brand')}}</span></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#OurNavbar"
        aria-controls="OurNavbar" aria-expanded="false"
        aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse"navbar-brand id="OurNavbar">
            <div class="container">
                <div id="search-box" class="text-center d-none">
                    @include('shop/components/_search-form')
                </div>
            <ul id="nav-list" class="navbar-nav me-auto mb-2 mb-lg-0"> 

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" type="button" id="dropdownBlog" data-bs-toggle="dropdown" aria-expanded="false">
                        {{__('shop/layouts/headers/navbar.home')}}</a>      
                    <ul class="dropdown-menu" aria-labelledby="dropdownBlog">
                        <li><a class="dropdown-item" href="#hot_deals">{{__('shop/layouts/headers/navbar.hot_deals')}}</a></li>
                        <li><a class="dropdown-item" href="#new_products">{{__('shop/layouts/headers/navbar.new_products')}}</a></li>
                        <li><a class="dropdown-item" href="#offers">{{__('shop/layouts/headers/navbar.offers')}}</a></li>
                        <li><a class="dropdown-item" href="#news">{{__('shop/layouts/headers/navbar.news')}}</a></li>

                    </ul>
                    </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" type="button" id="dropdownBlog" data-bs-toggle="dropdown" aria-expanded="false">
                        {{__('shop/layouts/headers/navbar.pages')}}</a>      
                    <ul class="dropdown-menu" aria-labelledby="dropdownBlog">
                        <li><a class="dropdown-item" href="{{route("about")}}">{{__('shop/layouts/headers/navbar.about')}}</a></li>
                        <li><a class="dropdown-item" href="{{route("contact")}}">{{__('shop/layouts/headers/navbar.contact_us')}}</a></li>
                        <li><a class="dropdown-item" href="{{route("testimonials")}}">{{__('shop/layouts/headers/navbar.testimonials')}}</a></li>
                        <li><a class="dropdown-item" href="{{route("settings")}}">{{__('shop/layouts/headers/navbar.settings')}}</a></li>
                    </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" type="button" id="dropdownBlog" data-bs-toggle="dropdown" aria-expanded="false">
                            {{__('shop/layouts/headers/navbar.categories')}}</a>      
                        <ul class="dropdown-menu" aria-labelledby="dropdownBlog">
                            @foreach (categories() as $category)
                            <li><a class="dropdown-item" href="{{route('category', "$category->id")}}">{{$category->title}}</a></li>
                            @endforeach
                        </ul>
                    </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('posts')}}">{{__('shop/layouts/headers/navbar.blog')}}</a>
                </li>
                   
                    <div class="d-block d-md-none">
                        {{-- <li>
                            <div class="nav-item dropdown">
                              <span class="nav-link dropdown-toggle" type="button" id="dropdown-currency" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{__('shop/layouts/headers/upper.currency')}}
                              </span>
                              <div class="dropdown-menu" aria-labelledby="dropdown-currency">
                                <a class="dropdown-item" href="#">MDH</a>
                                <a class="dropdown-item" href="#">USD</a>
                              </div>
                            </div>
                        </li> --}}
                            <li class="nav-item dropdown">
                              <span class="nav-link dropdown-toggle" type="button" id="dropdown-language" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{__('shop/layouts/headers/navbar.language')}}
                              </span>
                                <ul class="dropdown-menu" aria-labelledby="dropdown-language">
                                <li class="nav-item" id="en">
                                    <a class="nav-link" rel="alternate" hreflang="en" href="{{ LaravelLocalization::getLocalizedURL("en", null, [], true) }}">
                                        English
                                    </a>
                                </li>
                    
                                <li class="nav-item" id="ar">
                                    <a class="nav-link" rel="alternate" hreflang="ar" href="{{ LaravelLocalization::getLocalizedURL("ar", null, [], true) }}">
                                        العربية
                                    </a>
                                </li>
                                </ul>
                              </li>
                    <li class="nav-item">
                        <a class="nav-link  register" href="{{route("register")}}" data-link-action="display-register-form">
                      <i class="fas fa-user"></i>
                      {{__('shop/layouts/headers/upper.register')}}
                      </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link login" href="{{route("login")}}" rel="nofollow" title="Log in to your customer account">
                        <i class="fas fa-user"></i>
                        {{__('shop/layouts/headers/upper.sign_in')}}
                      </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact us"><i class="fas fa-envelope"></i><span>{{__('shop/layouts/headers/navbar.support_email')}}</span></a>
                    </li>
            </div>
        </ul> 
            </div>
        </div>
        
        <div class="primaty-sections d-none d-md-block">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item primary-item">
                <a class="primary-link"  href="{{route('wishlist')}}">
                    <i class="fas fa-heart"></i></a>
            </li>
            @auth
            @if(Auth::user()->userType=="admin")                                                   
            <li class="nav-item primary-item">
                <a class="primary-link"  href="{{route('admin.dashboard')}}">                                
                    <i class="fas fa-tachometer-alt"></i></a>
            </li>
            @endif

            @if(Auth::user()->userType=="vendor")                                                   
                <li class="nav-item primary-item">
                    <a class="primary-link"  href="{{route('vendor.dashboard')}}">                                
                        <i class="fas fa-tachometer-alt"></i></a>
                </li>
            @endif

            @if(Auth::user()->userType=="livreur")                                                   
                    <li class="nav-item primary-item">
                        <a class="primary-link"  href="{{route('livreur.dashboard')}}">                                
                            <i class="fas fa-tachometer-alt"></i></a>
                    </li>
            @endif
            @endauth
                
            <li class="nav-item primary-item">
                <div class="shopping-cart">
                <a class="primary-link"   href="{{route('shopping-cart')}}">       
                    <i class="fas fa-shopping-cart"></i>
                    <div class="cart-products-count">{{cartItemsCount()}}</div>
                </a>
            </div>
                </li>
                </ul>
        </div>
        </div>
</nav>