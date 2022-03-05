@extends('layouts.admin')

@section('stylesheet')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{ route('admin.dashboard') }}">{{ __('admin/globale.home') }} </a>
                                </li>
                                <li class="breadcrumb-item"><a
                                        href="{{ route('posts.index') }}">{{ __('admin/globale.posts') }}</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    {{ __('admin/globale.create') }}{{ __('admin/globale.post') }}
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
                                    <h4 class="card-title" id="basic-layout-form">
                                        {{ __('admin/globale.create') }}{{ __('admin/globale.post') }}</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
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

                                        <form class="form" action="{{ route('posts.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-group">
                                                <label> {{ __('admin/globale.thumbnail') }} </label>
                                                <label id="projectinput7" class="file center-block">
                                                    <input type="file" id="file" name="thumbnail">
                                                    <span class="file-custom"></span>
                                                </label>
                                                @error('thumbnail')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-body">

                                                <h4 class="form-section"><i
                                                        class="ft-home"></i>{{ __('admin/globale.post_info') }}</h4>

                                                <div class="row">
                                                    <div class="col-md-6">

                                                        <div
                                                            class="form-group @if ($errors->has('lang')) has-error @endif">
                                                            {!! Form::label(__('admin/globale.language')) !!}
                                                            {!! Form::text('lang', null, ['class' => 'form-control']) !!}
                                                            @if ($errors->has('lang'))
                                                                <span class="text-danger">{!! $errors->first('lang') !!}</span>
                                                            @endif
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <div
                                                            class="form-group @if ($errors->has('title')) has-error @endif">
                                                            {!! Form::label(__('admin/globale.title')) !!}
                                                            {!! Form::text('title', null, ['class' => 'form-control']) !!}
                                                            @if ($errors->has('title'))
                                                                <span class="text-danger">{!! $errors->first('title') !!}</span>
                                                            @endif
                                                        </div>

                                                    </div>

                                                    <div class="col-md-12">
                                                        <div
                                                            class="form-group @if ($errors->has('expert')) has-error @endif">
                                                            {!! Form::label(__('admin/globale.expert')) !!}
                                                            {!! Form::text('expert', null, ['class' => 'form-control']) !!}
                                                            @if ($errors->has('expert'))
                                                                <span class="text-danger">{!! $errors->first('expert') !!}</span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="main-label" for="size">
                                                                {{ __('admin/globale.tags') }} </label>
                                                            <div class="tags">
                                                                @if ($tags && $tags->count() > 0)
                                                                    @foreach ($tags as $tag)
                                                                        <label
                                                                            for="{{ $tag->id }}">{{ $tag->name }}
                                                                            <input type="checkbox" name="tag_id[]"
                                                                                value="{{ $tag->id }}"
                                                                                id="{{ $tag->id }}" />
                                                                        </label>
                                                                    @endforeach
                                                                @endif
                                                            </div>
                                                            @error('tag_id')
                                                                <span class="text-danger"> {{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div
                                                            class="form-group @if ($errors->has('details')) has-error @endif">
                                                            {!! Form::label(__('admin/globale.details')) !!}
                                                            {!! Form::textarea('details', null, ['class' => 'form-control', 'id' => 'editor']) !!}
                                                            @if ($errors->has('details'))
                                                                <span class="text-danger">{!! $errors->first('details') !!}</span>
                                                            @endif
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group mt-1">
                                                                    <input type="checkbox" value="1" name="is_published"
                                                                        id="is_published" class="switchery"
                                                                        data-color="success" checked />
                                                                    <label for="is_published"
                                                                        class="card-title ml-1">{{ __('admin/globale.status') }}</label>

                                                                    @error('is_published')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-actions">
                                                            <button type="button" class="btn btn-warning mr-1"
                                                                onclick="history.back();">
                                                                <i class="ft-x"></i>
                                                                {{ __('admin/globale.back') }}
                                                            </button>
                                                            <button type="submit" class="btn btn-primary">
                                                                <i class="la la-check-square-o"></i>
                                                                {{ __('admin/globale.save') }}
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
        $(document).ready(function() {
            CKEDITOR.replace('details', {
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
