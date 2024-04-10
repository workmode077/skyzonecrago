@extends('admin::layouts.master')

@section('content')

       
          {{-- header start --}}
          @include('admin::layouts.header')
          {{-- header end --}}
  
          {{-- sidebar start --}}
              @include('admin::layouts.sidebar')
          {{-- sidebar end --}}
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1 class="mr-2">Dashboard</h1>
                    <ul>
                        <li><a href="#">Dashboard</a></li>
                    </ul>
                </div>
                <div class="separator-breadcrumb border-top"></div>
                <div class="row mt-5">
                    <!-- ICON BG-->
                   
                   
                </div>
                <div class="row mt-3">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                            <div class="card-body text-center"><i class="i-Add-User"></i>
                                <div class="content">
                                    <p class="text-muted mt-2 mb-0">Admin Users</p>
                                    <p class="text-primary text-24 line-height-1 mb-2">1</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                            <div class="card-body text-center"><i class="i-Add-Order"></i>
                                <div class="content">
                                    <p class="text-muted mt-2 mb-0">Courier</p>
                                    <p class="text-primary text-24 line-height-1 mb-2">2</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
            </div>

                <!-- CARD ICON-->
            
            <!-- end of main-content -->
          
@endsection
