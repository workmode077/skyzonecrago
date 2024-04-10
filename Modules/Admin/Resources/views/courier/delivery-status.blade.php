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
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="card-title mb-3">STATUS DETAILS</div>
                                <form method="post" action="{{ route('delivery-status-pickup.update',$data->id) }}" enctype='multipart/form-data'>
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-12 form-group mb-3">
                                            <label for="firstName1">PICKUP NOTE[Date And Address] </label>
                                            <textarea class="form-control" type="text" placeholder="NOTE " name="pickup_note"  rows="5">@if(isset($data)){{ $data->pickup_note }}@endif</textarea>
                                            @if($errors->has('pickup_note'))
                                                    <div class="error text-danger">{{ $errors->first('pickup_note') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-md-12">
                                            <button class="btn btn-primary float-right btn-sm m-1" type="submit">Submit</button>
                                            <a href="{{ URL('admin/courier') }}" class="btn btn-danger float-right btn-sm m-1">Back</a>
                                        </div>
                                    </div>
                                </form>
                                <form method="post" action="{{ route('delivery-status-booked.update',$data->id) }}" enctype='multipart/form-data'>
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-12 form-group mb-3">
                                            <label for="firstName1">BOOKED / DISPATCHED NOTE[Date And Address] </label>
                                            <textarea class="form-control" type="text" placeholder="NOTE " name="booked_note" rows="5">@if(isset($data)){{ $data->booked_note }}@endif</textarea>
                                            @if($errors->has('booked_note'))
                                                    <div class="error text-danger">{{ $errors->first('booked_note') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-md-12">
                                            <button class="btn btn-primary float-right btn-sm m-1" type="submit">Submit</button>
                                            <a href="{{ URL('admin/courier') }}" class="btn btn-danger float-right btn-sm m-1">Back</a>
                                        </div>
                                    </div>
                                </form>
                                <form method="post" action="{{ route('delivery-status-on-his-way.update',$data->id) }}" enctype='multipart/form-data'>
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-12 form-group mb-3">
                                            <label for="firstName1">ON HIS WAY NOTE[Date And Address] </label>
                                            <textarea class="form-control" type="text" placeholder="NOTE " name="on_his_way_note" rows="5">@if(isset($data)){{ $data->on_his_way_note }}@endif</textarea>
                                            @if($errors->has('on_his_way_note'))
                                                    <div class="error text-danger">{{ $errors->first('on_his_way_note') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-md-12">
                                            <button class="btn btn-primary float-right btn-sm m-1" type="submit">Submit</button>
                                            <a href="{{ URL('admin/courier') }}" class="btn btn-danger float-right btn-sm m-1">Back</a>
                                        </div>
                                    </div>
                                </form>
                             </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-body">
                                <form method="post" action="{{ route('delivery-status-at-detination.update',$data->id) }}" enctype='multipart/form-data'>
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-12 form-group mb-3">
                                            <label for="firstName1">AT DESTINATION [Date And Address] </label>
                                            <textarea class="form-control" type="text" placeholder="NOTE " name="at_destination_note" rows="5">@if(isset($data)){{ $data->at_destination_note }}@endif</textarea>
                                            @if($errors->has('at_destination_note'))
                                                    <div class="error text-danger">{{ $errors->first('at_destination_note') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-md-12">
                                            <button class="btn btn-primary float-right btn-sm m-1" type="submit">Submit</button>
                                            <a href="{{ URL('admin/courier') }}" class="btn btn-danger float-right btn-sm m-1">Back</a>
                                        </div>
                                    </div>
                                </form>

                                <form method="post" action="{{ route('delivery-status-out-of-delivery.update',$data->id) }}" enctype='multipart/form-data'>
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-12 form-group mb-3">
                                            <label for="firstName1">OUT FOR DELIVERY NOTE[Date And Address] </label>
                                            <textarea class="form-control" type="text" placeholder="NOTE " name="out_of_delivery_note" rows="5">@if(isset($data)){{ $data->out_of_delivery_note }}@endif</textarea>
                                            @if($errors->has('out_of_delivery_note'))
                                                    <div class="error text-danger">{{ $errors->first('out_of_delivery_note') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-md-12">
                                            <button class="btn btn-primary float-right btn-sm m-1" type="submit">Submit</button>
                                            <a href="{{ URL('admin/courier') }}" class="btn btn-danger float-right btn-sm m-1">Back</a>
                                        </div>
                                    </div>
                                </form>

                                <form method="post" action="{{ route('delivery-status-delivered.update',$data->id) }}" enctype='multipart/form-data'>
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-12 form-group mb-3">
                                            <label for="firstName1">DELIVERED NOTE[Date And Address] </label>
                                            <textarea class="form-control" type="text" placeholder="NOTE " name="delivered_note" rows="5">@if(isset($data)){{ $data->delivered_note }}@endif</textarea>
                                            @if($errors->has('delivered_note'))
                                                    <div class="error text-danger">{{ $errors->first('delivered_note') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-md-12">
                                            <button class="btn btn-primary float-right btn-sm m-1" type="submit">Submit</button>
                                            <a href="{{ URL('admin/courier') }}" class="btn btn-danger float-right btn-sm m-1">Back</a>
                                        </div>
                                    </div>
                                </form>
                                
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card mb-4">
                            
                            <div class="card-body">
                                <div class="card-title mb-3">ORDER CANCELED</div>
                                <form method="post" action="{{ route('order-cancel.update',$data->id) }}" enctype='multipart/form-data'>
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-12 form-group mb-3">
                                            <label for="firstName1">CANCEL NOTE[Date And Address] </label>
                                            <textarea class="form-control" type="text" placeholder="NOTE " name="cancel_note" rows="5">@if(isset($data)){{ $data->cancel_note }}@endif</textarea>
                                            @if($errors->has('cancel_note'))
                                                    <div class="error text-danger">{{ $errors->first('cancel_note') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-md-12">
                                            <button class="btn btn-primary float-right btn-sm m-1" type="submit">Submit</button>
                                            <a href="{{ URL('admin/courier') }}" class="btn btn-danger float-right btn-sm m-1">Back</a>
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
           