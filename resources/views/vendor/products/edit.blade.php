@extends('layouts.admin')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('vendor.dashboard')}}">{{__('admin/globale.home')}}</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('v_products.index')}}">{{__('admin/globale.products')}}</a>
                                </li>
                                <li class="breadcrumb-item active">{{__('admin/globale.edit')}}{{__('admin/globale.product')}}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form">{{__('admin/globale.edit')}}{{__('admin/globale.product')}}</h4>
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                @include('admin.includes.alerts.success')
                                @include('admin.includes.alerts.errors')
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form" action="{{route('v_products.update',$product->id)}}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf
                                             <input type="hidden" name="id" value="{{$product->id}}">
                                             <input type="hidden" name="old_price" value="{{$product->price}}">
                                            <div class="form-group">
                                                <div class="text-center">
                                                    <div class="images">
                                                    @foreach ($product->images() as $image)
                                                        <img
                                                        src='{{$image}}'
                                                        class="rounded-circle  height-250" alt="{{$product->title}}">
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label>{{__('admin/globale.images')}}</label>
                                                <label id="projectinput7" class="file center-block">
                                                    <input type="file" id="file" name="images[]" multiple>
                                                    <span class="file-custom"></span>
                                                </label>
                                                @error('images')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>

                                            <div class="form-body">

                                                <h4 class="form-section"><i class="ft-home"></i>{{__('admin/globale.product_info')}}</h4>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/globale.title')}}</label>
                                                            <input type="text" value="{{$product->title}}" id="title"
                                                                   class="form-control"
                                                                   name="title">
                                                            @error("title")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="categories">{{__('admin/globale.categories')}}</label>
                                                            <select name="category_id" class="select2 form-control">
                                                                <optgroup label="{{__('admin/globale.choose_category')}}">
                                                                    @if($categories && $categories -> count() > 0)
                                                                        @foreach($categories as $category)
                                                                            <option
                                                                                value="{{$category->id }}"
                                                                                @if($product->category_id == $category->id  )  selected @endif
                                                                            >{{$category->title}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </optgroup>
                                                            </select>
                                                            @error('category_id')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-md-6 ">
                                                        <div class="form-group">
                                                            <label for="price">{{__('admin/globale.price')}}</label>
                                                            <input type="text" id="price" class="form-control"
                                                            value="{{$product->price}}" name="price">

                                                            @error('price')
                                                                <span class="text-danger"> {{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 ">
                                                        <div class="form-group">
                                                            <label for="size">{{__('admin/globale.sizes')}}</label>
                                                            <input type="text" id="sizes" class="form-control"
                                                                value="{{$product->sizes}}" name="sizes">
                                                            @error('sizes')
                                                                <span class="text-danger"> {{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <div class="choose-colors">
                                                                <label class="main-label" for="size"> {{__('admin/globale.colors')}} </label>
                                                                    <label for="color_red" style="background-color: red" >
                                                                        <input type="checkbox" name="colors[]" value="red" id="color_red"
                                                                            @if (strpos($product->colors, 'red'))checked @endif />
                                                                    </label>
                                                                    <label for="color_blue" style="background-color: blue" >
                                                                        <input type="checkbox" name="colors[]" value="blue" id="color_blue" 
                                                                            @if (strpos($product->colors, 'blue'))checked @endif/>
                                                                    </label>
                                                                    <label for="color_green" style="background-color: green" >
                                                                        <input type="checkbox" name="colors[]" value="green" id="color_green"
                                                                            @if (strpos($product->colors, 'green'))checked @endif />
                                                                    </label>
                                                                    <label for="color_yellow" style="background-color: yellow" >
                                                                        <input type="checkbox" name="colors[]" value="yellow" id="color_yellow"
                                                                        @if (strpos($product->colors, 'yellow'))checked @endif/>
                                                                    </label>
                                                                    <label for="color_purple" style="background-color: purple" >
                                                                        <input type="checkbox" name="colors[]" value="purple" id="color_purple"
                                                                        @if (strpos($product->colors, 'purple'))checked @endif />
                                                                    </label>
                                                                    <label for="color_orange" style="background-color: orange" >
                                                                        <input type="checkbox" name="colors[]" value="orange" id="color_orange"
                                                                        @if (strpos($product->colors, 'orange'))checked @endif />
                                                                    </label>
                                                                    <label for="color_brown" style="background-color: brown" >
                                                                        <input type="checkbox" name="colors[]" value="brown" id="color_brown"
                                                                        @if (strpos($product->colors, 'brown'))checked @endif />
                                                                    </label>
                                                                    <label for="color_navy" style="background-color: navy" >
                                                                        <input type="checkbox" name="colors[]" value="navy" id="color_navy" 
                                                                        @if (strpos($product->colors, 'navy'))checked @endif/>
                                                                    </label>
                                                                    <label for="color_gray" style="background-color: gray" >
                                                                        <input type="checkbox" name="colors[]" value="gray" id="color_gray"
                                                                        @if (strpos($product->colors, 'gray'))checked @endif />
                                                                    </label>
                                                                    <label for="color_black" style="background-color: black" >
                                                                        <input type="checkbox" name="colors[]" value="black" id="color_black" 
                                                                        @if (strpos($product->colors, 'black'))checked @endif/>
                                                                    </label>
                                                                    <label for="color_white" style="background-color: white" >
                                                                        <input type="checkbox" name="colors[]" value="white" id="color_white" 
                                                                        @if (strpos($product->colors, 'white'))checked @endif/>
                                                                    </label>
                                                                    <label for="color_gold" style="background-color: gold" >
                                                                        <input type="checkbox" name="colors[]" value="gold" id="color_gold" 
                                                                        @if (strpos($product->colors, 'gold'))checked @endif/>
                                                                    </label>
                                                                    <label for="color_pink" style="background-color: pink" >
                                                                        <input type="checkbox" name="colors[]" value="pink" id="color_pink" 
                                                                        @if (strpos($product->colors, 'pink'))checked @endif/>
                                                                    </label>
                                                                    <label for="color_mauve" style="background-color: #E0B0FF" >
                                                                        <input type="checkbox" name="colors[]" value="#E0B0FF" id="color_mauve"
                                                                        @if (strpos($product->colors, '#E0B0FF'))checked @endif />
                                                                    </label>
                                                                    <label for="color_teal" style="background-color: teal" >
                                                                        <input type="checkbox" name="colors[]" value="teal" id="color_teal" 
                                                                        @if (strpos($product->colors, 'teal'))checked @endif/>
                                                                    </label>
                                                                    <label for="color_maroon" style="background-color: maroon" >
                                                                        <input type="checkbox" name="colors[]" value="maroon" id="color_maroon" 
                                                                        @if (strpos($product->colors, 'maroon'))checked @endif/>
                                                                    </label>
                                                                    <label for="color_cream" style="background-color: #FFFDD0" >
                                                                        <input type="checkbox" name="colors[]" value="#FFFDD0" id="color_cream" 
                                                                        @if (strpos($product->colors, '#FFFDD0'))checked @endif/>
                                                                    </label>
                                                                    <label for="color_olive" style="background-color: olive" >
                                                                        <input type="checkbox" name="colors[]" value="olive" id="color_olive"
                                                                        @if (strpos($product->colors, 'olive'))checked @endif />
                                                                    </label>
                                                                    <label for="color_tan" style="background-color: tan" >
                                                                        <input type="checkbox" name="colors[]" value="tan" id="color_tan"
                                                                        @if (strpos($product->colors, 'tan'))checked @endif />
                                                                    </label>
                                                                    <label for="color_burgundy" style="background-color: #6E0A1E" >
                                                                        <input type="checkbox" name="colors[]" value="#6E0A1E" id="color_burgundy" 
                                                                        @if (strpos($product->colors, '#6E0A1E'))checked @endif/>
                                                                    </label>
                                                                    <label for="color_rust" style="background-color: #b7410e" >
                                                                        <input type="checkbox" name="colors[]" value="#b7410e" id="color_rust" 
                                                                        @if (strpos($product->colors, '#b7410e'))checked @endif/>
                                                                    </label>
                                                                    <label for="color_indigo" style="background-color: indigo" >
                                                                        <input type="checkbox" name="colors[]" value="indigo" id="color_indigo" 
                                                                        @if (strpos($product->colors, 'indigo'))checked @endif/>
                                                                    </label>
                                                                    <label for="color_cyan" style="background-color: cyan" >
                                                                        <input type="checkbox" name="colors[]" value="cyan" id="color_cyan" 
                                                                        @if (strpos($product->colors, 'cyan'))checked @endif/>
                                                                    </label>
                                                                    <label for="color_silver" style="background-color: silver" >
                                                                        <input type="checkbox" name="colors[]" value="silver" id="color_silver" 
                                                                        @if (strpos($product->colors, 'silver'))checked @endif/>
                                                                    </label>
                                                                    <label for="color_bronze" style="background-color: #CD7F32" >
                                                                        <input type="checkbox" name="colors[]" value="#CD7F32" id="color_bronze" 
                                                                        @if (strpos($product->colors, '#FFDB58'))checked @endif/>
                                                                    </label>
                                                                    <label for="color_mustard" style="background-color: #FFDB58" >
                                                                        <input type="checkbox" name="colors[]" value="#FFDB58" id="color_mustard" 
                                                                        @if (strpos($product->colors, '#FFDB58'))checked @endif/>
                                                                    </label>
                                                                    
                                                                </div>
                                                            @error('colors')
                                                                <span class="text-danger"> {{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12 ">
                                                        <div class="form-group">
                                                            <label for="summary">{{__('admin/globale.summary')}}</label>
                                                            <textarea id="summary" class="form-control"
                                                                name="summary">{{$product->summary}}</textarea>

                                                            @error('summary')
                                                                <span class="text-danger"> {{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12 ">
                                                        <div class="form-group">
                                                            <label for="content">{{__('admin/globale.content')}}</label>
                                                            <textarea id="content" rows="10" cols="80"
                                                             class="form-control"
                                                                name="content">{{$product->content}}</textarea>

                                                            @error('content')
                                                                <span class="text-danger"> {{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
{{-- 
                                                    <div class="col-md-6 ">
                                                        <div class="form-group">
                                                            <label for="startsAt">{{__('admin/globale.start_date')}}</label>
                                                            <input type="date" id="startsAt" class="form-control"
                                                            value="{{$product->startsAt}}" name="startsAt">

                                                            @error('startsAt')
                                                                <span class="text-danger"> {{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div> --}}


                                                    <div class="col-md-6 ">
                                                        <div class="form-group">
                                                            <label for="endsAt">{{__('admin/globale.end_date')}}</label>
                                                            <input type="date" id="endsAt" class="form-control"
                                                            value="{{$product->endsAt}}" name="endsAt">

                                                            @error('endsAt')
                                                                <span class="text-danger"> {{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 ">
                                                        <div class="form-group">
                                                            <label for="quantity">{{__('admin/globale.quantity')}}</label>
                                                            <input type="number" id="quantity" class="form-control"
                                                                value="{{$product->quantity}}" name="quantity">

                                                            @error('quantity')
                                                                <span class="text-danger"> {{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group mt-1">
                                                            <input type="checkbox" value="1" name="is_published"
                                                                id="is_published" class="switchery"
                                                                data-color="success" checked />
                                                            <label for="is_published" class="card-title ml-1">{{__('admin/globale.status')}}
                                                            </label>

                                                            @error('is_published')
                                                                <span class="text-danger"> </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i>{{__('admin/globale.back')}}
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i>{{__('admin/globale.update')}}
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>

@endsection


@section('javascript')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function () {
        CKEDITOR.replace('content',{
             // Configure your file manager integration. This example uses CKFinder 3 for PHP.
      filebrowserBrowseUrl: '/apps/ckfinder/4.14.0/ckfinder.html',
      filebrowserImageBrowseUrl: '/apps/ckfinder/4.14.0/ckfinder.html?type=Images',
      filebrowserUploadUrl: '/apps/ckfinder/4.14.0/core/connector/php/connector.php?command=QuickUpload&type=Files',
      filebrowserImageUploadUrl: '/apps/ckfinder/4.14.0/core/connector/php/connector.php?command=QuickUpload&type=Images',

      // Upload dropped or pasted images to the CKFinder connector (note that the response type is set to JSON).
      uploadUrl: '/apps/ckfinder/4.14.0/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',

        });
    });
</script>
@endsection
