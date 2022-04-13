<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('fontawesome/css/all.min.css')}}">
	<title> Catatan Perjalanan | Dashboard </title>
</head>
<body>
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>

	<div class="container-fluid">
		<div class="row flex-nowrap">		
			<div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
				<div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white text-decoration-none min-vh-100">
					<img src="{{asset('img/avatar.png')}}" class="img-fluid mt-2 img-thumbnail" style="background-color: white; border-radius: 50px;">

					<br>
					<a href="#" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
						<span class="fs-5 d-none d-sm-inline">
							@php
								echo Session::get('username');
							@endphp
						</span>
					</a>
					<ul class="nav nav-fills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">

						<li class="nav-item">
							<a href="#" class="nav-link align-middle px-0">
								<span class="fa-solid fa-home"></span> Menu	
							</a>
						</li>

						<li class="nav-item">
							<a href="{{route('logout')}}" class="nav-link align-middle px-0">
								<span class="fa-solid fa-sign-out">
								</span> Logout
							</a>
						</li>

					</ul>
				</div>
			</div>
			<div class="col py-3">
				@yield('dashbody')
			</div>
		</div>
	</div>

<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
<script type="text/javascript" src="{{asset('fontawesome/js/all.min.js')}}"></script>
</body>
</html>