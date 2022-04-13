<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css')}}">
	<title> Catatan Perjalanan | Dashboard </title>
</head>
<body>
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>

	<div class="container">
		@yield('dashbody')
	</div>

<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
</body>
</html>