<!-- Place somewhere in the <body> of your page -->
@if(count($siderProducts)>1)
<div class="flexslider" id="slider">
    <ul class="slides">
        @foreach ($siderProducts as $product)
      <li data-thumb="{{$product->thumbnail()}}">
        <div class="product-block">
      <div class="row">
        <div class="col-6">
          <img class="product-thubnail img-fluid" src="{{$product->thumbnail()}}" />
      </div>
      <div class="col-6">
        <div class="product-info align-middle">
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

        <div class="operations d-flex justify-content-center">
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
        </div>
      </div>
      </div>
      </div>
    </li>
    @endforeach
    <!-- items mirrored twice, total of 12 -->
  </ul>
</div>
@endif