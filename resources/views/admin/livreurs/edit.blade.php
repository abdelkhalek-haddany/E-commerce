@extends('layouts.admin')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('admin/globale.home')}}</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('livreurs.index')}}">{{__('admin/globale.livreurs')}}</a>
                                </li>
                                <li class="breadcrumb-item active">{{__('admin/globale.edit')}}{{__('admin/globale.livreur')}}
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
                                    <h4 class="card-title" id="basic-layout-form">{{__('admin/globale.edit')}}{{__('admin/globale.livreur')}}</h4>
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

                                        <form class="form" action="{{route('livreurs.update',$livreur->id)}}" method="POST"
                                              enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-home"></i>{{__('admin/globale.livreur_info')}}</h4>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/globale.first_name')}}</label>
                                                            <input type="text" value="{{$livreur->first_name}}" id="first_name"
                                                                   class="form-control"
                                                                   name="first_name">
                                                            @error('name')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/globale.last_name')}}</label>
                                                            <input type="text" value="{{$livreur->last_name}}" id="last_name"
                                                                   class="form-control"
                                                                   name="last_name">
                                                            @error('name')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/globale.phone')}}</label>
                                                            <input type="text" value="{{$livreur->phone}}" id="mobile"
                                                                   class="form-control"
                                                                   name="phone">
                                                            @error('name')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/globale.email')}}</label>
                                                            <input type="text" value="{{$livreur->email}}" id="email"
                                                                   class="form-control"
                                                                   placeholder="email"
                                                                   name="email">
                                                            @error('name')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/globale.country')}}</label>
                                                            <input type="text" value="{{$livreur->country}}" id="country"
                                                                   class="form-control"
                                                                   placeholder="country"
                                                                   name="country">
                                                            @error('name')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/globale.city')}}</label>
                                                            <input type="text" value="{{$livreur->city}}" id="city"
                                                                   class="form-control"
                                                                   placeholder="city"
                                                                   name="city">
                                                            @error('name')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/globale.province')}}</label>
                                                            <input type="text" value="{{$livreur->province}}" id="province"
                                                                   class="form-control"
                                                                   placeholder="province"
                                                                   name="province">
                                                            @error('name')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="class col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/globale.password')}}</label>
                                                            <input type="password" id="password"
                                                                   class="form-control"
                                                                   placeholder="  " name="password">

                                                            @error("password")
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                </div>
                    


                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group mt-1">
                                                            <input type="checkbox"  value="1" name="active"
                                                                   id="active"
                                                                   class="switchery" data-color="success"
                                                                   checked/>
                                                            <label for="active"
                                                                   class="card-title ml-1">{{__('admin/globale.status')}}</label>

                                                            @error('active')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> {{__('admin/globale.back')}}
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> {{__('admin/globale.save')}}
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
