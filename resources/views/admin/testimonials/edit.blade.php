@extends('layouts.admin')

@section('stylesheet')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet"/>
@endsection
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
                            <li class="breadcrumb-item"><a href="{{route('testimonials.index')}}">{{__('admin/globale.testimonials')}}</a>
                            </li>
                            <li class="breadcrumb-item active">{{__('admin/globale.edit')}}{{__('admin/globale.testimonial')}}
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Basic form layout section start -->
        <div id="basic-form-layouts">
                    <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        {{__('admin/globale.edit')}}{{__('admin/globale.testimonial')}}
                    </div>
                    <div class="card-body">
                        {!! Form::open([ 'route'=>['testimonials.update', $testimonial->id], 'method'=>'PUT']) !!}
                        
                        <h4 class="form-section"><i class="ft-home"></i> 
                            {{__('admin/globale.testimonial_info')}}
                        </h4>

                        <div class="form-group @if($errors->has('name')) has-error @endif">
                            {!! Form::label(__('admin/globale.name')) !!}
                            {!! Form::text('name',$testimonial->name, ['placeholder'=>'Name','class'=>'form-control','multiple'=>'multiple']) !!}
                            <div class="help-block">
                                @if ($errors->has('name'))
                                    <span>{!!$errors->first('name')!!}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group @if($errors->has('job')) has-error @endif">
                            {!! Form::label(__('admin/globale.job')) !!}
                            {!! Form::text('job', $testimonial->job, ['placeholder'=>'Job','class'=>'form-control']) !!}
                            <div class="help-block">
                                @if ($errors->has('job'))
                                    <span>{!!$errors->first('job')!!}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group @if($errors->has('facebook')) has-error @endif">
                            {!! Form::label(__('admin/globale.facebook')) !!}
                            {!! Form::text('facebook', $testimonial->facebook, ['placeholder'=>'Facebook','class'=>'form-control']) !!}
                            <div class="help-block">
                                @if ($errors->has('facebook'))
                                    <span>{!!$errors->first('facebook')!!}</span>
                                @endif
                            </div>
                        </div> 

                        <div class="form-group @if($errors->has('opinion')) has-error @endif">
                            {!! Form::label(__('admin/globale.opinion')) !!}
                            {!! Form::textarea('opinion', $testimonial->opinion, ['class' => 'form-control', 'id'=> 'editor', 'placeholder' => 'opinion']) !!}
                            @if ($errors->has('opinion'))
                                <span class="help-block">{!! $errors->first('opinion') !!}</span>@endif
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
                    
                <div class="form-actions">
                    <button type="button" class="btn btn-warning mr-1"
                            onclick="history.back();">
                        <i class="ft-x"></i>{{__('admin/globale.back')}}
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="la la-check-square-o"></i>{{__('admin/globale.update')}}
                    </button>
                </div>
            </div>      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>
@endsection
