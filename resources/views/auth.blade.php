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

	<div class="d-flex justify-content-center">

		<div class="card shadow-sm border-0 mt-5" style="width: 30%;">
				<div class="card-body">
						<h3 class="text-center mb-2">
							Catatan Perjalanan | Masuk
						</h3>
						<p class="text-center">
							<i>
								Masukan kridensial kamu
							</i>
						</p>
						<br>
						<div class="form-group">
							<form id="myForm">
								<input type='text' id='nik' placeholder="NIK" required class="form-control">
								<div class="bg-danger text-white text-center rounded p-1 mt-2" id="err_lay0" style="display: none;">
									<i id="err_nik">

									</i>
								</div>								
								<br>
								<input type='text' id='name' placeholder="name" required class="form-control">
								<div class="bg-danger text-white text-center rounded p-1 mt-2" id="err_lay1" style="display: none;">
									<i id="err_name">

									</i>
								</div>
								<br>

								<div class="row justify-content-center">
									<div class="col-sm">
										<button id="submit_btn_signup" style="width: 100%;" class="btn btn-solid text-white bg-info">
											Saya pengguna baru
										</button>
									</div>
									<div class="col-sm-5">
										<button style="width: 100%;" class="btn btn-solid bg-success text-white" id="submit_btn_login">
											Masuk
										</button>
									</div>
								</div>

								<p id="res" class="p-2 mt-2 d-none rounded bg-warning text-white">

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
										$("#res").toggleClass("d-none d-block");
										$("#res").toggleClass("bg-warning bg-success");
										$("#res").html(jso['msg']);
									}else{
										$("#res").toggleClass('d-none d-block');
										$("#res").toggleClass("bg-success bg-warning");
										$("#res").html(jso['msg']);
									}
								}
							});	

						}else{

						}
					}else{

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
										window.location.replace('/main/dashboard');
									}else{
										$("#res").toggleClass("d-none d-block");
										$("#res").html(jso['msg']);
									}
								}
							});
						}else{
							
						}
					}else{
						
					}
				});
			});
		</script>	</div>
<script type="text/javascript" src="{{ asset('js/app.js')}}"></script>
<script type="text/javascript" src="{{ asset('fontawesome/js/all.min.js')}}"></script>
</body>
</html>