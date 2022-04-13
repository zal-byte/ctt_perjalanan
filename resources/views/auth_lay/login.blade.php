@extends('../auth')

@section('authbody')
		<div class="card shadow-sm border-0 mt-5" style="width: 30%;">
				<div class="card-body">
						<h3 class="text-center" style="font-weight: bold;">
							Catatan Perjalanan
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
								<br>
								<input type='password' id='password' placeholder="Password" required class="form-control">
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
									var rep = JSON.parse(res);

									if( rep['status'] == true){
										window.location.replace('{{route("main_dashboard")}}');
									}else{
										alert(rep['status']);
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
