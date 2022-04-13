@extends('../auth')

@section('authbody')
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
								<input type='text' id='username' placeholder="Username" required class="form-control">
								<div class="bg-danger text-white text-center rounded p-1 mt-2" id="err_lay0" style="display: none;">
									<i id="err_user">

									</i>
								</div>								
								<br>
								<input type='password' id='password' placeholder="Password" required class="form-control">
								<div class="bg-danger text-white text-center rounded p-1 mt-2" id="err_lay1" style="display: none;">
									<i id="err_pass">

									</i>
								</div>
								<br>
								<button id="submit_btn" class="btn btn-solid text-white bg-success" style="margin-right: 10px; width: 100%;">
										Login
								</button>
								<p class="text-center mt-2">
									Doesn't have any account ?, <a href="{{ route('signup')}}" style="text-decoration: none; color:blue;"> Signup</a>.
								</p>
							</form>
						</div>
				</div>
		</div>
		<script type="text/javascript">

			$(document).ready(function(){
				$("#submit_btn").on('click', function(e){
					e.preventDefault();


					var username = $("#username").val();
					var password = $("#password").val();
					var token = $("meta[name=csrf-token]").attr('content');
				
					var data = "username=" + username + "&password=" + password;

					if( username.length > 0 ){
						if( password.length > 0 ){

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
									
									var res = JSON.parse(res);
									if( res['status'] == 1){
										window.location.replace('/main/dashboard');
									}else{
										if( res['msg'] == 'invalid password'){
											$("#password").addClass("is-invalid");
											$("#err_lay1").addClass("d-block");
											$("#err_pass").html('Invalid password');
										}else if( res['msg'] == 'user not found'){
											$("#username").addClass("is-invalid");
											$("#err_lay0").addClass("d-block");
											$("#err_user").html("User not found");
										}
									}

								}
							});
						}else{
							
						}
					}else{
						
					}
				});
			});

		</script>
@endsection
