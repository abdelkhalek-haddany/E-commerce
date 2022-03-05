@extends('layouts.admin')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">{{__('admin/globale.messages')}}</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('admin/globale.home')}}</a>
                                </li>
                                <li class="breadcrumb-item active"> {{__('admin/globale.messages')}}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- DOM - jQuery events table -->
         
                                @include('admin.includes.alerts.success')
                                @include('admin.includes.alerts.errors')
  <main id="messages" class="messages">
    <div class="container">
                <div class="messages-items">
                <div class="row">
                  @foreach ($Messages as $Message)
                  <div class="col-md-6">
                  <div class="card info">
                                <div class="card-header">
                                    <h4 class="card-title">{{ $Message->name }}</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a href="{{url("admin/delete-messages/$Message->id")}}" data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <h4 class="card-title">{{$Message->subject}}</h4>
                                        <p class="card-text">{{$Message->message}}</p>
                                    </div>
                                    <div class="card-footer">
                                      <h4 class="card-title">{{ $Message->email }}</h4>
                                    </div>
                                </div>
                            </div>
                </div>
                @endforeach
              

    </div>
    </div>
  </main>
</div>
</div>
</div>
@endsection