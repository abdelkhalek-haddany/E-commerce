@if (count($hotDeals)>0)
<div class="hot-deals" id="hot_deals">
    <div class="container">
        <div class="section-title">
            <h2 class="title">
                {{__('shop/layouts/headers/navbar.hot_deals')}}
            </h2>
        </div>
        <div class="products">
            <div class="row d-flex justify-content-center">
                @foreach($hotDeals as $product)
                <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="item-header">
                            <div class="product-flags discount">{{__('shop/global.sale')}}</div>
                            <div class="item-img">
                                <img class="img-fluid" src="{{$product->thumbnail()}}" alt="{{$product->title}}">
                            </div>
                        </div>

                        <div class="item-body">
                            <div class="count-operations">
                                <countdown-timer startsAt="{{$product->startsAt}}" endsAt="{{$product->endsAt}}" ></countdown-timer>
                            </div>

                        <div class="operations">
                            <div class="row">
                                <div class="col-4">
                                    <choose-product id="{{$product->id}}" quantity=1 title="{{$product->title}}" images="{{$product->images}}"
                                        colors="{{$product->colors}}" sizes="{{$product->sizes}}" price="{{$product->price}}">
                                    </choose-product>    
                                </div>
                                <div class="col-4">
                                    <a href="{{route('add-to-wishlist',$product->id)}}">
                                        <div class="wish item">
                                            <i class="fas fa-heart"></i>
                                        </div>
                                        </a>
                                </div>
                                <div class="col-4">
                                    <a href="{{route('product-details',$product->id)}}">
                                        <div class="info item">
                                            <i class="fas fa-info"></i>
                                        </div>
                                        </a>
                                </div>
                            </div>
                                </div>
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
                            <div class="item-title">{{$product->title}}</div>
                            <div class="item-price">
                                {{$product->price}}{{__('shop/global.currency')}}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="show-all">
                <button type="button" class="btn btn-outline-info">
                    <a href="{{route("all-hot-deals")}}">
                        {{__('shop/pages/products.show_all_hot_deals')}}
                        <i class="fas fa-show"></i>
                    </a>
                </button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endif