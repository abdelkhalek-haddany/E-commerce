@extends('shop/layouts/authers/_master')
@section('title',__('shop/layouts/headers/navbar.wishlist'))
@section('content')
<div class="login">
    <div class="container">
    <div class="section-title">
        <h2 class="title">
            {{__('shop/layouts/headers/navbar.wishlist')}}
        </h2>
    </div>
    <div class="wishlist">
        <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        
                        @foreach ($wishlist as $wish_product)
                        <?php $product = App\Models\Shop\Product::find($wish_product->product_id)?>
                        <div class="col-sm-6 col-lg-4">
                            <div class="product-item">
                                <div class="item-header">
                                    <a href="{{route('delete-wishlist',$wish_product->id)}}"><div class="product-flags delete"><i class="fas fa-trash-alt"></i></div></a>
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
                                                    <div class="price">{{$product->price}}{{__('shop/global.currency')}}</div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="operations">
                                            <choose-product id="{{$product->id}}" quantity=1 title="{{$product->title}}" images="{{$product->images}}"
                                                colors="{{$product->colors}}" sizes="{{$product->sizes}}" price="{{$product->price}}"></choose-product>
                                            
                                            <a href="{{route('product-details',$product->id)}}">
                                            <div class="info item">
                                                <i class="fas fa-info"></i>
                                            </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                
                            </div>
                        </div>
                        </div>
                        @endforeach
                    
                </div>
                </div>
                <div class="col-md-4">
                    @include('shop/components/_features')
                </div>
        </div>
</div>
</div>
</div>
@stop