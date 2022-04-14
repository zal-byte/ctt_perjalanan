@extends('../dashboard')


@section('dashbody')

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