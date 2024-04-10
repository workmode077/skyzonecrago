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
                        <li><a href="{{ url('admin/roles') }}">Roles</a></li>
                        <li>Add</li>
                    </ul>
                </div>
                <div class="separator-breadcrumb border-top"></div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="card-title mb-3">Roles</div>
                                <form method="post" action="{{ route('roles.store') }}" enctype='multipart/form-data'>
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-6 form-group mb-3">
                                            <label for="firstName1">Role Name*</label>
                                            <input class="form-control" id="name" name="name" type="text" value="" placeholder="Enter your first name"  autocomplete="off" />
                                            @if($errors->has('name'))
                                                    <div class="error text-danger">{{ $errors->first('name') }}</div>
                                            @endif 
                                        </div>
                                        
                                        
                                        <div class="col-md-6 form-group mb-3">
                                            <label>Status</label>
                                            <select class="form-control" name="status" >
                                                <option value="1">Active</option>
                                                <option value="0">InActive</option>
                                            </select>
                                            @if($errors->has('status'))
                                                    <div class="error text-danger">{{ $errors->first('status') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                 
                                    <div class="row mt-5">
                                        <div class="col-md-12 form-group">
                                        @if ($errors->has('perms'))
                                        <div class="alert alert-danger" role="alert">
                                            <div class="error text-danger">Select Roles</div>
                                        </div>
                                        @endif
                                        </div>
                                       @foreach($permissions as $permission)
                                            <div class="col-md-3 form-group">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" name="perms[]" value="{{$permission->id}}">
                                                    <span>{{$permission->title}}</span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        @endforeach
                                       
                                       
                                    </div>
                                    
                                    
                                    
                                        <div class="row">
                                       <div class="col-md-12">
                                        <button class="btn btn-primary float-right btn-sm m-1" type="submit">Submit</button>
                                        <a href="{{ URL('admin/roles/') }}" class="btn btn-danger float-right btn-sm m-1">Cancel</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

               

              
            <!-- end of main-content -->
            @endsection