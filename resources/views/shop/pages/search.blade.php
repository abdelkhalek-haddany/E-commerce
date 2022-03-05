@extends('shop/layouts/authers/_master')
@section('title',__('shop/pages/search.search'))
@section('content')
<div class="search">
<div class="container">
    <div class="section-title">
        <h2 class="title">
            {{__('shop/pages/search.search')}}
        </h2>
    </div> 
        <div class="container">
        <h2 class="search-title">
            <span class="num-result">{{$countPosts+$countProducts}}</span> {{__('shop/pages/search.search_result_for')}} <span>{{$key}}</span>
        </h2>
        @if($countProducts+$countPosts > 0)
        @if($countProducts > 0)

        <h3 class="sub-title">{{__('shop/pages/search.products_result')}} </h3>
        <div class="products">
            <div class="row">
                @foreach ($products as $product)
                    
                <div class="col-sm-6 col-lg-3">
                    <div class="product-item">
                        <a href="{{route('product-details',$product->id)}}">
                        <div class="item-header">
                            <div class="item-img">
                                <img class="img-fluid" src="{{$product->thumbnail()}}" alt="item">
                            </div>
                        </div>
                        </a>
                        <div class="item-body">
                            <div class="row">
                        <div class="col-8">
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
                            <a href="{{route('vendor', "$product->vendor_id")}}">
                            <div class="item-owner">
                                <i class="fas fa-user"></i>
                                <span class="owner-name">{{ $user['company_name'] }}</span>
                            </div>
                            </a>
                            <a href="{{route('product-details',$product->id)}}">
                            <div class="item-title">{{$product->title}}</div>
                            </a>
                            <div class="item-price">
                                {{$product->price}}
                            </div>
                        </div><div class="col-4">
                            <div class="operations">
                                <choose-product id="{{$product->id}}" quantity=1 title="{{$product->title}}" images="{{$product->images}}"
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

        @if($countPosts > 0)
        <h3 class="sub-title">{{__('shop/pages/search.posts_result')}}</h3>

            <div class="entries">
                <div class="topecs-list">
                @foreach ($posts as $post)
                <article class="entry">
                <h2 class="entry-title">
                    <a href="{{ url('post/' . $post->slug) }}"> {{ $post->title }}</a>
                </h2>
            
                <div class="entry-meta">
                <ul class="row">
                <li class="col-md-6">
                    <div class="tags-search">
                        @if(count($post->tags) > 0)
                                <span class="post-category">
                                    @foreach($post->tags as $tag)
                                        <a href="{{ url('tag/' . $tag->slug) }}">{{ $tag->name }}</a>
                                    @endforeach
                                </span>
                        @endif
                    </div>
                </li>
                <li class="col-md-6"><i class="fas fa-clock"></i>{{ date('M d, Y', strtotime($post->created_at)) }}</li>
                </ul>
            </div>
                </article>
    @endforeach
            </div>
            </div>                
            @endif
        @endif
            </div>
</div>
</div>
@endsection