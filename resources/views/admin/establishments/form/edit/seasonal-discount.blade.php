<form action="/admin/establecimientos/save-seasonal-discount/update" method="post" class="card card-default mt-5">
	@csrf
	@method('PUT')
	<input type="hidden" name="establishment_id" value="{{$establishment->id}}">
	<div class="card-header">
		<h3 class="card-title">Descuento estacional</h3>
		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
		</div>			
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-sm-12 col-md-2">
				<div class="form-group">
					<label for="time_since">Desde</label>
					<input type="time" name="time_since" class="form-control timepicker" id="time_since">
				</div>				
			</div>
			<div class="col-sm-12 col-md-2">
				<div class="form-group">
					<label for="time_since">Hasta</label>
					<input type="time" name="time_until" class="form-control timepicker" id="" value="">
				</div>					
			</div>
			<div class="col-sm-12 col-md-8 d-flex align-items-center justify-content-center">
				<h5>El decuento estacional <strong>aplicará</strong> <br> en el horario escogido</h5>
			</div>
			<div class="col-12 table-responsive p-0">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Lunes</th>
							<th>Martes</th>
							<th>Miércoles</th>
							<th>Jueves</th>
							<th>Viernes</th>
							<th>Sábado</th>
							<th>Domingo</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								<select name="monday" id="" class="select2">
									@for ($i = 0; $i <= 16; $i++)
									@php $item = $i * 5; @endphp
									<option value="{{$item}}">{{$item}}</option>
									@endfor
								</select>
							</td>
							<td>
								<select name="tuesday" id="" class="select2">
									@for ($i = 0; $i <= 16; $i++)
									@php $item = $i * 5; @endphp
									<option value="{{$item}}">{{$item}}</option>
									@endfor
								</select>
							</td>
							<td>
								<select name="wednesday" id="" class="select2">
									@for ($i = 0; $i <= 16; $i++)
									@php $item = $i * 5; @endphp
									<option value="{{$item}}">{{$item}}</option>
									@endfor
								</select>
							</td>
							<td>
								<select name="thursday" id="" class="select2">
									@for ($i = 0; $i <= 16; $i++)
									@php $item = $i * 5; @endphp
									<option value="{{$item}}">{{$item}}</option>
									@endfor
								</select>
							</td>
							<td>
								<select name="friday" id="" class="select2">
									@for ($i = 0; $i <= 16; $i++)
									@php $item = $i * 5; @endphp
									<option value="{{$item}}">{{$item}}</option>
									@endfor
								</select>
							</td>
							<td>
								<select name="saturday" id="" class="select2">
									@for ($i = 0; $i <= 16; $i++)
									@php $item = $i * 5; @endphp
									<option value="{{$item}}">{{$item}}</option>
									@endfor
								</select>
							</td>
							<td>
								<select name="sunday" id="" class="select2">
									@for ($i = 0; $i <= 16; $i++)
									@php $item = $i * 5; @endphp
									<option value="{{$item}}">{{$item}}</option>
									@endfor
								</select>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="col-12">
			<button type="submit" class="btn btn-sm btn-primary">Guardar descuento estacional</button>
		</div>
	</div>
	<div class="card-footer">
		<a href="https://loyalfeel.com/">Loyalfeel</a> 
	</div>
</form>
<div class="card card-default">
	<div class="card-header">Horarios con descuentos estacionales</div>
	<div class="card-body row">
		<div class="col-12 table-responsive p-0">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Desde</th>
						<th>Hasta</th>
						<th>Lunes</th>
						<th>Martes</th>
						<th>Miércoles</th>
						<th>Jueves</th>
						<th>Viernes</th>
						<th>Sábado</th>
						<th>Domingo</th>
						<th>Acción</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($seasonalDiscounts as $seasonalDiscount)
						<tr>
							<td>{{$seasonalDiscount->time_since}}</td>
							<td>{{$seasonalDiscount->time_until}}</td>
							<td>{{$seasonalDiscount->monday}}</td>
							<td>{{$seasonalDiscount->tuesday}}</td>
							<td>{{$seasonalDiscount->wednesday}}</td>
							<td>{{$seasonalDiscount->thursday}}</td>
							<td>{{$seasonalDiscount->friday}}</td>
							<td>{{$seasonalDiscount->saturday}}</td>
							<td>{{$seasonalDiscount->sunday}}</td>
							<td>
								<form action="/admin/establecimientos/delete-seasonal-discount/{{$seasonalDiscount->id}}" method="post">
									@csrf
									@method('DELETE')
									<button class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></button>
								</form>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	<div class="card-footer">
		<a href="https://experienciasbod.com/">ExperienciasBOD</a>
	</div>
</div>