<form action="/admin/establecimientos/maximum-number-of-forks/update" method="post" class="card card-default mt-5">
	@csrf
	<input type="hidden" name="establishment_id" value="{{$establishment->id}}">
	<div class="card-header">
		<h3 class="card-title">Cantidad maxima de tenedores</h3>
		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
		</div>			
	</div>
	<div class="card-body table-responsive row">
		<table class="table table-hover col-12">
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
						<div class="form-group">
							<input type="number" name="monday" class="form-control" value="{{$establishmentForks->monday}}" min="0" max="100" required="">
						</div>						
					</td>
					<td>
						<div class="form-group">
							<input type="number" name="tuesday" class="form-control" value="{{$establishmentForks->tuesday}}" min="0" max="100" required="">
						</div>						
					</td>
					<td>
						<div class="form-group">
							<input type="number" name="wednesday" class="form-control" value="{{$establishmentForks->wednesday}}"  min="0" max="100" required="">
						</div>						
					</td>
					<td>
						<div class="form-group">
							<input type="number" name="thursday" class="form-control" value="{{$establishmentForks->thursday}}" min="0" max="100" required="">
						</div>						
					</td>
					<td>
						<div class="form-group">
							<input type="number" name="friday" class="form-control" value="{{$establishmentForks->friday}}" min="0" max="100" required="">
						</div>						
					</td>
					<td>
						<div class="form-group">
							<input type="number" name="saturday" class="form-control" value="{{$establishmentForks->saturday}}" min="0" max="100" required="">
						</div>						
					</td>
					<td>
						<div class="form-group">
							<input type="number" name="sunday" class="form-control" value="{{$establishmentForks->sunday}}" min="0" max="100" required="">
						</div>						
					</td>
				</tr>
			</tbody>
		</table>
		<div class="col-12">
			<button type="submit" class="btn btn-sm btn-primary">Guardar cantidad max de tenedores</button>
		</div>
	</div>
	<div class="card-footer">
		<a href="https://loyalfeel.com/">Loyalfeel</a>
	</div>
</form>