<form action="" method="" class="card card-default mt-5">
	<div class="card-header">
		<h3 class="card-title">Descuento estacional</h3>
		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
		</div>			
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-sm-12 col-md-4">
				<div class="form-group">
					<label for="time_since">Desde</label>
					<input type="time" name="time_since" class="form-control" id="time_since">
				</div>				
			</div>
			<div class="col-sm-12 col-md-4">
				<div class="form-group">
					<label for="time_since">Hasta</label>
					<input type="time" name="time_since" class="form-control" id="time_since">
				</div>					
			</div>
			<div class="col-sm-12 col-md-4 d-flex align-items-center justify-content-center">
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
								<select name="descuentoEstacionalLunes" id="" class="select2">
									@for ($i = 0; $i <= 16; $i++)
									@php $item = $i * 5; @endphp
									<option value="{{$item}}">{{$item}}</option>
									@endfor
								</select>
							</td>
							<td>
								<select name="descuentoEstacionalMartes" id="" class="select2">
									@for ($i = 0; $i <= 16; $i++)
									@php $item = $i * 5; @endphp
									<option value="{{$item}}">{{$item}}</option>
									@endfor
								</select>
							</td>
							<td>
								<select name="descuentoEstacionalMiercoles" id="" class="select2">
									@for ($i = 0; $i <= 16; $i++)
									@php $item = $i * 5; @endphp
									<option value="{{$item}}">{{$item}}</option>
									@endfor
								</select>
							</td>
							<td>
								<select name="descuentoEstacionalJueves" id="" class="select2">
									@for ($i = 0; $i <= 16; $i++)
									@php $item = $i * 5; @endphp
									<option value="{{$item}}">{{$item}}</option>
									@endfor
								</select>
							</td>
							<td>
								<select name="descuentoEstacionalViernes" id="" class="select2">
									@for ($i = 0; $i <= 16; $i++)
									@php $item = $i * 5; @endphp
									<option value="{{$item}}">{{$item}}</option>
									@endfor
								</select>
							</td>
							<td>
								<select name="descuentoEstacionalSabado" id="" class="select2">
									@for ($i = 0; $i <= 16; $i++)
									@php $item = $i * 5; @endphp
									<option value="{{$item}}">{{$item}}</option>
									@endfor
								</select>
							</td>
							<td>
								<select name="descuentoEstacionalDomingo" id="" class="select2">
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