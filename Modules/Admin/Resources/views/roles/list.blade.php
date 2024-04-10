
{{-- {{ dd(session()->get('error')) }} --}}
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
                        <li>List</li>
                    </ul>
                </div>
                <div class="separator-breadcrumb border-top"></div>
                @if(session()->has('status'))
                    <div id="toast-container" class="toast-top-right mt-5">
                        <div class="toast toast-success" aria-live="polite" style="">
                            {{-- <button type="button" class="toast-close-button" role="button">×</button> --}}
                            <div class="toast-title">Role</div>
                            <div class="toast-message">  {{ session()->get('status') }}</div>
                        </div>
                    </div>
                @endif
                @if(session()->has('error'))
                    <div id="toast-container"  class="toast-top-right mt-5">
                        <div class="toast toast-warning" aria-live="polite" style="">
                            <div class="toast-message">  {{ session()->get('error') }}</div>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="card o-hidden mb-4">
                            <div class="card-header d-flex align-items-center border-0">
                                <h3 class="w-50 float-left card-title m-0">Roles</h3>
                                <div class="dropdown dropleft text-right w-50 float-right">
                                    <a class="btn btn-outline-dark btn-sm m-1"  type="button" href="{{ URL('admin/roles/add') }}" >Add Roles</a>
                                </div>
                            </div>
                            <div>
                                
                                <div class="table-responsive">
                                    <table id="roles" class="display table table-striped table-bordered roles"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Sl.No</th>
                                                <th>RoleTitle</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
            <!-- end of main-content -->
            @endsection

            @section('datatable-js')
                <script src="{{ asset('admin-script/role.js') }}"></script>
            @endsection
        