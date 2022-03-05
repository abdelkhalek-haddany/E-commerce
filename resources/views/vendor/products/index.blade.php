@extends('layouts.admin')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">{{__('admin/globale.products')}}</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('vendor.dashboard')}}">{{__('admin/globale.home')}}</a>
                                </li>
                                <li class="breadcrumb-item active">{{__('admin/globale.products')}}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- DOM - jQuery events table -->
                <section id="dom">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">{{__('admin/globale.all_subscribers')}}</h4>
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
                                    <div class="card-body card-dashboard">
                                        <table
                                            class="table display nowrap table-striped table-bordered scroll-horizontal">
                                            <thead class="">
                                            <tr>
                                                <th>{{__('admin/globale.thumbnail')}}</th>
                                                <th>{{__('admin/globale.title')}}</th>
                                                <th>{{__('admin/globale.price')}}</th>
                                                <th>{{__('admin/globale.category')}}</th>
                                                <th>{{__('admin/globale.status')}}</th>
                                                <th>{{__('admin/globale.quantity')}}</th>
                                                {{-- <th>{{__('admin/globale.start_date')}}</th> --}}
                                                <th>{{__('admin/globale.end_date')}}</th>
                                                <th>{{__('admin/globale.actions')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @isset($products)
                                                @foreach($products as $product)
                                                
                                                    <tr>
                                                        <td><img style="width: 150px; height: 100px;"
                                                                src="{{$product->thumbnail()}}"></td>

                                                        <td>{{$product->title}}</td>
                                                        <td>{{$product->price}}</td>
                                                        <td>
                                                            {{category($product->category_id)->title}}
                                                        </td>
                                                        <td> {{$product -> getActive()}}</td>
                                                        <td>{{$product->quantity}}</td>
                                                        {{-- <td>{{$product->startsAt}}</td> --}}
                                                        <td>{{$product->endsAt}}</td>
                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                aria-label="Basic example">
                                                                <a href="{{route('v_products.edit', $product->id)}}"
                                                                    class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">{{__('admin/globale.edit')}}</a>
 
 
                                                                <a href="{{route('v_products.destroy',$product->id)}}"
                                                                    class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">{{__('admin/globale.delete')}}</a>

                                                                    <a href="{{route('v_products.status', $product->id)}}"
                                                                        class="btn btn-outline-warning btn-min-width box-shadow-3 mr-1 mb-1">
                                                                         {{$product->getActive()}}
                                                                     </a>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endisset


                                            </tbody>
                                        </table>
                                        <div class="justify-content-center d-flex">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
