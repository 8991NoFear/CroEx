<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>User - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset("css/admin.min.css") }}" rel="stylesheet" type="text/css">
    <link href="{{ asset("css/all.css") }}" rel="stylesheet" type="text/css">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Custom styles for this template-->
    @yield('custom-css')
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <h2 class="sidebar-brand d-flex align-items-center justify-content-start">
                <img width="50" height="50" src="/storage/{{ $user->avatar ?? "/users/na.png"}}" class="mw-100 rounded-circle" alt="image go here">
                <p class="mt-3 ml-3">{{ $user->name }}</p>
            </h2>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('home') }}">
                    <span>Home Page</span>
                </a>
            </li>

            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a href="{{ route('user.dashboard') }}" class="nav-link"><span>Profile</span></a>
            </li>

            <li class="nav-item">
                <a href="{{ route('user.bag') }}" class="nav-link"><span>My Bag</span></a>
            </li>

            <li class="nav-item">
                <a href="{{ route('user.exchange') }}" class="nav-link"><span>Exchange</span></a>
            </li>

            <li class="nav-item">
                <a href="{{ route('user.buy') }}" class="nav-link"><span>Buy Points</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                    <span>Logout</span>
                </a>
            </li>
            <div class="modal fade" id="logoutModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Ready to Leave?</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="{{route('logout')}}">
                                Logout
                            </a>
                        </div>
                    </div>
                </div>
            </div>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                @yield('content')
            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->
    </div>


</body>

@yield('custom-js')

</html>
