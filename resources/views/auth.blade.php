<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('fontawesome/css/all.min.css')}}">
	<title> User Authentication </title>
	<meta name="csrf-token" content="{{ csrf_token() }}" />

</head>
<body>
	<script type="text/javascript" src="{{ asset('js/jquery.min.js')}}"></script>

	<h3 class="text-center">
		@yield('authtitle')
	</h3>

	<div class="d-flex justify-content-center align-items-center">
		@yield('authbody')
	</div>
<script type="text/javascript" src="{{ asset('js/app.js')}}"></script>
<script type="text/javascript" src="{{ asset('fontawesome/js/all.min.js')}}"></script>
</body>
</html>