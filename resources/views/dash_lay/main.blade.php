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
						<tr>
							<td>
								1
							</td>
							<td>
								02-02-2022
							</td>
							<td>
								Bandung
							</td>
							<td>
								20<span>&#8451;</span>
							</td>
							<td>
								ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							</td>
						</tr>
						<tr>
							<td>
								2
							</td>
							<td>
								02-02-2022
							</td>
							<td>
								Jakarta
							</td>
							<td>
								20<span>&#8451;</span>
							</td>
							<td>
								ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							</td>
						</tr>
						<tr>
							<td>
								3
							</td>
							<td>
								06-02-2022
							</td>
							<td>
								Surabaya
							</td>
							<td>
								20<span>&#8451;</span>
							</td>
							<td>
								ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>

@endsection