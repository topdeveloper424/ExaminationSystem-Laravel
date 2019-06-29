<!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-TileColor" content="#0061da">
    <meta name="theme-color" content="#1643a3">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">

    <!-- Title -->
    <title>Examination System</title>
    <link rel="stylesheet" href="{{asset('assets\fonts\fonts\font-awesome.min.css')}}">

    <!-- Sidemenu Css -->
    <link href="{{asset('assets\plugins\fullside-menu\css\style.css')}}" rel="stylesheet">
    <link href="{{asset('assets\plugins\fullside-menu\waves.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets\plugins\select2\select2.min.css')}}" rel="stylesheet">

    <!-- Dashboard Css -->
    <link href="{{asset('assets\css\dashboard.css')}}" rel="stylesheet">

    <!-- Morris.js Charts Plugin -->
    <link href="{{asset('assets\plugins\morris\morris.css')}}" rel="stylesheet">

    <!-- Custom scroll bar css-->
    <link href="{{asset('assets\plugins\scroll-bar\jquery.mCustomScrollbar.css')}}" rel="stylesheet">
    <!---Font icons-->
    <link href="{{asset('assets\css\icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets\plugins\sweet-alert\sweetalert.css')}}" rel="stylesheet">

    <script src="{{asset('assets\js\vendors\jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('assets\js\vendors\bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets\js\vendors\jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('assets\js\vendors\selectize.min.js')}}"></script>
    <script src="{{asset('assets\js\vendors\jquery.tablesorter.min.js')}}"></script>
    <script src="{{asset('assets\js\vendors\circle-progress.min.js')}}"></script>
    <script src="{{asset('assets\plugins\rating\jquery.rating-stars.js')}}"></script>

    <!-- Fullside-menu Js-->
    <script src="{{asset('assets\plugins\fullside-menu\jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('assets\plugins\fullside-menu\waves.min.js')}}"></script>

    <!-- Dashboard Core -->
    <script src="{{asset('assets\js\index1.js')}}"></script>

    <!--Morris.js Charts Plugin -->
    <script src="{{asset('assets\plugins\morris\raphael-min.js')}}"></script>
    <script src="{{asset('assets\plugins\morris\morris.js')}}"></script>
    <script src="{{asset('assets\plugins\select2\select2.full.min.js')}}"></script>
    <!-- Custom scroll bar Js-->
    <script src="{{asset('assets\plugins\scroll-bar\jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{asset('assets\js\select2.js')}}"></script>
    <!-- Custom Js-->
    <script src="{{asset('assets\js\custom.js')}}"></script>
    <script src="{{asset('assets\plugins\sweet-alert\sweetalert.min.js')}}"></script>
    <script src="{{asset('assets\js\sweet-alert.js')}}"></script>
    <style>
        td,th{
            text-align: center;
        }
    </style>

</head>
<body class="">
<div id="global-loader"></div>
<div class="page">
    <div class="page-main">
        <div class="app-header1 header py-1 d-flex">
            <div class="container-fluid">
                <div class="d-flex">
                    <a class="header-brand" href="/">
                        <img src="{{asset('assets\images\brand\logo.png')}}" class="header-brand-img" alt="adminor logo">
                    </a>
                    <div class="menu-toggle-button">
                        <a class="nav-link wave-effect" href="#" id="sidebarCollapse">
                            <span class="fa fa-bars"></span>
                        </a>
                    </div>
                    <div class="d-flex order-lg-2 ml-auto header-right-icons header-search-icon">

                        <div class="dropdown text-center selector">
                            <a href="#" class="nav-link leading-none" data-toggle="dropdown">
                                <span class="avatar avatar-sm brround cover-image" data-image-src="{{asset('assets/images/faces/female/25.jpg')}}"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow ">
                                <div class="text-center">
                                    <a href="#" class="dropdown-item text-center font-weight-sembold user" data-toggle="dropdown">{{ Session::get('username')}}</a>
                                    <span class="text-center user-semi-title text-dark">Administrator</span>
                                    <div class="dropdown-divider"></div>
                                </div>
                                <a class="dropdown-item" href="/logout">
                                    <i class="dropdown-icon mdi  mdi-logout-variant"></i> Sign out
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar" class="nav-sidebar">
                <ul class="list-unstyled components" id="accordion">
                    <div class="user-profile">
                        <div class="dropdown user-pro-body">
                            <div class="mb-2"><a href="#" class="" data-toggle="" aria-haspopup="true" aria-expanded="false"> <span class="font-weight-semibold">{{ Session::get('username')}}</span>  </a>
                                <br><span class="text-gray">Administrator</span>
                            </div>
                        </div>
                    </div>
                    <li class="{{Request::is('/') ? 'active':''}}">
                        <a href="/" class=" wave-effect"><i class="fa fa-desktop mr-2"></i> Dashboard</a>
                    </li>
                    <li class="{{Route::is('admin.categories') ? 'active':''}}">
                        <a href="{{route('admin.categories')}}" class=" wave-effect"><i class="mdi mdi-buffer mr-2"></i> Category</a>
                    </li>
                    <li class="{{Route::is('admin.questions') ? 'active':''}}">
                        <a href="{{route('admin.questions')}}" class=" wave-effect"><i class="fa fa-tachometer mr-2"></i> Question</a>
                    </li>
                    <li class="{{Route::is('admin.displaylist') ? 'active':''}}">
                        <a href="{{route('admin.displaylist')}}" class=" wave-effect"><i class="fa fa-th mr-2"></i> Display List</a>
                    </li>

                </ul>
            </nav>
            @yield('content')
        </div>
    </div>

    <!--footer-->
    <footer class="footer">
        <div class="container">
            <div class="row align-items-center flex-row-reverse">
                <div class="col-md-12 col-sm-12 mt-3 mt-lg-0 text-center">
                    <a href="#">Examination System</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer-->
</div>

<!-- Back to top -->
<a href="#top" id="back-to-top" style="display: inline;"><i class="fa fa-angle-up"></i></a>

<!-- Dashboard Core -->


</body>
</html>