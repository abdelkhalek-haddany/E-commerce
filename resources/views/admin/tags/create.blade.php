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
                            <li class="breadcrumb-item"><a href="{{route('tags.index')}}">{{__('admin/globale.tags')}}</a>
                            </li>
                            <li class="breadcrumb-item active">{{__('admin/globale.create')}}{{__('admin/globale.tag')}}
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
                                <h4 class="card-title" id="basic-layout-form">{{__('admin/globale.create')}}{{__('admin/globale.tag')}}</h4>
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
                            
                        {!! Form::open(['route' => 'tags.store' , 'method' => 'POST']) !!}
                        <h4 class="form-section"><i class="ft-home"></i> 
                            {{__('admin/globale.tag_info')}}
                        </h4>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group @if($errors->has('name')) has-error @endif">
                            {!! Form::label(__('admin/globale.name')) !!}
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            @if ($errors->has('name'))
                                <span class="help-block">{!! $errors->first('name') !!}</span>@endif
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group @if($errors->has('description')) has-error @endif">
                            {!! Form::label(__('admin/globale.description')) !!}
                            {!! Form::text('description', null, ['class' => 'form-control']) !!}
                            @if ($errors->has('description'))
                                <span class="help-block">{!! $errors->first('description') !!}</span>@endif
                        </div>
                    </div>
            
                        <div class="col-md-6">
                            <div class="form-group mt-1">
                                <input type="checkbox" value="1"
                                       name="is_published"
                                       id="switcheryColor4"
                                       class="switchery" data-color="success"
                                       checked/>
                                <label for="switcheryColor4"
                                       class="card-title ml-1">{{__('admin/globale.status')}}</label>

                                @error("is_published")
                                <span class="text-danger"> </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                <div class="form-actions">
                    <button type="button" class="btn btn-warning mr-1"
                            onclick="history.back();">
                        <i class="ft-x"></i>{{__('admin/globale.back')}}
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="la la-check-square-o"></i>{{__('admin/globale.save')}}
                    </button>
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
</div>

@endsection

