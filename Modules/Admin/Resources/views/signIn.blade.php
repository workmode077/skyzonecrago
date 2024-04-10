@extends('admin::layouts.master')

@section('content')

        {{-- Login Section Start --}}
          <div class="auth-layout-wrap" style="background-image: url(../../dist-assets/images/photo-wide-4.jpg)">
            <div class="auth-content">
                <div class="card o-hidden">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="p-4">
                                <div class="auth-logo text-center mb-4"><img src="../../images/formenty-logo.png" alt="" style="width: 180px;height:auto"></div>
                                <h1 class="mb-3 text-18">Sign In</h1>
                                <form>
                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input class="form-control form-control-rounded" id="email" type="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input class="form-control form-control-rounded" id="password" type="password">
                                    </div>
                                    {{-- <button class="btn btn-rounded btn-primary btn-block mt-2">Sign In</button> --}}
                                    <a class="btn btn-rounded btn-primary btn-block mt-2" href="{{url('admin/dashboard/')}}">Sign In</a>
               
                                </form>
                                {{-- <div class="mt-3 text-center"><a class="text-muted" href="forgot.html">
                                        <u>Forgot Password?</u></a></div> --}}
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
        {{-- Login Section End --}}
          
@endsection
