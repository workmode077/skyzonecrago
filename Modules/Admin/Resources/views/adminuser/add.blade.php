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
                        <li><a href="{{ url('admin/adminuser') }}"> Admin User</a></li>
                        <li>Add</li>
                    </ul>
                </div>
                <div class="separator-breadcrumb border-top"></div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="card-title mb-3">Admin Users</div>
                                <form method="post" action="{{ route('adminuser.store') }}" enctype='multipart/form-data'>
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-6 form-group mb-3">
                                            <label>Name</label>
                                            <input class="form-control" name="name" type="text" placeholder="Enter your first name" value="{{old('name')}}" />
                                            @if($errors->has('name'))
                                                 <div class="error text-danger">{{ $errors->first('name') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-md-6 form-group mb-3">
                                            <label >Email address</label>
                                            <input class="form-control"  type="email" name="email"  placeholder="Enter Your email" value="{{old('email')}}"/>
                                            @if($errors->has('email'))
                                                <div class="error text-danger">{{ $errors->first('email') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-md-6 form-group mb-3">
                                            <label >Role</label>
                                            <select class="form-control" name="role_id" >
                                                @foreach ($getRoles as $getRole )
                                                <option value="{{ $getRole->id }}">{{ $getRole->title }}</option>
                                                @endforeach
                                              
                                            </select>
                                            @if($errors->has('role_id'))
                                                    <div class="error text-danger">{{ $errors->first('role_id') }}</div>
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
                                        <div class="col-md-6 form-group mb-3">
                                            <label for="firstName1">Password</label>
                                            <input class="form-control" name="password" id="password" type="password" placeholder="Enter Your Password" />
                                            @if($errors->has('password'))
                                                    <div class="error text-danger">{{ $errors->first('password') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-md-6 form-group mb-3">
                                            <label for="firstName1">Confirm Password</label>
                                            <input class="form-control" name="password_confirmation"  id="password_confirmation"  type="password" placeholder="Enter Your Confirm Password" />
                                            @if($errors->has('password_confirmation'))
                                                    <div class="error text-danger">{{ $errors->first('password_confirmation') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-md-12">
                                            <button class="btn btn-primary float-right btn-sm m-1" type="submit">Submit</button>
                                            <a href="{{ URL('admin/adminuser/') }}" class="btn btn-danger float-right btn-sm m-1">Cancel</a>
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