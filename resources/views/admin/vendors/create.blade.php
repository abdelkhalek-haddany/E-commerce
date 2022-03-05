@extends('layouts.admin')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('admin/globale.vendors')}}</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('vendors.index')}}">{{__('admin/globale.home')}}</a>
                                </li>
                                <li class="breadcrumb-item active">{{__('admin/globale.create')}}{{__('admin/globale.vendor')}}
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
                                    <h4 class="card-title" id="basic-layout-form">{{__('admin/globale.create')}}{{__('admin/globale.vendor')}}</h4>
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
                                        <form class="form" action="{{route('vendors.store')}}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            {{-- <input type="hidden"  value="" id="latitude" name="latitude"> --}}
                                            {{-- <input type="hidden" value="" id="longitude"  name="longitude"> --}}
                                            @csrf
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

                                                <h4 class="form-section"><i class="ft-home"></i>{{__('admin/globale.vendor_info')}}</h4>


                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/globale.first_name')}}</label>
                                                            <input type="text" id="first_name"
                                                                   class="form-control @error('first_name') is-invalid @enderror"value="{{ old('first_name') }}"
                                                                   name="first_name"
                                                                   >
                                                            @error("first_name")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/globale.last_name')}}</label>
                                                            <input type="text" id="last_name"
                                                                   class="form-control @error('last_name') is-invalid @enderror"value="{{ old('last_name') }}"
                                                                   name="last_name"
                                                                   >
                                                            @error("last_name")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="projectinput1">{{__('admin/globale.brand')}}</label>
                                                                    <input type="text" id="brand"
                                                                           class="form-control @error('brand') is-invalid @enderror"value="{{ old('brand') }}"
                                                                           name="company_name"
                                                                           >
                                                                    @error("brand")
                                                                    <span class="text-danger">{{$message}}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput2">{{__('admin/globale.categories')}}</label>
                                                            <select name="category_id" class="select2 form-control">
                                                                <optgroup label="{{__('admin/globale.choose_category')}}">
                                                                    @if($categories && $categories -> count() > 0)
                                                                        @foreach($categories as $category)
                                                                            <option
                                                                                value="{{$category->id }}">{{$category->title}}</option>
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
                                                            <label for="projectinput1">{{__('admin/globale.phone')}}</label>
                                                            <input type="text" id="phone"
                                                                   class="form-control @error('phone') is-invalid @enderror"value="{{ old('phone') }}"
                                                                    name="phone">

                                                            @error("phone")
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 ">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/globale.email')}}</label>
                                                            <input type="text" id="email"
                                                                   class="form-control @error('email') is-invalid @enderror"value="{{ old('email') }}"
                                                                   name="email">

                                                            @error("email")
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/globale.province')}}</label>
                                                            <input type="text" value="" id="province"
                                                                   class="form-control"
                                                                   name="province">
                                                            @error('province')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/globale.country')}}</label>
                                                            <input type="text" value="" id="country"
                                                                   class="form-control"
                                                                   name="country">
                                                            @error('country')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/globale.city')}}</label>
                                                            <input type="text" value="" id="city"
                                                                   class="form-control"
                                                                   name="city">
                                                            @error('city')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/globale.password')}}</label>
                                                            <input type="password" id="password"
                                                                   class="form-control"
                                                                    name="password">

                                                            @error("password")
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>

                                                </div>
                                                </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group mt-1">
                                                            <input type="checkbox" value="1"
                                                                   name="active"
                                                                   id="switcheryColor4"
                                                                   class="switchery" data-color="success"
                                                                   checked/>
                                                            <label for="switcheryColor4"
                                                                   class="card-title ml-1">{{__('admin/globale.status')}} </label>

                                                            @error("active")
                                                            <span class="text-danger"> </span>
                                                            @enderror
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
