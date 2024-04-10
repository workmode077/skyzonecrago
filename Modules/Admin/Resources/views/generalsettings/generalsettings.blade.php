@extends('admin::layouts.master')

@section('content')
        {{-- header start --}}
        @include('admin::layouts.header')
        {{-- header end --}}

        {{-- sidebar start --}}
            @include('admin::layouts.sidebar')
         {{-- sidebar end  --}}
       
       
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1 class="mr-2">Dashboard</h1>
                    <ul>
                        <li><a href="{{ URL('/admin/dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ url('admin/generalsettings') }}">General Settings</a></li>
                    </ul>
                </div>
                <div class="separator-breadcrumb border-top"></div>
                @if(session()->has('status'))
                <div id="toast-container" class="toast-top-right mt-5">
                    <div class="toast toast-success" aria-live="polite" style="">
                        {{-- <button type="button" class="toast-close-button" role="button">×</button> --}}
                        <div class="toast-title">General Settings</div>
                        <div class="toast-message">  {{ session()->get('status') }}</div>
                    </div>
                </div>
            @endif 
          {{-- General Settings start --}}
                   <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-body">
                                <form method="post" action="{{ route('generalsettings.update') }}" enctype='multipart/form-data'>
                                    {{ csrf_field() }}
                                    <div class="card-title mb-3">General Settings</div>
                                    <input class="form-control" name="section_one" type="text" value="enquiry" hidden />
                                    <div class="row">
                                      
                                        <div class="col-md-6 form-group mb-3">
                                            <label for="firstName1">Logo</label>
                                            <input class="form-control " id="enquiryImage" onchange="enquiry(this);" type="file" name="logo" accept="image/png, image/gif, image/jpeg, image/webp">
                                            <img class="img-fluid js-enquiry d-none mt-1" alt="avatar" width="150" height="auto">
                                            @if(isset($data)) 
                                            @if($data->logo)
                                                <img class="img-fluid " src="{{storage_url()."/".$data->logo}}" alt="avatar" width="150px" height="auto">
                                            @endif
                                            @endif
                                          @if($errors->has('logo'))
                                                    <div class="error text-danger">{{ $errors->first('logo') }}</div>
                                           @endif
                                        </div>
                                        <div class="col-md-6 form-group mb-3">
                                            <label for="firstName1">Favicon</label>
                                            <input class="form-control " id="contactImage" onchange="sectionFiveImage(this);" type="file" name="favicon" accept="image/png, image/gif, image/jpeg, image/webp">
                                            <img class="img-fluid js-section_five_image d-none mt-1" alt="avatar" width="40" height="auto">
                                            @if(isset($data))
                                            @if($data->favicon)
                                                <img class="img-fluid " src="{{storage_url()."/".$data->favicon}}" alt="avatar" width="40px" height="auto">
                                            @endif
                                            @endif
                                          @if($errors->has('favicon'))
                                                    <div class="error text-danger">{{ $errors->first('favicon') }}</div>
                                           @endif
                                        </div>
                                     </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button class="btn btn-primary float-right btn-sm m-1" type="submit">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
               
 <!-- end of main-content -->
            @endsection
            @section('datatable-js')
                <script src="{{ asset('js/admin/validation.js') }}"></script>
            @endsection