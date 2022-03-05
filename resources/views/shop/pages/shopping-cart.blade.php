@extends('shop/layouts/authers/_master')
@section('title',__('shop/pages/shopping-cart.shopping_cart'))
@section('content')
<div class="shopping-cart">
    <div class="container">
    <div class="section-title">
        <h2 class="title">
            {{__('shop/pages/shopping-cart.shopping_cart')}}
        </h2>
    </div>
    <section id="cart">
      @if (count($cartItems)>0)
      <div class="row">
    <div class="col-md-8">
<?php $total=0;$sub_total=0; $shipping=5; $ids="";$titles="";$sizes="";$colors="";?>
@foreach ($cartItems as $product)
<?php
$pInfo=getProduct($product->product_id);
$shipping +=5;
$sub_total += $pInfo->price;
?>
<div class="product">
    <a href="{{route('delete-cart-item',$product->id)}}"><div class="product-flags delete remove"><i class="fas fa-trash-alt"></i></div></a>
    <div class="row">
      <div class="col-md-4 text-center">
        <?php
              $StrImages = $pInfo->images;
              $ArrayImages = explode(',',$StrImages);
              $image=$ArrayImages[0];
        ?>
    <div class="product-img">
        <img class="img-fluid" src="{{asset("uploads/products/$image")}}" alt="{{$pInfo->title}}">
    </div>
  </div>
  <div class="col-md-8">
    <div class="content">
      <h2 class="product-name">{{$pInfo->title}}</h2>
    </div>
    <div class="product-choises">
      <div class="row">
        <div class="col-sm-6">
          <div class="product-colors">
            @if ($product->color)
            <ul class="list-unstyled">
              <span>{{__('shop/pages/shopping-cart.color')}}
              </span>
              <li style="background-color: {{$product->color}}">~</li>
          </ul>
            @endif
        </div>         
         </div>
        <div class="col-sm-6">
          <div class="product-sizes">
            @if ($product->size)
            <ul class="list-unstyled">
              <span>{{__('shop/pages/shopping-cart.size')}}</span>
              <li>{{$product->size}}</li>
            </ul>
            @endif
          </div>
        </div>
      </div>
      <hr>
      <span class="qt-minus">-</span>
      <span class="qt">{{$product->quantity}}</span>
      <span class="qt-plus">+</span>

      <span class="full-price">
        {{$pInfo->price*$product->quantity}}
      </span>

      <span class="price">
        {{$pInfo->price}}
      </span>
    </div>
  </div>
</div>
</div>

@endforeach
    </div>
<?php
$total = $sub_total+$shipping;
?>
<div class="col-md-4">
  @include('shop/components/_features')
  </div>
  <div id="site-footer" class="check-out">
    <div class="container clearfix">
    <div class="row">
      <div class="col-sm-6">
        <h2 class="subtotal">{{__('shop/pages/shopping-cart.subtotal')}} <span>{{$sub_total}}</span>{{__('shop/global.currency')}}</h2>
        <h3 class="tax">{{__('shop/pages/shopping-cart.taxes')}} <span>0</span>{{__('shop/global.currency')}}</h3>
        <h3 class="shipping">{{__('shop/pages/shopping-cart.shipping')}} <span>{{$shipping}}</span>{{__('shop/global.currency')}}</h3>
      </div>
      <div class="col-sm-6 text-center">
        <div class="total">{{__('shop/pages/shopping-cart.total')}} <span>{{$total}}</span>{{__('shop/global.currency')}}</div>
          <checkout-cart sub_total="{{$sub_total}}" shipping="{{$shipping}}" total="{{$total}}"></checkout-cart>
      </div>
    </div>
    </div>
  </div>
      </div>
  @else
  <div class="no-product">
    {{__('shop/pages/shopping-cart.no_product')}}
  </div>
  @endif
</section>
</div>
</div>
@stop