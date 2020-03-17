<form action="/admin/establecimientos/discount-for-quantity-of-people" method="post" class="card card-default mt-5">
	@csrf
	<input type="hidden" name="establishment_id" value="{{$establishment->id}}">
	<div class="card-header">
		<h3 class="card-title">Descuentos por cantidad de Personas</h3>
		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
		</div>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-sm-12 col-md-4">
				<div class="form-group">
					<label for="amount_of_people">Personas</label>
					<select name="amount_of_people" id="" class="select2">
						@for ($i = 1; $i <= 30; $i++)
						<option value="{{$i}}">{{$i}}</option>
						@endfor
					</select>
				</div>
			</div>
			<div class="col-sm-12 col-md-4">
				<div class="form-group">
					<label for="discount">Descuento</label>
					<input type="number" min="1" max="100" name="discount" class="form-control" id="" placeholder="">		
				</div>
			</div>
			<div class="col-sm-12 col-md-4 d-flex justify-content-center align-items-center">
				<button class="btn btn-sm btn-primary">Guardar descuento por <br> personas</button>
			</div>
		</div>
	</div>
	<div class="card-footer">
		
	</div>
</form>
<div class="card-card-default">
	<div class="card-header"><span>Descuento que maneja el establecimiento</span></div>
	<div class="card-body table-responsive row">
		<table class="table table-hover col-12">
			<thead>
				<tr>
					<th>Cantidad personas</th>
					<th>Descuento %</th>
					<th>Descuento en Barra</th>
					<th>acción</th>
				</tr>
			</thead>
			<tbody>
				@forelse ($establishmentDiscountForNumberOfPeoples as $establishmentDiscountForNumberOfPeople)
				<tr>
					<td>
						{{$establishmentDiscountForNumberOfPeople->amount_of_people}}		
					</td>
					<td>
						{{$establishmentDiscountForNumberOfPeople->discount}}%				
					</td>
					<td>
						<div class="progress progress-xs">
							<div class="progress-bar progress-bar-danger" style="width:{{$establishmentDiscountForNumberOfPeople->discount}}%"></div>
						</div>
					</td>
					<td>
						<form action="/admin/establecimientos/delete-discount-for-quantity-of-people/{{$establishmentDiscountForNumberOfPeople->id}}" method="post">
							@csrf
							@method('delete')
							<button type="submit" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></button>
						</form>				
					</td>
				</tr>
				@empty
				<tr>
					<td colspan="3">No se tienen registros</td>
				</tr>
				@endforelse
			</tbody>
		</table>
	</div>
	<div class="card-footer"></div>
</div>