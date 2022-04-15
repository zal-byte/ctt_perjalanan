@php
	Session::put('interact', route('main_welcome'));
@endphp

@extends('../dashboard')

@section('dashbody')

	<div class="card border-0 shadow-sm mt-2">
		<div class="card-body">
			<p class="text-center">
				Selamat datang di aplikasi CaPer
			</p>
		</div>
	</div>

@endsection