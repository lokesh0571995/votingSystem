<!-- Page Sidebar Start-->
<div class="sidebar-wrapper">
    <div>
        <div class="logo-wrapper logo-wrapper-center">
            <a href="{{route('dashboard')}}" data-bs-original-title="" title="" style="color: #b7a8a8;font-size: 20px;">
                <!-- <img class="img-fluid for-dark" src="{{asset('admin_site/assets/images/logo/logo-white.png')}}" alt=""> -->
                Award Winning Voting System
            </a>
            <div class="back-btn">
                <i class="fa fa-angle-left"></i>
            </div>
            <div class="toggle-sidebar">
                <i class="status_toggle middle sidebar-toggle" data-feather="grid"></i>
            </div>
        </div>
        <div class="logo-icon-wrapper">
            <a href="{{route('dashboard')}}">
                <img class="img-fluid main-logo" src="{{asset('admin_site/assets/images/logo/logo.png')}}" alt="logo">
            </a>
        </div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow">
                <i data-feather="arrow-left"></i>
            </div>

            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn"></li>
                    <li class="sidebar-main-title sidebar-main-title-3">
                        <div>
                            <h6 class="lan-1">General</h6>
                            <p class="lan-2">Dashboards &amp; Users.</p>
                        </div>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{route('dashboard')}}">
                            <i data-feather="home"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                            <i data-feather="users"></i>
                            <span>Voter User</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="{{url('admin/voter/index')}}">All Voter List</a>
                            </li>
                           
                        </ul>
                    </li>

                    
                    <!-- <li class="sidebar-main-title sidebar-main-title-2">
                        <div>
                            <h6 class="lan-1">Application</h6>
                            <p class="lan-2">Ready To Use Apps</p>
                        </div>
                    </li> -->

                    <!-- <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                            <i data-feather="archive"></i>
                            <span>Users</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="">User List</a>
                            </li>
                            
                        </ul>
                    </li> -->
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow">
                <i data-feather="arrow-right"></i>
            </div>
        </nav>
    </div>
</div>
<!-- Page Sidebar Ends-->