@extends('layouts.admin')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">{{__('admin/globale.vendors')}}</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('admin/globale.home')}}</a>
                                </li>
                                <li class="breadcrumb-item active">{{__('admin/globale.vendors')}}
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
                                    <h4 class="card-title"> </h4>
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
                                                <th>{{__('admin/globale.brand')}}</th>
                                                <th>{{__('admin/globale.logo')}}</th>
                                                <th>{{__('admin/globale.phone')}}</th>
                                                <th>{{__('admin/globale.category')}}</th>
                                                <th>{{__('admin/globale.actions')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @isset($vendors)
                                                @foreach($vendors as $vendor)
                                                    <tr>
                                                        <td>{{$vendor->company_name}}</td>
                                                        <td><img style="width: 150px; height: 100px;"
                                                                src="{{$vendor->logo}}"></td>
                                                        <td>{{$vendor->phone}}</td>
                                                        <td>
                                                            @if (category($vendor->category_id))
                                                            {{category($vendor->category_id)->title}}
                                                            @else
                                                            -
                                                            @endif
                                                        
                                                        </td>

                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                aria-label="Basic example">
                                                                <a href="{{route('vendors.edit',$vendor->id)}}"
                                                                    class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">{{__('admin/globale.edit')}}</a>

                                                                <a href="{{route('vendors.destroy',$vendor->id)}}"
                                                                    class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">{{__('admin/globale.delete')}}</a>

                                                                <a href="{{route('vendors.status', $vendor->id)}}"
                                                                    class="btn btn-outline-warning btn-min-width box-shadow-3 mr-1 mb-1">
                                                                    {{$vendor->getActive()}}
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
