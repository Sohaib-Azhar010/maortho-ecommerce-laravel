<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - MAORTHO</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
    <div class="container-scroller">
        <!-- Navbar -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row flex-nowrap">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="{{ route('admin.dashboard') }}">
                    MAORTHO
                </a>
                <a class="navbar-brand brand-logo-mini" href="{{ route('admin.dashboard') }}">
                    M
                </a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center">
                <!-- Desktop Toggle -->
                <button class="navbar-toggler navbar-toggler align-self-center d-none d-lg-block" type="button" data-toggle="minimize">
                    <span class="fa fa-bars"></span>
                </button>
                
                <!-- Mobile Toggle -->
                <button class="navbar-toggler navbar-toggler align-self-center d-lg-none" type="button" data-bs-toggle="offcanvas">
                    <span class="fa fa-bars"></span>
                </button>
                
                <ul class="navbar-nav navbar-nav-right ms-auto">
                     <li class="nav-item d-none d-lg-block full-screen-link">
                        <!-- Optional: Full screen toggle or just spacer if needed, sticking to Signout -->
                     </li>
                     <li class="nav-item">
                        <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link text-primary fw-bold" style="text-decoration: none;">
                                <i class="fa fa-power-off me-2"></i> Signout
                            </button>
                        </form>
                     </li>
                </ul>
            </div>
        </nav>
        
        <!-- Page Body -->
        <div class="page-body-wrapper">
             <!-- Sidebar -->
             <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">

                    <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">
                            <span class="menu-title">Dashboard</span>
                            <i class="fa fa-home menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.categories.index') }}">
                            <span class="menu-title">Categories</span>
                            <i class="fa fa-list menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.products.index') }}">
                            <span class="menu-title">Products</span>
                            <i class="fa fa-box menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('admin.feedback.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.feedback.index') }}">
                            <span class="menu-title">Feedback</span>
                            <i class="fa fa-comments menu-icon"></i>
                        </a>
                    </li>
                    <!-- Removed Extraneous Links -->
                </ul>
             </nav>
             
             <!-- Main Panel -->
             <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
                
                <!-- Footer Removed -->
             </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery Optional but used in script wrapper, lets use vanilla approach or add CDN if needed for plugins later. Keeping vanilla mostly. -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/admin.js') }}"></script>

    @stack('scripts')
</body>
</html>
