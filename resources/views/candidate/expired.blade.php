﻿<!doctype html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="msapplication-TileColor" content="#2d89ef">
		<meta name="theme-color" content="#4188c9">
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="mobile-web-app-capable" content="yes">
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<link rel="icon" href="favicon.ico" type="image/x-icon">
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">

		<!-- Title -->
		<title>adminor – Clean & Modern Responsive Bootstrap 4 admin dashboard HTML5 Template.</title>
		<link rel="stylesheet" href="{{asset('assets\fonts\fonts\font-awesome.min.css')}}">

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
	<body class="login-img">
		<div id="global-loader"></div>
		<div class="page">
			<div class="page-content error-page">
				<div class="container text-center">
					<div class="error-template">
						<h1 class="display-1 text-white mb-5">
							Oops!</h1>
						<h2 class="h2  mb-3 text-transparent">
							Error</h2>
						<div class="error-details text-transparent">
							Sorry, your test was expired!, Please contact to your recruiter!
						</div>
						<div class="error-actions mt-5">
							<a class="btn btn-secondary" href="/">
								Back To Home
							</a>
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