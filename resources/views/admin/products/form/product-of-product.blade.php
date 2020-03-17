<!-- /.row -->
<div class="row">
	<div class="col-sm-12 col-md-6">
		<div class="form-group">
			<label for="brands_id">Productos Hijos <span style="color: red;">*</span></label>
			<div class="row">
				<div class="col-sm-12 col-md-8">
					<select name="brand_id" class="form-control select2" style="width: 100%;">
						<option value="">Seleccione un producto ...</option>
						@foreach($products as $product)
						<option value="{{ $product->id }}">{{ $product->nombre }}</option>
						@endforeach
					</select>
				</div>
				<div class="col-sm-12 col-md-4">
					<a class="btn btn-sm btn-primary" href="#tab_2" data-toggle="tab">Agregar</a>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-12 col-md-12">
		<div class="table-responsive">
	  	<table class="table" id="table-brands">
	   		<thead>
	   			<tr>
						<th>ID</th>
			   		<th>Nombre</th>
			   		<th>Acción</th>
	   			</tr>
	   		</thead>
	 		</table>
		</div>
	</div>
</div>

<div class="col-12 mt-5" style="text-align: right;">
	<a class="btn btn-sm btn-primary" href="#">Guardar Producto</a>
</div>