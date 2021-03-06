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
    <title>adminor – Clean & Modern Responsive Bootstrap 4 admin dashboard HTML5 Template.</title>
    <link rel="stylesheet" href="{{asset('assets/fonts/fonts/font-awesome.min.css')}}">

    <!-- Font Family -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">

    <!-- Sidemenu Css -->
    <link href="{{asset('assets\plugins\fullside-menu\css\style.css')}}" rel="stylesheet">
    <link href="{{asset('assets\plugins\fullside-menu\waves.min.css')}}" rel="stylesheet">

    <!-- Dashboard Css -->
    <link href="{{asset('assets\css\dashboard.css')}}" rel="stylesheet">

    <!-- c3.js Charts Plugin -->
    <link href="{{asset('assets\plugins\charts-c3\c3-chart.css')}}" rel="stylesheet">

    <!-- Custom scroll bar css-->
    <link href="{{asset('assets\plugins\scroll-bar\jquery.mCustomScrollbar.css')}}" rel="stylesheet">

    <!---Font icons-->
    <link href="{{asset('assets\css\icons.css')}}" rel="stylesheet">

</head>
<body>
<div class="login-img">
    <div id="global-loader"></div>
    <div class="page">
        <div class="page-single">
            <div class="container">
                <div class="row">
                    <div class="col col-login mx-auto">
                        <div class="text-center mb-6">
                            <img src="assets\images\brand\logo.png" class="h-8" alt="">
                        </div>
                        <form class="card authentication" action="/register" method="post">
                            @csrf
                            <div class="card-body sign-up-page p-7">
                                <div class="card-title text-center">Create New Account</div>
                                @if(isset($error))
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Oh snap!</strong>&nbsp;&nbsp;&nbsp; {{$error}}
                                    </div>
                                @endif
                                @if(isset($success))
                                    <div class="alert alert-success" role="alert">
                                        <strong>Welcome!</strong>&nbsp;&nbsp;&nbsp; {{$success}}
                                    </div>
                                @endif

                                <div class="input-icon form-group">
											<span class="input-icon-addon search-icon">
												<i class="mdi mdi-account"></i>
											</span>
                                    <input type="text" class="form-control" name="name" placeholder="Username" required>
                                </div>
                                <div class="input-icon form-group">
											<span class="input-icon-addon search-icon">
												<i class="zmdi zmdi-email"></i>
											</span>
                                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                                </div>
                                <div class="input-icon form-group">
											<span class="input-icon-addon search-icon">
												<i class="zmdi zmdi-lock"></i>
											</span>
                                    <input type="password" class="form-control mb-0" name="password" id="exampleInputPassword1" placeholder="Password" required>
                                </div>
                                <div class="input-icon form-group">
											<span class="input-icon-addon search-icon">
												<i class="zmdi zmdi-lock"></i>
											</span>
                                    <input type="password" class="form-control mb-0" name="confirm" id="exampleInputPassword2" placeholder="Confirm Password" required>
                                </div>
                                <div class="form-group mt-5">
                                    <label class="form-label">Select User Level</label>
                                    <select class="form-control" name="role" id="roleSelect" required>
                                        <option value="">Select Option...</option>
                                        <option value="0">Candidate</option>
                                        <option value="1">Recruiter</option>
                                    </select>
                                </div>


                                <div class="form-group mt-5">
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input">
                                        <span class="custom-control-label">Agree the <a href="#">terms and policy</a></span>
                                    </label>
                                </div>
                                <div class="form-footer">
                                    <button type="submit" class="btn btn-primary btn-block">Create new account</button>
                                </div>
                                <div class="text-center text-muted mt-4">
                                    Already have account? <a href="/login">Sign in</a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Dashboard js -->
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

<!-- Custom scroll bar Js-->
<script src="{{asset('assets\plugins\scroll-bar\jquery.mCustomScrollbar.concat.min.js')}}"></script>

<!-- Custom Js-->
<script src="{{asset('assets\js\custom.js')}}"></script>
</body>
</html>