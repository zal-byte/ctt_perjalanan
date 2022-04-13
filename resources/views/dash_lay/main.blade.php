@extends('../dashboard')


@section('dashbody')

	<div class="card border-0 shadow-sm">
		<div class="card-body">
			<p class="text-center">
				<a href="{{route('logout')}}">
					Logout
				</a>
			</p>
		</div>
	</div>

@endsection