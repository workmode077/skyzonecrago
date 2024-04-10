<div class="app-admin-wrap layout-sidebar-large">
<div class="main-header">
            <div class="logo">
                    <img src={{ asset('admin/images/logo.jpeg') }} alt="" style="width: 120px;height:auto">
            </div>
            <div class="menu-toggle">
                <div></div>
                <div></div>
                <div></div>
            </div>
           
            <div style="margin: auto"></div>
            <div class="header-part-right">
                <!-- Full screen toggle -->
                <i class="i-Full-Screen header-icon d-none d-sm-inline-block" data-fullscreen></i>
               
                <!-- User avatar dropdown -->
                <div class="dropdown">
                    <div class="user col align-self-end">
                        <img src={{ asset('admin/images/admin.png') }} id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <div class="dropdown-header">
                                <p><i class="i-Lock-User mr-1"></i> {{Auth::guard('admin')->user()->name}}</p>
                            </div>
                           
                            <a class="dropdown-item" href="{{route('admin.logout')}}">Sign out</a>
                        </div>
                    </div>
                </div>
            </div>
</div>