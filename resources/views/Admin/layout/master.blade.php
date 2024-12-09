<!DOCTYPE html>
<html lang="en">

<header>
    @include('Admin.layout.header')
</header>

<body class="with-welcome-text">
    <div class="container-scroller">

        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                <div class="me-3">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                        data-bs-toggle="minimize">
                        <span class="icon-menu"></span>
                    </button>
                </div>
                <div>
                    <a class="navbar-brand brand-logo" href="{{ route('admin.dashboard') }}">
                        <img src="{{ asset('admin/images/logo.svg') }}" alt="logo" />
                    </a>
                    <a class="navbar-brand brand-logo-mini" href="index.html">
                        <img src="{{ asset('admin/images/logo-mini.svg') }}" alt="logo" />
                    </a>
                </div>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">
                            <i class="mdi mdi-view-dashboard menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.user') }}">
                            <i class="mdi mdi-account menu-icon"></i>
                            <span class="menu-title">Users</span>
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.frontend') }}">
                            <i class="mdi mdi-apps menu-icon"></i>
                            <span class="menu-title">Home Page</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.siteData') }}">
                            <i class="mdi mdi-grid-large menu-icon"></i>
                            <span class="menu-title">Footer</span>
                        </a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.homeslide') }}">
                            <i class="mdi mdi-application menu-icon"></i>
                            <span class="menu-title">HomeSlide</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.testimonial') }}">
                            <i class="mdi mdi-animation menu-icon"></i>
                            <span class="menu-title">Testimonial</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.category') }}">
                            <i class="mdi mdi-grid-large menu-icon"></i>
                            <span class="menu-title">Category</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.post') }}">
                            <i class="mdi mdi-file-image  menu-icon"></i>
                            <span class="menu-title">Post</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.setting') }}">
                            <i class="mdi mdi-cog  menu-icon"></i>
                            <span class="menu-title">Setting</span>
                        </a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.contact') }}">
                            <i class="mdi mdi-contacts menu-icon"></i>
                            <span class="menu-title">Contact </span>
                        </a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" href="{{ route('notice.index') }}">
                            <i class="mdi mdi-bullhorn menu-icon"></i>
                            <span class="menu-title">Notice </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.logout') }}">
                            <i class="mdi mdi-logout  menu-icon"></i>
                            <span class="menu-title">Logout</span>
                        </a>
                    </li>


                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">

                @yield('content')

                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('Admin.layout.footer-script')

</body>

</html>
