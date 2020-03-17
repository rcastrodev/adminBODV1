<!-- /.row -->
<div class="row">
	<div class="col-sm-12 col-md-6">
		<div class="form-group">
			<label for="brands_id">Condición <span style="color: red;">*</span></label>
			<div class="row">
				<div class="col-sm-12 col-md-8">
					<select id="condition" class="form-control select2" style="width: 100%;">
						<option value="">Seleccione una condición ...</option>
						@foreach($conditions as $condition)
						<option value="{{ $condition->id }}">{{ $condition->nombre }}</option>
						@endforeach
					</select>
				</div>
				<div class="col-sm-12 col-md-4">
					<button type="button" class="btn btn-sm btn-primary" onclick="addCondition()">Agregar</button>
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
	   		<tbody id="listConditions">

	   		</tbody>
	 		</table>
		</div>
	</div>
</div>

<script type="text/javascript">
function addCondition() {
	var id = $('#condition').val();
	var name = $('#condition option:selected').text();

	console.log(id+' '+name);
	$('#listConditions').append('<tr><td>'+id+'<input type="hidden" name="conditions[]" value="'+id+'"></td><td>'+name+'</td><td>delete</td></tr>');
}
</script>