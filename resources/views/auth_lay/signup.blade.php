@extends('../auth')

@section('authbody')

	<div class="card shadow-sm border-0" style="width: 30%;">
		<div class="card-body">
			<div class="form-group">
				<input type='text' id='username' placeholder="Username" required class="form-control">
				<br>
				<input type='password' id='password' placeholder="Password" required class="form-control">
				<br>
				<div class="justify-content-center align-items-center">
					<button class="btn btn-solid text-white bg-success">
						Login
					</button>
				</div>
			</div>			
		</div>
	</div>

@endsection