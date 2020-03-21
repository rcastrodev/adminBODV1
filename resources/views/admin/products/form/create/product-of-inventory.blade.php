<div class="row">
	<div class="col-sm-12 col-md-6">
		<div class="form-group">
			<label for="brands_id">Tipo de Carga <span style="color: red;">*</span></label>
			<select name="" class="form-control select2" style="width: 100%;" onchange="tipo()" id="tipoInventory">
				<option value="">Seleccione una condición ...</option>
				<option value="1">Manual</option>
				<option value="2">Automatico</option>
			</select>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-12 col-md-6" id="contentAddInventory">
	</div>
</div>

<div class="row">
	<div class="col-sm-12 col-md-12" id="contentInventory">
	</div>
</div>

<script type="text/javascript">
function tipo() {
	var tipo = $('#tipoInventory').val();
	if (tipo == 1) {
		$('#contentAddInventory').html('');
		$('#contentInventory').html('');
		$('#contentAddInventory').append('<div class="form-group"><div class="input-group"><div class="custom-file" id="listInput"><input type="file" class="custom-file-input" name="inventory" id="" onchange=""><label class="custom-file-label" for=""></label></div><div class="input-group-append"><span class="input-group-text" id="">Agregar Excel</span></div></div></div>');
	} else {
		$('#contentAddInventory').html('');
		$('#contentAddInventory').append('<div class="row"><div class="col-sm-12 col-md-4" style="padding-right: 0px;"><input type="number" id="cantInventory" value="" style="width: 100%;"></div><div class="col-sm-12 col-md-2" style="padding-left: 0px;"><button type="button" class="btn btn-sm btn-primary" onclick="addInventory()" id="buttonAddInventory">Agregar</button></div></div>');

		$('#contentInventory').html('');
		$('#contentInventory').append('<div class="table-responsive"><table class="table" id="table-brands"><thead><tr><th>Localizador</th><th>Acción</th></tr></thead><tbody id="listInventory"></tbody></table></div>');
	}
}

function addInventory() {
	cantInventory = $('#cantInventory').val();

	var now;
	for (var i = 1; i <= cantInventory; i++) {
		var date = new Date();
		var timestamp = date.getTime();
		$('#listInventory').append('<tr id="inventory_'+i+'"><td>PROD-'+timestamp+'-'+zfill(i, 4)+'<input type="hidden" name="inventario[]" value="PROD-'+timestamp+'-'+zfill(i, 4)+'"></td><td><button type="button" class="btn btn-sm btn-danger delete" onclick="eliminarInventory('+i+')"><i class="far fa-trash-alt"></i></button></td></tr>');
	}
	$('#buttonAddInventory').prop('disabled', true);
	
}

function zfill(number, width) {
    var numberOutput = Math.abs(number); /* Valor absoluto del número */
    var length = number.toString().length; /* Largo del número */ 
    var zero = "0"; /* String de cero */  
    
    if (width <= length) {
        if (number < 0) {
             return ("-" + numberOutput.toString()); 
        } else {
             return numberOutput.toString(); 
        }
    } else {
        if (number < 0) {
            return ("-" + (zero.repeat(width - length)) + numberOutput.toString()); 
        } else {
            return ((zero.repeat(width - length)) + numberOutput.toString()); 
        }
    }
}

function eliminarInventory(numi) {
	$('#inventory_' + numi).remove();
}
</script>