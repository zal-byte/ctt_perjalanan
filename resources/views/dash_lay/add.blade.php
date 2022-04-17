@php
	
	use Illuminate\Support\Facades\Session;

	Session::put('interact', route('main_add'));



@endphp

@extends('../dashboard')

@section('dashbody')

	<div class="card border-0 shadow-sm mt-2">
		<div class="card-body">
			<h3 class="text-center">
				Tambah data
			</h3>

			<form id="myForm">
				<div class="form-group">
					<div class="row mb-3">
						<label for="date" class="col-sm-2 col-form-label">
							Tanggal
						</label>
						<div class="col-sm-3">
							<input type="date" class="form-control" id="date" placeholder="col-form-label">
						</div>
					</div>
					<div class="row mb-3">
						<label for="time" class="col-sm-2 col-form-label">
							Jam
						</label>
						<div class="col-sm-3">
							<input type="time" class="form-control" id="time" placeholder="col-form-label">
						</div>
					</div>
					<div class="row mb-3">
						<label for="location" class="col-sm-2 col-form-label">
							Lokasi
						</label>
						<div class="col-sm">
							<input type="text" class="form-control" id="location">
						</div>
					</div>
					<div class="row mb-3">
						<label for="temperature" class="col-sm-2 col-form-label">
							Suhu Tubuh
						</label>
						<div class="col-sm-3">
							<div class="input-group">
								<input type="number" class="form-control" id="temperature">
								<div class="input-group-text">
									<span>&#8451;</span>
								</div>
							</div>
						</div>
					</div>
					<div class="row mb-3">
						<label for="information" class="col-sm-2 col-form-label">
							Keterangan
						</label>
						<div class="col-sm">
							<textarea class="form-control" rows="5" id="information"></textarea>
						</div>
					</div>
				</div>
				<a id="submit_btn_add" class="btn btn-success text-white" style="float: right;"> Simpan 
				</a>
			</form>
		</div>
	</div>

	<div class="modal fade" id="add-modal" role='dialog' tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title" id="add-title">

					</h3>
				</div>
				<div class="modal-body">
					<p id="msg">

					</p>
				</div>
				<div class="modal-footer">
					<button class="btn btn-solid btn-warning text-white" onclick="$('#add-modal').modal('hide');"> Tutup </button>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">

		$(document).ready(function(){
			$("#myForm").on('submit', function(e){
				e.preventDefault();
			});
			$("#submit_btn_add").on('click', function(e){
				e.preventDefault();

				var date = $("#date").val();
				var location = $("#location").val();
				var time = $("#time").val();
				var temperature = $("#temperature").val();
				var information = $("#information").val();


				var data = "date=" + date + "&location=" + location + "&time=" + time + "&temperature=" + temperature + "&information=" + information;

				$.ajaxSetup({
					headers:{
						'X-CSRF-TOKEN': $("meta[name=csrf-token]").attr('content')
					}
				});

				$.ajax({
					type:'POST',
					url:"{{route('add_activity')}}",
					data:data,
					success:function( res ){
						var jso = JSON.parse( res );
						if( jso['status'] == 1){

							

							$("#add-title").html("Berhasil :)");
							$("#add-modal").modal('show');
							$("#msg").html(jso['msg']);

							$("#date").val("");
							$("#time").val("");
							$("#location").val("");
							$("#temperature").val("");
							$("#information").val("");

						}else{
							$("#add-title").html("Error :(");
							$("#add-modal").modal('show');
							$("#msg").html(jso['msg']);
						}
					}
				});

			});
		});
	</script>

@endsection