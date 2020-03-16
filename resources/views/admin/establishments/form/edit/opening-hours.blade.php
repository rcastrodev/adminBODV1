<form action="/admin/establecimientos/opening-hours/update" method="post" class="card card-default mt-5">
	@csrf
	<input type="hidden" name="establishment_id" value="{{ $establishment->id }}">
	<div class="card-header">
		<h3 class="card-title">Horario de apertura</h3>
		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
		</div>			
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-sm-12 col-md-2">
				<div class="form-group">
					<label for="">Apertura</label>
					<input type="time" name="time_since" class="form-control" id="" placeholder="">
				</div>				
			</div>
			<div class="col-sm-12 col-md-2">
				<div class="form-group">
					<label for="">Cierre</label>
					<input type="time" name="time_until" class="form-control" id="" placeholder="">
				</div>				
			</div>
			<div class="col-sm-12 col-md-2">
				<div class="form-group">
					<label for="day">Días</label>
					<select name="day" id="" class="select2">
						<option value="lunes">Lunes</option>
						<option value="martes">Marter</option>
						<option value="miercoles">Miércoles</option>
						<option value="jueves">Jueves</option>
						<option value="viernes">Viernes</option>
						<option value="sabado">Sábado</option>
						<option value="domingo">Domingo</option>
					</select>
				</div>	
			</div>
			<div class="col-sm-12 col-md-6 d-flex justify-content-center align-items-center">
				<button type="submit" class="btn btn-sm btn-primary">Guardar horario de <br> establecimiento</button>
			</div>
		</div>
	</div>
	<div class="card-footer">
		
	</div>
</form>
<div class="card card-default">
	<div class="card-header">
		<span>Horarios</span>
	</div>
	<div class="card-body table-responsive p-0">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Día</th>
					<th>Hora Inicio</th>
					<th>Hora Cierre</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				@forelse($establishmentOpeningHours as $establishmentOpeningHour)
					<tr>
						<td>{{ $establishmentOpeningHour->day }}</td>
						<td>{{ $establishmentOpeningHour->time_since }}</td>
						<td>{{ $establishmentOpeningHour->time_until }}</td>
						<td>
							<form action="/admin/establecimientos/opening-hours/delete/{{$establishmentOpeningHour->id}}" method="post">
								@csrf
								@method('delete')
								<button type="submit" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></button>
							</form>
						</td>
					</tr>
				@empty
					<tr>
						<td colspan="´5">No tiene horario registrado</td>
					</tr>
				@endforelse
			</tbody>
		</table>
	</div>
	<div class="card-footer"></div>
</div>