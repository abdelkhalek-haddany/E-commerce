<!-- Modal -->
@if ($choose_product)
<div class="modal fade" id="product_modal" tabindex="-1" role="dialog" aria-labelledby="product_modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">{{$product->title}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        
        <form action="{{route('add-to-cart')}}" method="POST">
            @csrf
        <input type="text" name="id" hidden value="{{$choose_product->id}}">
        <div class="modal-body">
            <div class="p-image">
                <img src="{{asset('assets/images/1.jpg')}}" alt="hello">
            </div>
            <div class="title">Choose</div>
            <div class="row justify-content-center">
            @if ($choose_product->colors)
            <div class="col-6">
            <div class="product-colors">
                <select name="selected_color">
                    <?php $colors=explode(',',$choose_product->colors)?>
                    <option desibled>Color</option>
                    @foreach($colors as $color)
                    <option value="{{$color}}" style="background-color:{{$color}}">{{$color}}</option>
                    @endforeach
                </select>
            </div>
            </div>
            @endif
            
            @if ($choose_product->sizes)
            <div class="col-6">
            <div class="product-sizes">
                <select name="selected_size">
                <?php $sizes= explode(',',$choose_product->sizes)?>
                <option desibled >Size</option>
                @foreach($sizes as $size)
                    <option value="{{$size}}" class="size" style="background-color:{{$size}}">{{$size}}</option>
                @endforeach
                </select>
            </div>
        </div>
            @endif
        </div>
        </div>
        <div class="modal-footer">
            <button type="submet" class="add-to-cart"><i class="fas fa-shopping-cart"></i><span>Add To Cart</span></button>
        </div>
    </form>
            </div>
        </div>
    </div>
    {{-- @include('shop/components/_product-modal') --}}
@endif