@extends('layouts.admin')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">{{__('admin/globale.profile')}}</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('admin/globale.home')}}</a>
                                </li>
                                <li class="breadcrumb-item active"> {{__('admin/globale.profile')}}
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
                                        <h4 class="card-title">{{__('admin/globale.profile')}}</h4>
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

                                                    <form class="form" action="{{route('profile_update', $admin->id)}}"
                                                          method="POST"
                                                          enctype="multipart/form-data">
                                                        @csrf
            
                                                         <input type="hidden" name="id" value="{{$admin->id}}">
            
                                                        <div class="form-group">
                                                            <div class="text-center">
                                                                <img
                                                                    src="{{$admin->logo}}"
                                                                    class="rounded-circle  height-250" alt="{{__('admin/globale.logo')}}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>{{__('admin/globale.logo')}}</label>
                                                            <label id="projectinput7" class="file center-block">
                                                                <input type="file" id="file" name="logo">
                                                                <span class="file-custom"></span>
                                                            </label>
                                                            @error('logo')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-body">
                                                            <h4 class="form-section"><i class="ft-home"></i>{{__('admin/globale.shop_info')}}</h4>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="projectinput1"> {{__('admin/globale.company_name')}} </label>
                                                                        <input type="text" value="{{$admin->company_name}}" id="name"
                                                                               class="form-control"
                                                                               placeholder="  "
                                                                               name="company_name">
                                                                        @error("name")
                                                                        <span class="text-danger">{{$message}}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="projectinput1"> {{__('admin/globale.first_name')}} </label>
                                                                        <input type="text" value="{{$admin -> first_name}}" id="first_name"
                                                                               class="form-control"
                                                                               placeholder="  "
                                                                               name="first_name">
                                                                        @error("first_name")
                                                                        <span class="text-danger">{{$message}}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="projectinput1"> {{__('admin/globale.last_name')}} </label>
                                                                        <input type="text" value="{{$admin ->last_name}}" id="last_name"
                                                                               class="form-control"
                                                                               placeholder="  "
                                                                               name="last_name">
                                                                        @error("last_name")
                                                                        <span class="text-danger">{{$message}}</span>
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
                    </section>
                </div>
            </div></div></div>
@endsection