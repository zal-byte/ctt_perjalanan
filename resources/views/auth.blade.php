<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="CaPer | Catatan Perjalanan | Masuk, Daftar">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('fontawesome/css/all.min.css')}}">
	<title> User Authentication </title>
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<style type="text/css">
		body{
			height: 100vh;
			background-image: url("{{asset('img/bg1.svg')}}");
			background-size: cover;
			background-repeat: no-repeat;
		}

		.corner_left{
			position: fixed;
			left: 0px; bottom: 0px;
			width: 200px;
			height: 40px;
			padding: 5px;
		}
			@media only screen and (max-width: 768px){

			#submit_btn_login{
				margin-top: 10px;
			}
		}
	</style>
</head>
<body>
	<script type="text/javascript" src="{{ asset('js/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('lazy/jquery.lazy.min.js')}}"></script>
	<img src="{{asset('img/png.png')}}" hidden>

	<h3 class="text-center">
		@yield('authtitle')
	</h3>

	<div class="corner_left text-white">
		Rizal Solehudin | XII RPL B
	</div>



	<div class="d-flex justify-content-center p-0">

		<div class="card shadow-sm border-0 mt-5" >
				<div class="card-body">
						<h3 class="text-center mb-2">
							CaPer ( Catatan Perjalanan )
						</h3>
						<hr>
						<div class="form-group">
							<form id="myForm">
								<input type='text' id='nik' placeholder="NIK" required class="form-control">
								<div class="bg-danger text-white text-center rounded p-1 mt-2 d-none" id="err_lay0">
									<i id="err_nik">

									</i>
								</div>								
								<br>
								<input type='text' id='name' placeholder="Nama" required class="form-control">
								<div class="bg-danger text-white text-center rounded p-1 mt-2 d-none" id="err_lay1">
									<i id="err_name">

									</i>
								</div>
								<hr>
								<div class="row justify-content-center">
									<div class="col-sm">
										<button id="submit_btn_signup" style="width: 100%;" class="btn btn-solid text-white bg-primary p-1">
											Saya pengguna baru <span class="fa-solid fa-add"></span>
										</button>
									</div>
									<div class="col-sm-5">
										<button style="width: 100%;" class="p-1 btn btn-solid bg-dark text-white" id="submit_btn_login">
											Masuk <span class="fa-solid fa-sign-in"></span>
										</button>
									</div>
								</div>

								<p id="res" class="p-2 mt-2 d-none rounded text-white">

								</p>
							</form>
						</div>
				</div>
		</div>
		<script type="text/javascript">

			$(document).ready(function(){

					

				$("#submit_btn_signup").on("click", function(e){
					e.preventDefault();

					var nik = $("#nik").val();
					var name = $("#name").val();
					var token = $("meta[name=csrf-token]").attr('content');


					var data = "nik=" + nik + "&name=" + name;

					if( nik.length > 0 ){
						if( name.length > 0 ){

							$.ajaxSetup({
								headers:{
									'X-CSRF-TOKEN': token
								}
							});

							$.ajax({
								type:'POST',
								url:"{{route('signup_post')}}",
								data: data,
								success:function(res){
									var jso = JSON.parse(res);
									if(jso['status']==1){
										$("#res").html(jso['msg']);
										$("#res").addClass("bg-success");
										$("#res").toggleClass("d-none d-block");

										setTimeout(function(){
											$("#res").toggleClass("d-block d-none");
										}, 3000);
									}else{
										$("#res").html(jso['msg']);
										$("#res").addClass("bg-warning");
										$("#res").toggleClass("d-none d-block");

										setTimeout(function(){
											$("#res").toggleClass("d-block d-none");
										}, 3000);
									}
								}
							});	

						}else{
							$("#err_lay1").toggleClass("d-none d-block");
							$("#err_name").html("Isi Nama dengan benar");
						}
					}else{
						$("#err_lay0").toggleClass("d-none d-block");
						$("#err_nik").html("Isi NIK dengan benar");
					}
				});

				$("#submit_btn_login").on('click', function(e){
					e.preventDefault();


					var nik = $("#nik").val();
					var name = $("#name").val();
					var token = $("meta[name=csrf-token]").attr('content');
				
					var data = "nik=" + nik + "&name=" + name;

					if( nik.length > 0 ){
						if( name.length > 0 ){

						  $.ajaxSetup({
						        headers: {
						            'X-CSRF-TOKEN':token
						        }
						    });	
							$.ajax({
								type:'POST',
								headers:{'X-CSRF-TOKEN':token},
								data: data,
								url: '{{route("login_post")}}',
								success: function(res){
									var jso = JSON.parse(res);
									if(jso['status']==1)
									{
										window.location.replace("@php echo Session::get('interact'); @endphp");
									}else{
										$("#res").addClass("bg-danger");
										$("#res").toggleClass("d-none d-block");
										$("#res").html(jso['msg']);
									}
								}
							});
						}else{
							$("#err_lay1").toggleClass("d-none d-block");
							$("#err_name").html("Masukan Nama dengan benar");
						}
					}else{
						$("#err_lay0").toggleClass("d-none d-block");
						$("#err_nik").html("Masukan NIK dengan benar");
					}
				});
			});
		</script>	</div>
<script type="text/javascript" src="{{ asset('js/app.js')}}"></script>
<script type="text/javascript" src="{{ asset('fontawesome/js/all.min.js')}}"></script>

</body>
</html>