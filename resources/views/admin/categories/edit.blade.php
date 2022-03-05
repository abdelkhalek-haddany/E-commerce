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
                                <li class="breadcrumb-item"><a href="{{route('categories.index')}}">{{__('admin/globale.home')}}</a>
                                </li>
                                <li class="breadcrumb-item active"> {{__('admin/globale.edit')}}{{__('admin/globale.category')}}
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
                                    <h4 class="card-title" id="basic-layout-form">{{__('admin/globale.edit')}}{{__('admin/globale.category')}}</h4>
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
                                        <form class="form"
                                              action="{{route('categories.update',$Category->id)}}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <input name="id" value="{{$Category->id}}" type="hidden">

                                            <div class="form-group">
                                                <div class="text-center">
                                                    <img
                                                        src="{{$Category->thumbnail()}}"
                                                        class="rounded-circle  height-250" alt="section image">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>{{__('admin/globale.thumbnail')}}</label>
                                                <label id="projectinput7" class="file center-block">
                                                    <input type="file" id="file" name="photo">
                                                    <span class="file-custom"></span>
                                                </label>
                                                @error('photo')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>

                                            <div class="form-body">

                                                <h4 class="form-section"><i class="ft-home"></i>{{__('admin/globale.category_info')}}</h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/globale.title')}}</label>
                                                            <input type="text" id="title"
                                                                   class="form-control"
                                                                   value="{{$Category->title}}"
                                                                   name="title">
                                                            @error("title")
                                                                <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="parent_id">{{__('admin/globale.choose_parent_cat')}}</label>
                                                            <select name="parent_id" class="select2 form-control @error('category_id') is-invalid @enderror"value="{{ old('category_id') }}">
                                                                <optgroup label="choose the parent category">
                                                                    <option value="">{{__('admin/globale.not_have_parent')}}</option>
                                                                    @if($Categories && $Categories->count() > 0)
                                                                        @foreach ($Categories as $category)
                                                                            <option value="{{ $category->id}}">
                                                                                {{ $category->title }}
                                                                            </option>
                                                                        @endforeach
                                                                    @endif
                                                                </optgroup>
                                                            </select>
                                                            @error('category_id')
                                                                <span class="text-danger"> {{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label for="description">{{__('admin/globale.description')}}</label>
                                                            <textarea id="description" class="form-control @error('description') is-invalid @enderror"value="{{ old('description') }}"
                                                                name="description"
                                                                >{{$Category->description}}</textarea>

                                                                @error('description')
                                                                <span class="text-danger"> {{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group mt-1">
                                                            <input type="checkbox" value="1"
                                                                   name="is_published"
                                                                   id="switcheryColor4"
                                                                   class="switchery" data-color="success" 
                                                                   @if($Category->is_published=='1')checked @endif/>
                                                                   <label for="is_published">{{__('admin/globale.status')}}</label>
                                                            @error("is_published")
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
                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>

@endsection
