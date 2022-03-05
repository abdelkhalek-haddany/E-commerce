@extends('layouts.admin')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">{{__('admin/globale.subscribers')}}</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('admin/globale.home')}}</a>
                                </li>
                                <li class="breadcrumb-item active"> {{__('admin/globale.subscribers')}}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <div class="content-body">
                    <!-- DOM - jQuery events table -->
                    <section id="dom">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">{{__('admin/globale.subscribers')}}</h4>
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
                <td>{{__('admin/globale.email')}}</td>
                <td>{{__('admin/globale.registred_date')}}</td>
                <td>{{__('admin/globale.actions')}}</td>
            </tr>
            </thead>
            <tbody>
                @foreach ($Subscribers as $Subscriber)
                <tr>
                    <td>{{$Subscriber->email}}</td>
                    <td>{{$Subscriber->created_at}}</td>
                    <td>
                        <a href="{{route("delete-subscribers",$Subscriber->id)}}"
                            class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">{{__('admin/globale.delete')}}</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
            </div>
        </div>
</div>
</div>
</div>
                    </section>
                </div>
            </div></div></div>
@endsection