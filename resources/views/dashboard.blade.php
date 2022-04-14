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
<style>
	hr {
  border: 0;
  clear:both;
  display:block;
  width: 96%;    
  margin: 0;           
  background-color:#FFFF00;
}
</style>
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>

	<div class="container-fluid">
		<div class="row flex-nowrap">		
			<div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
				<div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white text-decoration-none min-vh-100">
					<span class=" fs-5 text-center" style="width:100%;">
						CaPer
					</span>
					<i class="text-center" style="width:100%;"> Catatan Perjalanan </i>
					<img src="{{asset('img/avatar.png')}}" class="mt-2 img-thumbnail img-fluid" style="background-color: white; border-radius: 50px; ">

					<span class="fs-5 text-center" style="width:100%;">
						@php echo Session::get('username');
						@endphp
					</span>
					<hr>
					<ul class="nav mt-2 nav-fills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">

						<li class="nav-item">
							<a href="#" class="nav-link align-middle px-0">
								<span class="fas fa-user"></span> Profil
							</a>
						</li>

						<li class="nav-item">
							<a href="#" class="nav-link align-middle px-0">
								<span class="fas fa-history"></span> Riwayat Perjalanan	
							</a>
						</li>

						<li class="nav-item">
							<a onclick="logout_verify()" class="nav-link align-middle px-0">
								<span class="fa-solid fa-sign-out">
								</span> Logout
							</a>
						</li>

					</ul>
				</div>
			</div>
			<div class="col py-3">
				@yield('dashbody')
				<ul class="pagination mt-2 justify-content-center">
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
</body>
</html>