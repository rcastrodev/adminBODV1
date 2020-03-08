<form action="" method="" class="card card-default mt-5">
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
					<label for="">Personas</label>
					<select name="" id="" class="select2">
						@for ($i = 0; $i <= 30; $i++)
							<option value="{{$i}}">{{$i}}</option>
						@endfor
					</select>
				</div>
			</div>
			<div class="col-sm-12 col-md-4">
				<div class="form-group">
					<label for="">Descuento</label>
					<input type="time" name="" class="form-control" id="" placeholder="">		
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