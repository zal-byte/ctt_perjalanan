@extends('../dashboard')

@section('dashbody')
				<h3 class="text-center mt-3">
					Update data ( {{ $identifier }} )
				</h3>
				<form method="POST" action="{{ route('update_activity') }}" enctype="multipart/form-data">
					@csrf
					<input value="{{ $nik }}" hidden name="nik">
					<input value="{{ $identifier }}" hidden name="identifier">
					@php
					 $previous_activity = $date . "|". $time . "|" . $location . "|" . $temperature . "|" . $information . "|" . $identifier .  "{{%}}";
					@endphp
					<input value="@php echo $previous_activity; @endphp" hidden name="previous_activity">
					<div class="form-group">
						<div class="row mb-3">
							<label for="date" class="col-sm-2 col-form-label">
								Tanggal
							</label>
							<div class="col-sm-3">
								<input type="date" class="form-control" value="{{$date}}" name="date" placeholder="col-form-label">
							</div>
						</div>
						<div class="row mb-3">
							<label for="time" class="col-sm-2 col-form-label">
								Jam
							</label>
							<div class="col-sm-3">
								<input type="time" value="{{$time}}" class="form-control" name="time" placeholder="col-form-label">
							</div>
						</div>
						<div class="row mb-3">
							<label for="location" class="col-sm-2 col-form-label">
								Lokasi
							</label>
							<div class="col-sm">
								<input type="text" value="{{$location}}" class="form-control" name="location">
							</div>
						</div>
						<div class="row mb-3">
							<label for="temperature" class="col-sm-2 col-form-label">
								Suhu Tubuh
							</label>
							<div class="col-sm-3">
								<div class="input-group">
									<input type="number" value="{{$temperature}}" step="any" class="form-control" name="temperature">
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
								<textarea class="form-control" rows="5" name="information">{{$information}}</textarea>
							</div>
						</div>
						<div class="row mb-3">
							<div class="col-sm">
								<button type="submit" class="btn btn-primary text-white">
									Update
								</button>
							</div>
						</div>
					</div>

				</form>

@endsection