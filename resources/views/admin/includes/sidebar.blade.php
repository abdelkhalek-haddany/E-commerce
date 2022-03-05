<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            @if(Auth::user()->userType=="admin")
            <li class="nav-item active"><a href="{{route('admin.dashboard')}}"><i class="la la-mouse-pointer"></i><span
                        class="menu-title" data-i18n="nav.add_on_drag_drop.main">{{__('admin/globale.home')}}</span></a>
            </li>

            {{-- <li class="nav-item">
                <a href=""><i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">Languages</span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{App\Models\Shop\Language::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class=""><a class="menu-item" href="{{route('languages.index')}}"
                                          data-i18n="nav.dash.ecommerce"> Show All Languages</a>
                    </li>
                    <li><a class="menu-item" href="{{route('languages.create')}}" data-i18n="nav.dash.crypto">Add
                            New Language  </a>
                    </li>
                </ul>
            </li> --}}

            {{-- <li class="navigation-header open"><span data-i18n="{{__('admin/globale.shop')}}">{{__('admin/globale.shop')}}</span> --}}


            <li class="nav-item"><a href="{{route('get-orders')}}"><i class="la la-shopping-cart"></i>
                <span class="menu-content" data-i18n="nav.dash.main">{{__('admin/globale.orders')}}</span>
                <span
                    class="badge badge badge-info badge-pill float-right mr-2">{{App\Models\Shop\Orders::count()}}</span>
            </a>
        </li>


        <li class="nav-item"><a href=""><i class="la la-th"></i>
            <span class="menu-title" data-i18n="nav.dash.main">{{__('admin/globale.products')}}</span>
            <span
                class="badge badge badge-info badge-pill float-right mr-2">{{App\Models\Shop\Product::count()}}</span>
        </a>
        <ul class="menu-content">
            <li class=""><a class="menu-item" href="{{route('products.index')}}"
                    data-i18n="nav.dash.ecommerce">{{__('admin/globale.all_products')}}</a>
            </li>
            <li><a class="menu-item" href="{{route('products.create')}}" data-i18n="nav.dash.crypto">
                {{__('admin/globale.create')}}{{__('admin/globale.product')}}</a>
            </li>
        </ul>
    </li>


            <li class="nav-item"><a href=""><i class="la la-sitemap"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{__('admin/globale.categories')}}</span>
                    <span
                        class="badge badge badge-primary badge-pill float-right mr-2">{{App\Models\Shop\Category::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class=""><a class="menu-item" href="{{route('categories.index')}}"
                                          data-i18n="nav.dash.ecommerce">{{__('admin/globale.all_categories')}}</a>
                    </li>
                    <li><a class="menu-item" href="{{route('categories.create')}}" data-i18n="nav.dash.crypto">
                        {{__('admin/globale.create')}} {{__('admin/globale.category')}}</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{__('admin/globale.vendors')}}</span>
                    <span
                        class="badge badge badge-success badge-pill float-right mr-2">{{App\Models\User::where('userType','vendor')->count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class=""><a class="menu-item" href="{{route('vendors.index')}}"
                        data-i18n="nav.dash.ecommerce">{{__('admin/globale.all_vendors')}}</a>
                    </li>
                    <li><a class="menu-item" href="{{route('vendors.create')}}" data-i18n="nav.dash.crypto">
                        {{__('admin/globale.create')}}{{__('admin/globale.vendor')}}</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-motorcycle"></i>
                <span class="menu-title" data-i18n="nav.dash.main">{{__('admin/globale.livreurs')}}</span>
                <span
                    class="badge badge badge-info badge-pill float-right mr-2">{{App\Models\User::where('userType','livreur')->count()}}</span>
            </a>
            <ul class="menu-content">
                <li class=""><a class="menu-item" href="{{route('livreurs.index')}}"
                        data-i18n="nav.dash.ecommerce">{{__('admin/globale.all_livreurs')}}</a>
                </li>
                <li><a class="menu-item" href="{{route('livreurs.create')}}" data-i18n="nav.dash.crypto">
                    {{__('admin/globale.create')}}{{__('admin/globale.livreur')}}</a>
                </li>
            </ul>
        </li>

        <li class="nav-item"><a href=""><i class="la la-comments"></i>
            <span class="menu-title" data-i18n="nav.dash.main">{{__('admin/globale.testimonials')}}</span>
            <span
                class="badge badge badge-primary badge-pill float-right mr-2">{{App\Models\Testimonial::count()}}</span>
        </a>
        <ul class="menu-content">
            <li class=""><a class="menu-item" href="{{route('testimonials.index')}}"
                                  data-i18n="nav.dash.ecommerce">{{__('admin/globale.all_testimonials')}}</a>
            </li>
            <li><a class="menu-item" href="{{route('testimonials.create')}}" data-i18n="nav.dash.crypto">
                {{__('admin/globale.create')}}{{__('admin/globale.testimonial')}}</a>
            </li>
        </ul>
    </li>

    <li class="nav-item"><a href="{{route('subscribers')}}"><i class="la la-users"></i>
        <span class="menu-content" data-i18n="nav.dash.main">{{__('admin/globale.subscribers')}}</span>
        <span
            class="badge badge badge-info badge-pill float-right mr-2">{{App\Models\Subscriber::count()}}</span>
    </a>
</li>

    {{-- <li class="navigation-header open"><span data-i18n="{{__('admin/globale.blog')}}">{{__('admin/globale.blog')}}</span> --}}
        <hr>
    </li>
            <li class="nav-item"><a href=""><i class="la la-file"></i>
                <span class="menu-title" data-i18n="nav.dash.main">{{__('admin/globale.posts')}}</span>
                <span
                    class="badge badge badge-warning badge-pill float-right mr-2">{{App\Models\Blog\Post::count()}}</span>
            </a>
            <ul class="menu-content">
                <li class=""><a class="menu-item" href="{{route('posts.index')}}"
                                      data-i18n="nav.dash.ecommerce">{{__('admin/globale.all_posts')}}</a>
                </li>
                <li><a class="menu-item" href="{{route('posts.create')}}" data-i18n="nav.dash.crypto">
                    {{__('admin/globale.create')}}{{__('admin/globale.post')}}</a>
                </li>
            </ul>
        </li>


        <li class="nav-item"><a href=""><i class="la la-tags"></i>
            <span class="menu-title" data-i18n="nav.dash.main">{{__('admin/globale.tags')}}</span>
            <span
                class="badge badge badge-danger badge-pill float-right mr-2">{{App\Models\Blog\Tag::count()}}</span>
        </a>
        <ul class="menu-content">
            <li class=""><a class="menu-item" href="{{route('tags.index')}}"
                                data-i18n="nav.dash.ecommerce">{{__('admin/globale.all_tags')}}</a>
            </li>
            <li><a class="menu-item" href="{{route('tags.create')}}" data-i18n="nav.dash.crypto">
                {{__('admin/globale.create')}}{{__('admin/globale.tag')}}</a>
            </li>
        </ul>
    </li>
    {{-- <li class="navigation-header open"><span data-i18n="{{__('admin/globale.authers')}}">{{__('admin/globale.authers')}}</span> --}}
<hr>
            <li class=" nav-item"><a href="{{route('support')}}"><i class="la la-support"></i><span
                        class="menu-title" data-i18n="nav.support_raise_support.main">{{__('admin/globale.technical_support')}}</span></a>
            </li>

            <li class=" nav-item">
                <a href="{{route('documentation')}}"><i
                        class="la la-text-height"></i>
                    <span class="menu-title" data-i18n="nav.support_documentation.main">{{__('admin/globale.documentation')}}</span>
                </a>
            </li>

            @endif

            @if(Auth::user()->userType=="vendor")
            
            <li class="nav-item"><a href="{{route('get-v_orders')}}"><i class="la la-shopping-cart"></i>
                <span class="menu-content" data-i18n="nav.dash.main">{{__('admin/globale.orders')}}</span>
                {{-- <span class="badge badge badge-info badge-pill float-right mr-2"></span> --}}
            </a>
            </li>

            <li class="nav-item"><a href=""><i class="la la-th"></i>
                <span class="menu-title" data-i18n="nav.dash.main">{{__('admin/globale.products')}}</span>
                <span
                    class="badge badge badge-info badge-pill float-right mr-2">{{App\Models\Shop\Product::where('vendor_id',Auth::id())->count()}}</span>
            </a>
            <ul class="menu-content">
                <li class=""><a class="menu-item" href="{{route('v_products.index')}}"
                        data-i18n="nav.dash.ecommerce">{{__('admin/globale.all_products')}}</a>
                </li>
                <li><a class="menu-item" href="{{route('v_products.create')}}" data-i18n="nav.dash.crypto">
                    {{__('admin/globale.create')}}{{__('admin/globale.product')}}</a>
                </li>
            </ul>
            </li>

            @endif    
        </ul>
    </div>
</div>
