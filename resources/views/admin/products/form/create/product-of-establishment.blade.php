<!-- /.row -->
<div class="row">
	<div class="col-sm-12 col-md-6">
		<div class="form-group">
			<label for="brands_id">Establecimiento <span style="color: red;">*</span></label>
			<div class="row">
				<div class="col-sm-12 col-md-8">
					<select id="establecimiento" class="form-control select2" style="width: 100%;">
						<option value="">Seleccione un establecimiento ...</option>
						@foreach($establishments as $establishment)
						<option value="{{ $establishment->id }}">{{ $establishment->name }}</option>
						@endforeach
					</select>
				</div>
				<div class="col-sm-12 col-md-4">
					<button type="button" class="btn btn-sm btn-primary" onclick="addEstablecimiento()">Agregar</button>
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
	   		<tbody id="listEstablecimiento">
	   		</tbody>
	 		</table>
		</div>
	</div>
</div>

<script type="text/javascript">
function addEstablecimiento() {
	var id = $('#establecimiento').val();
	var name = $('#establecimiento option:selected').text();

	$('#listEstablecimiento').append('<tr id="establecimiento_'+id+'"><td>'+id+'<input type="hidden" name="establecimiento[]" value="'+id+'"></td><td>'+name+'</td><td><button type="button" class="btn btn-sm btn-danger delete" onclick="eliminarEstablecimiento('+id+')"><i class="far fa-trash-alt"></i></button></td></tr>');
}

function eliminarEstablecimiento(nume) {
	$('#establecimiento_' + nume).remove();
}
</script>