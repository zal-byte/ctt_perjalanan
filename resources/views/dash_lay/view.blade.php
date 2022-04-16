
@php
	Session::put('interact', '/main/view' );

@endphp

@extends('../dashboard')


@section('dashbody')


	<style type="text/css">
		@media only screen and (max-width: 768px){

			#urut{
				margin-top: 10px;
			}
		}
	</style>
	<div class="card border-0 shadow-sm mb-2 mt-2">
		<div class="card-body">
			<div class="row">
				<div class="col-md-3">
					<p>
						Urut berdasarkan
					</p>
				</div>
				<div class="col-md-7">
					<select class="form-select">
						<option value="tanggal">Tanggal</option>
						<option value="nama_lokasi">Nama lokasi</option>
					</select>
				</div>
				<div class="col-md">
					<button id="urut" class="btn btn-solid btn-info text-white" style="width:100%;">
						Urutkan
					</button>
				</div>
			</div>
		</div>
	</div>

	<div class="card border-0 shadow-sm">
		<div class="card-body">
			<div style="overflow: auto; height: 500px;">
				<table class="table table-striped">
					<thead class="sticky-top">
						<tr class="bg-dark" style="color: white;">
							<td>
								No
							</td>
							<td>
								Tanggal
							</td>
							<td>
								Waktu
							</td>
							<td>
								Lokasi
							</td>
							<td>
								Suhu
							</td>
							<td style="width: 50%;">
								Keterangan
							</td>
						</tr>
					</thead>
					<tbody>
						<!-- No, tanggal, waktu, lokasi, suhu, keterangan -->
						@if( $activity != null )
							@for($i=0; $i < count($activity);$i++)
								<tr>
									<td>
										{{ $i + 1 }}
									</td>
									<td>
										{{ $activity[$i][0] }}
									</td>
									<td>
										{{ $activity[$i][1] }}
									</td>
									<td>
										{{ $activity[$i][2] }}
									</td>
									<td>
										{{ $activity[$i][3] }}
									</td>
									<td>
										{{ $activity[$i][4] }}
									</td>
								</tr>
							@endfor
						@else
							<p class="text-center">
								Belum ada catatan, <a href="{{route('main_add')}}" class="text-decoration-none">
									Tambah
								</a>
							</p>
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</div>

@endsection