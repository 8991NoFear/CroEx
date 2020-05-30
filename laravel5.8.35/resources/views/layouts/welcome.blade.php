<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('title')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style media="screen">
        html {
            scroll-behavior: smooth;
        }

        footer {
            background-color: #212529;
        }

        img.footer {
            width: 50px;
            height: 50px;
        }

        a.nav-link:hover {
            background-color: #3490dc;
        }
        .card,
        .card-header,
        .card-body,
        .card-footer {
            background: #fff;
        }

        .card-footer {
            border-top: 1px dashed black;
        }

        .card-footer>h5 {
            color: orange;
        }

        .card {
            -webkit-box-shadow: 8px 12px 18px 4px rgba(99, 99, 99, 0.7);
            box-shadow: 8px 12px 18px 4px rgba(99, 99, 99, 0.7);
        }
    </style>
    @yield('custom-style')
</head>

<body>

    <!-- Navigation Bar Starts -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
        <a class="navbar-brand justify-content-start" href="/">CroEx</a>
        <button class="navbar-toggler my-3" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-center justify-content-end" id="collapsibleNavbar">
            <ul class="navbar-nav nav nav-pills list-group">
                @if (isset($user))

                <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="/fontawesome/svgs/regular/bell.svg" alt="" width="20">
                        <!-- Counter - Messages -->
                        <span class="badge badge-danger badge-counter">{{ count($user->notifications) }}</span>
                    </a>
                    <!-- Dropdown - Messages -->
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                        @forelse ($user->notifications as $notification)
                        <div class="dropdown-item d-flex align-items-center">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="#" alt="img here">
                                <div class="status-indicator bg-success"></div>
                            </div>
                            <div class="font-weight-bold">
                                <div class="text-truncate">
                                    @if ($notification->data['type'] == 0)
                                    you have sent {{ $notification->data['point'] }} points to other!
                                    @else
                                    you have received {{ $notification->data['point'] }} points from other!
                                    @endif
                                </div>
                                <div class="small text-gray-500">{{ $notification->created_at }}</div>
                            </div>
                        </div>
                    @empty
                        <h5 class="dropdown-header">
                            No Message Available !!!
                        </h5>
                    @endforelse
                    </div>
                </li>

                <li class="nav-item dropdown pl-3 border-left">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" data-toggle="dropdown">
                        <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/20x20">
                        {{ $user->name}}
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow">
                        <a class="dropdown-item" href="{{ route('user.edit')}}">
                            Profile
                        </a>
                        <a class="dropdown-item" href="#">
                            Activity Log
                        </a>
                        <a class="dropdown-item" href="{{ route('user.exchange') }}">
                            Exchange Point
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            Logout
                        </a>
                    </div>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}">login</a>
                </li>
                @endif
            </ul>
        </div>
    </nav>

    <!-- Logout Modal-->
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

    <!-- Navigation Bar Ends -->

    @yield('main')


    <!-- Footer Starts -->
    <footer>
        <div class="container p-5 text-center">
            <div class="row justify-content-center mb-3">
                <div class="col-sm-1">
                    <a href="#"><img class="footer" src="/fontawesome/svgs/brands/facebook.svg" alt=""></a>
                </div>

                <div class="col-sm-1">
                    <a href="#"><img class="footer" src="/fontawesome/svgs/brands/twitter.svg" alt=""></a>
                </div>

                <div class="col-sm-1">
                    <a href="#"><img class="footer" src="/fontawesome/svgs/brands/linkedin.svg" alt=""></a>
                </div>

            </div>

            <p class="text-muted mb-0">Copyright © Dev Web 2020</p>
            <p class="text-muted mb-0">Designed by <a href="https://www.position2.com/" target="_balnk">Group 2</p>
        </div>
    </footer>
    <!-- Footer Ends -->
</body>

</html>
