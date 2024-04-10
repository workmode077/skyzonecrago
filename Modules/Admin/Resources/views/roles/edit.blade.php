@extends('admin::layouts.master')

@section('content')
        {{-- header start --}}
        @include('admin::layouts.header')
        {{-- header end --}}

        {{-- sidebar start --}}
            @include('admin::layouts.sidebar')
        {{-- sidebar end --}}
       
        <!-- =============== Left side End ================-->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1 class="mr-2">Dashboard</h1>
                    <ul>
                        <li><a href="{{ URL('/admin/dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ url('admin/roles') }}">Roles</a></li>
                        <li>Edit</li>
                    </ul>
                </div>
                <div class="separator-breadcrumb border-top"></div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="card-title mb-3">Roles</div>
                                <form method="post" action="{{ route('roles.update',$role->id) }}" enctype='multipart/form-data'>
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-6 form-group mb-3">
                                            <label for="firstName1">Role Name*</label>
                                            <input class="form-control" id="name" name="name" type="text" placeholder="Enter your first name" required autocomplete="off" value="@if($role){{ trim($role->title) }}@endif" />
                                            @if($errors->has('name'))
                                                    <div class="error text-danger">{{ $errors->first('name') }}</div>
                                            @endif 
                                        </div>
                                        
                                        
                                        <div class="col-md-6 form-group mb-3">
                                            <label>Status</label>
                                            <select class="form-control" name="status" >
                                                <option value="1" @if($role->is_active == 1) selected @endif>Active</option>
                                            <option value="0" @if($role->is_active == 0) selected @endif>In Active</option>
                                            </select>
                                            @if($errors->has('status'))
                                                    <div class="error text-danger">{{ $errors->first('status') }}</div>
                                            @endif
                                        </div>
                                        <?php  $permission = $role->permissions()->pluck('permission_id')->toArray();?>
                                             <div class="col-md-12">
                                                @if ($errors->has('perms'))
                                                <div class="alert alert-danger" role="alert">
                                                    <div class="error text-danger">Select Roles</div>
                                                </div>
                                                @endif
                                            </div>
                                        <div class="row p-5">
                                            @foreach($permissions as $perms)
                                            <div class="col-md-3 form-group">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" name="perms[]" value="{{$perms->id}}" <?php echo in_array($perms->id, $permission)?'checked':''; ?>><span>{{$perms->title}}</span><span class="checkmark"></span>
                                                </label>
                                            </div>
                                        @endforeach
                                        </div>
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