<form action="" method="" class="card card-default mt-5">
	@csrf
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
							<input type="number" name="cMaxTenedoresLunes" class="form-control" id="" placeholder="" min="1" max="100">
						</div>						
					</td>
					<td>
						<div class="form-group">
							<input type="number" name="cMaxTenedoresMartes" class="form-control" id="" placeholder="" min="1" max="100">
						</div>						
					</td>
					<td>
						<div class="form-group">
							<input type="number" name="cMaxTenedoresMiercoles" class="form-control" id="" placeholder="" min="1" max="100">
						</div>						
					</td>
					<td>
						<div class="form-group">
							<input type="number" name="cMaxTenedoresJueves" class="form-control" id="" placeholder="" min="1" max="100">
						</div>						
					</td>
					<td>
						<div class="form-group">
							<input type="number" name="cMaxTenedoresViernes" class="form-control" id="" placeholder="" min="1" max="100">
						</div>						
					</td>
					<td>
						<div class="form-group">
							<input type="number" name="cMaxTenedoresSabado" class="form-control" id="" placeholder="" min="1" max="100">
						</div>						
					</td>
					<td>
						<div class="form-group">
							<input type="number" name="cMaxTenedoresDomingo" class="form-control" id="" placeholder="" min="1" max="100">
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