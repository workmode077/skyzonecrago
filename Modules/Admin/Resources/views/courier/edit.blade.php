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
                        <li>Edit</li>
                    </ul>
                </div>
                <div class="separator-breadcrumb border-top"></div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="card-title mb-3">courier</div>
                                <form method="post" action="{{ route('courier.update',$data->id) }}" enctype='multipart/form-data'>
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-6 form-group mb-3">
                                            <label for="firstName1">CUSTOMER NAME</label>
                                            <input class="form-control" type="text" placeholder="CUSTOMER NAME" name="customer_name" value="@if(isset($data)){{ $data->customer_name }}@endif" />
                                            @if($errors->has('customer_name'))
                                                    <div class="error text-danger">{{ $errors->first('customer_name') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-md-6 form-group mb-3">
                                            <label for="firstName1">PRODUCT DETAILS </label>
                                            <textarea class="form-control" type="text" placeholder="PRODUCT DETAILS" name="product_weight" />@if(isset($data)){{ $data->product_weight }}@endif</textarea>
                                            @if($errors->has('product_weight'))
                                                    <div class="error text-danger">{{ $errors->first('product_weight') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-md-6 form-group mb-3">
                                            <label for="firstName1">PRODUCT WEIGHT</label>
                                            <input class="form-control" type="text" placeholder="PRODUCT WEIGHT" name="product_weight" value="@if(isset($data)){{ $data->product_weight }}@endif" />
                                            @if($errors->has('product_weight'))
                                                    <div class="error text-danger">{{ $errors->first('product_weight') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-md-6 form-group mb-3">
                                            <label for="firstName1">FROM ADDRESS </label>
                                            <textarea class="form-control" type="text" placeholder="FROM ADDRESS " name="from_address" />@if(isset($data)){{ $data->from_address }}@endif</textarea>
                                            @if($errors->has('from_address'))
                                                    <div class="error text-danger">{{ $errors->first('from_address') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-md-6 form-group mb-3">
                                            <label for="firstName1">DELIVERY ADDRESS</label>
                                            <textarea class="form-control" type="text" placeholder="DELIVERY ADDRESS" name="delivery_address" />@if(isset($data)){{ $data->delivery_address }}@endif</textarea>
                                            @if($errors->has('delivery_address'))
                                                    <div class="error text-danger">{{ $errors->first('delivery_address') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-md-6 form-group mb-3">
                                            <label for="picker1">SHIPMENT METHOD</label>
                                            <select class="form-control" name="shipping_method">
                                                <option value="1">Air</option>
                                                <option value="2">sea</option>
                                                <option value="3">Land</option>
                                            </select>
                                            @if($errors->has('shipping_method'))
                                                    <div class="error text-danger">{{ $errors->first('shipping_method') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-md-12">
                                            <button class="btn btn-primary float-right btn-sm m-1" type="submit">Submit</button>
                                            <a href="{{ URL('admin/courier') }}" class="btn btn-danger float-right btn-sm m-1">Cancel</a>
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
                <script src="{{ asset('admin-script/image-preview.js') }}"></script>
            @endsection
           