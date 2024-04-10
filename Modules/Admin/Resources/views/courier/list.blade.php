@extends('admin::layouts.master')

@section('content')
        <!-- ============ header start  ============= -->
            @include('admin::layouts.header')
        <!-- ============ header end  ============= -->

        <!-- ============ sidebar start  ============= -->
            @include('admin::layouts.sidebar')
       
     
        <!-- =============== Left side End ================-->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1 class="mr-2">Dashboard</h1>
                    <ul>
                        <li><a href="{{ URL('/admin/dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ url('admin/courier') }}">Courier</a></li>
                        <li>List</li>
                    </ul>
                </div>
                <div class="separator-breadcrumb border-top"></div>
                
                <!-- ============ Toaster start  ============= -->
                @if(session()->has('status'))
                <div id="toast-container" class="toast-top-right mt-5">
                    <div class="toast toast-success" aria-live="polite" style="">
                        <div class="toast-title">courier</div>
                        <div class="toast-message">  {{ session()->get('status') }}</div>
                    </div>
                </div>
                @endif
                @if(session()->has('error'))
                    <div id="toast-container" class="toast-top-right mt-5">
                        <div class="toast toast-danger" aria-live="polite" style="">
                            <div class="toast-title">courier</div>
                            <div class="toast-message">{{ session('error') }}</div>
                        </div>
                    </div>
                @endif
            
                <!-- ============ Toaster end  ============= -->
               
     
                
                <!-- start category -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card o-hidden mb-4" style="overflow:visible;">
                            <div class="card-header d-flex align-items-center border-0">
                                <h3 class="w-50 float-left card-title m-0">courier List</h3>
                                <div class="dropdown dropleft text-right w-50 float-right">
                                    <a class="btn btn-success btn-sm m-1"  type="button" href="{{ URL('admin/courier/create') }}"  >Add</a>
                                </div>
                            </div>
                            <div>
                                <div class="table-responsive">
                                    <table id="adminUserList" class="display table table-striped table-bordered dataList"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">COURIER ID</th>
                                                <th scope="col">CUSTOMER NAME</th>
                                                <th scope="col">PRODUCT DETAILS </th>
                                                <th scope="col">PRODUCT WEIGHT</th>
                                                <th scope="col"> FROM ADDRESS </th>
                                                <th scope="col">DELIVERY ADDRESS </th>
                                                <th scope="col"> SHIPMENT METHOD </th>
                                                <th scope="col">STATUS</th>
                                                <th scope="col">ACTION</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
                <!-- end category -->
            <!-- end of main-content -->
            @endsection
            @section('datatable-js')
                <script src="{{ asset('admin-script/courier.js') }}"></script>
            @endsection
          
        