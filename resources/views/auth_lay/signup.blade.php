@extends('../auth')

@section('authbody')

	<div class="card shadow-sm border-0 mt-5" style="width: 30%;">
		<div class="card-body">
			<div class="form-group">
				<form id="s_form">
					<input type='text' id='username' placeholder="Username" required class="form-control">
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
							Already have an account ?, <a href="{{route('signup')}}" style="text-decoration:none;">
								Login
							</a>.
						</p>

					</div>
				</form>
			</div>			
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#s_submit").on('click', function(){
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
										'X-CSRF-TOKEN': $("meta[name=csrf-token]").attr('content');
									}
								});

								$.ajax({
									type:'POST',
									url:'{{route("signup_post")}}',
									success:function(res){
										
									}
								});



							}else{
								//password doesn't match
							}
						}else{

						}
					}else{

					}
				}else{

				}
			});
		});
	</script>

@endsection