<!-- /.row -->
<div class="row">
	<div class="col-sm-12 col-md-6">
		<div class="form-group">
			<label for="hijo">Productos Hijos <span style="color: red;">*</span></label>
			<div class="row">
				<div class="col-sm-12 col-md-8">
					<select id="hijo" class="form-control select2" style="width: 100%;">
						<option value="">Seleccione un producto ...</option>
						@foreach($products as $product)
						@if($product->producto_padre == Null)
						<option value="{{ $product->id }}">{{ $product->nombre }}</option>
						@endif
						@endforeach
					</select>
				</div>
				<div class="col-sm-12 col-md-4">
					<button type="button" class="btn btn-sm btn-primary" onclick="addProductoHijo()">Agregar</button>
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
	   		<tbody id="listhijos">
	   			@foreach($productohijo as $productoh)
	   			<tr id="itemHijo_{{ $productoh->id }}">
	   				<td>{{ $productoh->id }}<input type="hidden" name="hijos[]" value="{{ $productoh->id }}"></td>
	   				<td>{{ $productoh->nombre }}</td>
	   				<td>
	   					<button type="button" class="btn btn-sm btn-danger delete" onclick="eliminarHijo({{ $productoh->id }})"><i class="far fa-trash-alt"></i>
	   					</button>
	   				</td>
	   			</tr>
	   			@endforeach
	   		</tbody>
	 		</table>
		</div>
	</div>
</div>

<div class="col-12 mt-5" style="text-align: right;">
	<button class="btn btn-sm btn-primary" type="">Guardar Producto</button>
</div>

<script type="text/javascript">
function addProductoHijo() {
	var id = $('#hijo').val();
	var name = $('#hijo option:selected').text();

	$('#listhijos').append('<tr id="itemHijo_'+id+'"><td>'+id+'<input type="hidden" name="hijos[]" value="'+id+'"></td><td>'+name+'</td><td><button type="button" class="btn btn-sm btn-danger delete" onclick="eliminarHijo('+id+')"><i class="far fa-trash-alt"></i></button></td></tr>');
}

function eliminarHijo(numh) {
	$('#itemHijo_' + numh).remove();
}
</script>