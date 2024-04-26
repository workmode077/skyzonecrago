@php $permissions = Session::get('permArray'); @endphp

<div class="side-content-wrap">
            <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar="" data-suppress-scroll-x="true">
                <ul class="navigation-left">
                    @if(in_array('1', $permissions))
                    <li class="nav-item" ><a class="nav-item-hold" href="{{url('admin/dashboard/')}}"><i class="nav-icon i-Bar-Chart"></i><span class="nav-text">Dashboard</span></a>
                        <div class="triangle"></div>
                    </li>
                    @endif
                    @if(in_array('2', $permissions))
                    <li class="nav-item" data-item="admin"><a class="nav-item-hold" href="#"><i class="nav-icon i-Administrator"></i><span class="nav-text">Admin</span></a>
                        <div class="triangle"></div>
                    </li>
                    @endif
                    @if(in_array('2', $permissions))
                    <li class="nav-item" ><a class="nav-item-hold" href="{{url('admin/courier/')}}"><i class="nav-icon  i-Computer-Secure"></i><span class="nav-text">Courier</span></a>
                        <div class="triangle"></div>
                    </li>
                    @endif
                    {{-- @if(in_array('2', $permissions))
                    <li class="nav-item" ><a class="nav-item-hold" href="{{url('admin/website/home')}}"><i class="nav-icon  i-Computer-Secure"></i><span class="nav-text">Check details</span></a>
                        <div class="triangle"></div>
                    </li>
                    @endif
                    
                   @if(in_array('2', $permissions))
                    <li class="nav-item" data-item="settings"><a class="nav-item-hold" href="#"><i class="nav-icon  i-Computer-Secure"></i><span class="nav-text">Settings</span></a>
                        <div class="triangle"></div>
                    </li>
                    @endif --}}
                </ul>
            </div>
            <div class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar="" data-suppress-scroll-x="true">
                <!-- Submenu Dashboards-->
                <ul class="childNav" data-parent="admin">
                    <li class="nav-item"><a href="{{url('admin/roles/')}}"><i class="nav-icon i-Receipt-4"></i><span class="item-name">Roles</span></a></li>
                    <li class="nav-item"><a href="{{url('admin/adminuser/')}}"><i class="nav-icon i-Male"></i><span class="item-name">Admin Users</span></a></li>
                </ul>
             </div>
            <div class="sidebar-overlay"></div>
        </div>