@extends('shop/layouts/authers/_master')
@section('title',__('shop/pages/product-details.p_details'))
@section('meta')
<meta content="{{__('shop/global.brand')}} posts, {{$product->content}}" name="description">
<meta content="
{{category($product->category_id)->title}},
{{$product->title}},
{{__('shop/global.brand')}}
" name="keywords">
@endsection
@section('content')
<div class="product-details">
    <div class="container">
        <div class="product">
    <div class="section-title">
        <h2 class="title">
            {{__('shop/pages/product-details.p_details')}}
        </h2>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="imgs-playlist">
            <h2 class="sub-title">{{__('shop/pages/product-details.p_images')}}</h2>
            <div class="imgs-container">
                @foreach($product->images() as $image)
            <a href="{{$image}}" class="js-smartPhoto" data-caption="{{$product->title}}" data-id="{{$product->title}}">
            <img src="{{$image}}" />
            </a>
            @endforeach
        </div>
        </div>
        </div>
        <div class="col-md-4">
            <div class="product-info">
                <h2 class="sub-title">{{__('shop/pages/product-details.p_info')}}</h2>
                <ul class="list-unstyled">
                    <li><div class="product-title">{{$product->title}}</div></li>
                    <li><div class="product-owner"><i class="fas fa-user"></i>
                        <?php $user = user($product->vendor_id) ?>
                                    <span class="owner-name"><a href="{{route('vendor', "$product->vendor_id")}}">{{ $user['company_name'] }}</a></span>
                    </li>
                    <li><div class="product-rate"><span class="star">
                        <i class="fas fa-star"></i>
                    </span>
                    <span class="star">
                        <i class="fas fa-star"></i>
                    </span>
                    <span class="star">
                        <i class="fas fa-star"></i>
                    </span>
                    <span class="star">
                        <i class="fas fa-star"></i>
                    </span>
                    <span class="star">
                        <i class="fas fa-star"></i>
                    </span></div></li>
                    <li><div class="product-price">{{$product->price}}{{__('shop/global.currency')}}</div></li>
                    <li><div class="product-sizes">

                        <?php $sizes= explode(',',$product->sizes)?>
                        @foreach($sizes as $size)
                        <span class="size" title="{{$size}}">{{$size}}</span>
                        @endforeach

                    </div></li>
                    <li><div class="product-colors">
                        <ul class="list-unstyled">
                            <?php $colors= explode(',',$product->colors)?>
                        @foreach($colors as $color)
                            <li style="background-color: {{$color}}"></li>
                        @endforeach
                        </ul>
                    </div></li>
                    <li><div class="product-quantity"> <span class="title">{{__('shop/pages/product-details.p_quantity')}}</span>
                        <span class="number">{{$product->quantity}}</span>
                    </div></li>
                    <li><div class="product-category"><div class="title">{{__('shop/pages/product-details.p_category')}}</div>
                        <div class="cats-link">
                            <a href="{{route('category', "$product->category_id")}}">{{category($product->category_id)->title}}</a>
                    </div></li>
                    </li>
                </ul>
            </div>
            <div class="operations">

                <choose-product id="{{$product->id}}" title="{{$product->title}}" images="{{$product->images}}"
                    colors="{{$product->colors}}" sizes="{{$product->sizes}}" price="{{$product->price}}"></choose-product>
                    <a href="{{route('add-to-wishlist',$product->id)}}">
                        <div class="wish item">
                            <i class="fas fa-heart"></i>
                        </div>
                        </a>
                        <div class="share item">
                            <i class="fas fa-share"></i>
                        </div>
            </div>
            </div>
    </div>
    <div class="summary">
        {{$product->summary}}
    </div>
    <div class="descreption">
        {!!$product->content!!}
    </div>
    </div>
    @if (count($related_products)>0)
    
    <div class="related-products">
        <h2 class="sub-title">{{__('shop/pages/product-details.related_p')}}</h2>
        <div class="products-container d-flex">
            @foreach($related_products as $product)
            <div class="col-sm-6 col-lg-3">
                <div class="product-item">
                    <div class="item-header">
                            <div class="item-img">
                            <img class="img-fluid" src="{{$product->thumbnail()}}" alt="{{$product->title}}">
                            </div>
                    </div>
                    <div class="item-body">
                        <div class="row">
                    <div class="col-9">
                        <div class="item-rate">
                            <span class="star">
                                <i class="fas fa-star"></i>
                            </span>
                            <span class="star">
                                <i class="fas fa-star"></i>
                            </span>
                            <span class="star">
                                <i class="fas fa-star"></i>
                            </span>
                            <span class="star">
                                <i class="fas fa-star"></i>
                            </span>
                            <span class="star">
                                <i class="fas fa-star"></i>
                            </span>
                        </div>
                        <?php $user = user($product->vendor_id) ?>
                                <div class="item-owner">
                                    <i class="fas fa-user"></i>
                                    <span class="owner-name"><a href="{{route('vendor', "$product->vendor_id")}}">{{ $user['company_name'] }}</a></span>
                            </div>
                        <a href="{{route('product-details', $product->id)}}"> <div class="item-title">{{$product->title}}</div></a>
                        <div class="item-price">
                            {{$product->price}}{{__('shop/global.currency')}}
                        </div>
                    </div><div class="col-3">
                        <div class="operations">

                            <choose-product id="{{$product->id}}" title="{{$product->title}}" images="{{$product->images}}"
                                colors="{{$product->colors}}" sizes="{{$product->sizes}}" price="{{$product->price}}"></choose-product>
                            
                            <a href="{{route('add-to-wishlist',$product->id)}}">
                            <div class="wish item">
                                <i class="fas fa-heart"></i>
                            </div>
                            </a>
                            <a href="{{route('product-details',$product->id)}}">
                            <div class="info item">
                                <i class="fas fa-info"></i>
                            </div>
                            </a>

                        </div>
                    </div></div>

                    </div>
                </div>
            </div>
        @endforeach
        </div>
        </div>
        @endif
</div>
</div>
@stop