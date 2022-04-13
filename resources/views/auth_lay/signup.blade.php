@extends('../auth')



@section('authbody')

	<div class="card shadow-sm border-0 mt-5" style="width: 30%;">
		<div class="card-body">
			<div class="form-group">
				<h3 class="text-center mb-2">
					Catatan Perjalanan | Daftar
				</h3>
				<form id="s_form">
					<input type='text' id='username' placeholder="Nama pengguna" required class="form-control">
					<i id="err_usr" class="d-hidden"></i>
					<br>
					<input type='text' id="name" placeholder="Nama lengkap" required class="form-control">
					<i id="err_name" class="d-hidden"></i>
					<br>
					<input type='password' id='password' placeholder="Kata sandi" required class="form-control">
					<i id="err_password" class="d-hidden"></i>
					<br>
					<input type="password" id="verify_password" placeholder="Verifikasi kata sandi" required class="form-control">
					<i id="err_verify_password" class="d-hidden"></i>
					<br>
					<div class="justify-content-center align-items-center">
						<button id='s_submit' class="btn btn-solid text-white bg-success" style="width:100%;">
							Daftar
						</button>

						<p class="mt-2 text-center">
							Sudah memiliki akun ?, <a href="{{route('login')}}" style="text-decoration:none;">
								Masuk</a>.
						</p>

					</div>
				</form>
			</div>			
		</div>
	</div>
	<div id="s_modal" class="modal fade" role="dialog" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<div class="justify-content-center">
						<span class="fa-solid fa-circle-check fa-2xl" id='ic-res'></span>
					</div>
					<button type="button" class="fa-solid fa-xmark" onclick="$('#s_modal').modal('hide');"></button>
				</div>
				<div class="modal-body">
					<p id="msg">

					</p>
				</div>
				<div class="modal-footer">
					<a href="{{route('login')}}" id='log-i' style="text-decoration:none;" class="btn btn-solid btn-success text-white">
						Login
					</a>
					<a onclick="$('#s_modal').modal('hide');" style="text-decoration:none;" class="btn btn-solid btn-warning text-white">
						Close
					</a>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function(){
			$("#s_submit").on('click', function(e){
				e.preventDefault();

				var username = $("#username").val();
				var name = $("#name").val();
				var password = $("#password").val();
				var verify_password = $("#verify_password").val();


				if( username.length > 0 ){
					if( name.length > 0 ){
						if( password.length > 5 ){
							if( password == verify_password ){



								var data = "username=" + username + "&name=" + name + "&password=" + password;

								$.ajaxSetup({
									headers:{
										'X-CSRF-TOKEN': $("meta[name=csrf-token]").attr('content')
									}
								});

								$.ajax({
									type:'POST',
									url:'{{route("signup_post")}}',
									data:data,
									success:function(res){
										// alert(res);
										var js = JSON.parse(res);
										if(js['status']==1){
											$("#log-i").css({"display":"block"});
											$("#username").val("");
											$("#password").val("");
											$("#verify_password").val("");
											$("#name").val("");
											$("#s_modal").modal('show');
											$("#msg").html(js['msg']);
										}else{
											$("#log-i").css({"display":"none"});
											$("#s_modal").modal('show');
											$("#msg").html(js['msg']);
											$("#ic-res").toggleClass('fa-xmark fa-circle-exclamation');

										}
									}
								});



							}else{
								$("#err_verify_password").addClass("text-center d-block bg-danger p-1 rounded text-white mt-1");	
								$("#err_verify_password").html("password doesn't match");			
							}
						}else{						
							$("#err_password").addClass("text-center d-block bg-danger p-1 rounded text-white mt-1");
							$("#err_password").html("password minimum 6 characters");
						}
					}else{
						$("#err_name").addClass("text-center d-block bg-danger p-1 rounded text-white mt-1");
						$("#err_name").html("What is your name ?");
					}
				}else{
					$("#err_usr").addClass("text-center d-block bg-danger p-1 rounded text-white mt-1");
					$("#err_usr").html("Don't leave it blank");
				}
			});
		});
	</script>

@endsection