<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('fontawesome/css/all.min.css')}}">
	<title> Catatan Perjalanan | Dashboard </title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<style>
	hr {
  border: 0;
  clear:both;
  display:block;
  width: 96%;    
  margin: 0;           
  background-color:#FFFF00;
}
body{
	background-color: #f5f5f5;
	height: 100vh;
}

.hov: hover{
	background-color: #f5f5f5;
}
hr {
  border: 0;
  clear:both;
  display:block;
  width: 96%;               
  background-color:black;
  height: 1px;
}
</style>
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>

	<div class="container p-3 mt-2">
		<div class="row">
			<div class="col-md">
				<img src="{{asset('img/avatar.png')}}" class="img-fluid img-thumbnail" style="background-color: white;">
			</div>
			<div class="col-sm-9">
				<div class="card border-0 shadow-sm">
					<div class="card-body">
						<h2 class="font-weight-bold">
							CaPer
						</h2>
						<p>
							Catatan Perjalanan
						</p>
						<hr>
						<br>
						<ul class="list-group list-group-horizontal" style="width: 100%;">
							@if( url()->current() == route('main_welcome'))
								<li class="list-group-item active">
									<a href="{{route('main_welcome')}}" class="nav-link text-white text-center text-decoration-none">
										<span class="fa fa-home"></span> Home
									</a>
								</li>
							@else
								<li class="list-group-item hov">
									<a href="{{route('main_welcome')}}" class="nav-link text-center text-decoration-none">
										<span class="fa fa-home"></span> Home
									</a>
								</li>
							@endif

							@if(url()->current() == url()->current() . Session::get('nik'))
								<li class="list-group-item active">
									<a href="/main/view/@php echo Session::get('nik'); @endphp" class="nav-link text-white text-center text-decoration-none">
										<span class="fa-solid fa-note-sticky"></span> Lihat
									</a>
								</li>
							@else
								<li class="list-group-item">
									<a href="/main/view/@php echo Session::get('nik');@endphp" class="nav-link text-center text-decoration-none">
										<span class="fa-solid fa-note-sticky"></span> Lihat
									</a>
								</li>
							@endif


							@if( url()->current() == route('main_add'))
								<li class="list-group-item active">
									<a href="{{route('main_add')}}" class="nav-link text-white text-center text-decoration-none">
										<span class="fa fa-plus"></span> Tambah
									</a>
								</li>
							@else
								<li class="list-group-item">
									<a href="{{route('main_add')}}" class="nav-link text-center text-decoration-none">
										<span class="fa fa-plus"></span> Tambah
									</a>
								</li>
							@endif



							<li style="margin-left: 10px;" onclick="logout_verify()" class="list-group-item btn-solid btn bg-danger">
								<a href="#" class="nav-link text-center text-decoration-none text-white">
									<span class="fa fa-sign-out"></span> Keluar
								</a>
							</li>
						</ul>



						<div class="container-fluid p-0">
							@yield('dashbody')
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	

	<div class="modal fade" id='logout-modal' role='dialog' tabindex='-1'>
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title">
						Keluar?
					</h3>
				</div>
				<div class="modal-body">
					<p>
						Apakah kamu yakin ingin keluar?
					</p>
				</div>
				<div class="modal-footer">
					<a href="{{route('logout')}}" class="btn btn-solid bg-info text-white text-decoration-none">
						Ya
					</a>
					<a onclick="$('#logout-modal').modal('hide');" class="btn btn-solid bg-warning text-white text-decoration-none">
						Tidak
					</a>
				</div>
			</div>
		</div>
	</div>

<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
<script type="text/javascript" src="{{asset('fontawesome/js/all.min.js')}}"></script>
<script type="text/javascript">
	function logout_verify(){
		$("#logout-modal").modal('show');
	}
</script>
				<ul class="d-none pagination mt-2 justify-content-center">
					<li class="page-item">
						<a href="#" class="page-link">
							&laquo;
						</a>
					</li>
					<li class="page-item">
						<a href="#" class="page-link">
							2
						</a>
					</li>
					<li class="page-item">
						<a href="#" class="page-link">
							3
						</a>
					</li>
					<li class="page-item">
						<a href="#" class="page-link">
							4
						</a>
					</li>
					<li class="page-item">
						<a href="#" class="page-link">
							&raquo;
						</a>
					</li>
				</ul>
</body>
</html>