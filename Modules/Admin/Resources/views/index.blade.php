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
                                <form method="post"  action="{{ route('admin.login') }}">
                                    @if(session()->has('status'))
                                        <div class="m-alert m-alert--outline alert alert-success alert-dismissible  show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">X</button>
                                            {{ session()->get('status') }}
                                        </div>
                                    @endif
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input id="email"class="form-control form-control-rounded " name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input id="password" type="password"
                                            class="form-control form-control-rounded @error('password') is-invalid @enderror"
                                            name="password" required autocomplete="current-password">
                                    </div>
                                    {{-- <button class="btn btn-rounded btn-primary btn-block mt-2">Sign In</button> --}}
                                    <button class="btn btn-rounded btn-primary btn-block mt-2" type="submit">Sign In</a>
               
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
