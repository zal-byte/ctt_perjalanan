@extends('../auth')



@section('authbody')

	<div class="card shadow-sm border-0 mt-5" style="width: 30%;">
		<div class="card-body">
			<div class="form-group">
				<h3 class="text-center mb-2">
					Catatan Perjalanan | Daftar
				</h3>
				<form id="s_form">
					<input type='text' id='username' placeholder="Username" required class="form-control" aria-describedby="validateUsernameFeedback">
					<div id="validateUsernameFeedback" class="invalid-feedback">
						<p id="usr_msg">

						</p>
					</div>
					<br>
					<input type='text' id="name" placeholder="Full name" required class="form-control">
					<br>
					<input type='password' id='password' placeholder="Password" required class="form-control">
					<br>
					<input type="password" id="verify_password" placeholder="Verify password" required class="form-control">
					<br>
					<div class="justify-content-center align-items-center">
						<button id='s_submit' class="btn btn-solid text-white bg-success" style="width:100%;">
							Signup
						</button>

						<p class="mt-2 text-center">
							Already have an account ?, <a href="{{route('login')}}" style="text-decoration:none;">
								Login
							</a>.
						</p>

					</div>
				</form>
			</div>			
		</div>
	</div>
	<div id="s_modal_success" class="modal fade" role="dialog" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<div class="justify-content-center d-flex">
						<span class="fa-solid fa-circle-check fa-2xl"></span>
					</div>
					<button type="button" class="fa-solid fa-xmark" onclick="$('#s_modal_success').modal('hide');"></button>
				</div>
				<div class="modal-body">
					<p id="msg">

					</p>
				</div>
				<div class="modal-footer">
					<a href="{{route('login')}}" style="text-decoration:none;" class="btn btn-solid btn-success text-white">
						Login
					</a>
					<a onclick="$('#s_modal_success').modal('hide');" style="text-decoration:none;" class="btn btn-solid btn-warning text-white">
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
										var js = JSON.parse(res);
										if(js['status']==true){
											$("#username").val("");
											$("#password").val("");
											$("#verify_password").val("");
											$("#name").val("");
											$("#s_modal_success").modal('show');
											$("#msg").html(js['msg']);
										}
									}
								});



							}else{
								//password doesn't match
								$("#verify_password").addClass("is-invalid");
							}
						}else{
							alert("Password length more than 5");	
						}
					}else{
						alert("Please fill naem field");
					}
				}else{
					$("#usr_msg").html("Don't leave it blank");
				}
			});
		});
	</script>

@endsection