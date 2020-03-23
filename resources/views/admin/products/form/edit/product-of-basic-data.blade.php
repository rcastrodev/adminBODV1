<!-- /.row -->
<div class="row">
	<div class="col-sm-12 col-md-6">
		<div class="form-group">
			<label for="nombre">Nombre del Producto <span style="color: red;">*</span></label>
			<input type="text" name="nombre" class="form-control" value="{{ $producto->nombre }}" id="nombre" placeholder="">
		</div>
	</div>
	<div class="col-sm-12 col-md-6">
		<div class="form-group">
			<label for="category_destacada_id">Categoria Destacada <span style="color: red;">*</span></label>
			<select name="category_destacada_id" class="form-control select2" style="width: 100%;" id="category_destacada_id">
				<option value="">Seleccione Categoria Destacada ...</option>
				@foreach($types as $type)
					@if($type->category == 'categoriadestacadoproducto')
					@php
					if($type->id == $producto->category_destacada_id){
						$select = 'selected';
					} else {
						$select = '';
					}
					@endphp
					<option value="{{ $type->id }}" {{ $select }}>{{ $type->name }}</option>
					@endif
				@endforeach
			</select>
		</div>
	</div>
	<div class="col-sm-12 col-md-6">
		<div class="form-group">
			<label for="tipo_producto_id">Tipo de Producto <span style="color: red;">*</span></label>
			<select name="tipo_producto_id" class="form-control select2" style="width: 100%;" id="tipo_producto_id" onchange="tipoProducto()">
				<option value="">Seleccione un tipo ...</option>
				@foreach($types as $type)
					@if($type->category == NULL)
					@php
					if($type->id == $producto->tipo_producto_id){
						$select = 'selected';
					} else {
						$select = '';
					}
					@endphp
					<option value="{{ $type->id }}" {{ $select }}>{{ $type->name }}</option>
					@endif
				@endforeach
			</select>
		</div>
	</div>
	<div class="col-sm-12 col-md-6">
		<div class="form-group">
			<label for="category_id">Categoria de Producto <span style="color: red;">*</span></label>
			<select name="category_id" class="form-control select2" style="width: 100%;" id="category_id">
				<option value="">Seleccione una Categoria ...</option>
				@foreach($types as $type)
					@if($type->category != NULL)
					@php
					if($type->id == $producto->category_id){
						$select = 'selected';
					} else {
						$select = '';
					}
					@endphp
					<option value="{{ $type->id }}" {{ $select }}>{{ $type->name }}</option>
					@endif
				@endforeach
			</select>
		</div>
	</div>
</div>

<div class="row" id="tipoEventoContent">
</div>

<div class="row">
	<div class="col-sm-12 col-md-12">
		<div class="form-group">
			<label for="description">Descripción</label>
			<textarea name="description" id="description" cols="10" rows="10">
				{{ $producto->description }}
			</textarea>
		</div>
	</div>

	<div class="col-sm-12 col-md-12">
		<div class="form-group d-flex justify-content-between">
			<div class="custom-control custom-switch">
				<input type="checkbox" class="custom-control-input" name="estatus" id="estatus" checked="" value="1">
				<label class="custom-control-label" for="estatus">Estatus</label>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-12 col-md-12">
		<label for="" style="margin-top: 15px;margin-bottom: 20px;font-size: 18px;">Precios</label>
	</div>
</div>

<div class="row">
	<div class="col-sm-12 col-md-6">
		<div class="form-group">
			<label for="coin_afiliado_id">AFILIADO - Moneda</label>
			<select name="coin_afiliado_id" class="form-control select2-p" style="width: 100%;" id="coin_afiliado_id">
				@foreach($coins as $coin)
				@php
				if($coin->id == $producto->coin_afiliado_id){
					$select = 'selected';
				} else {
					$select = '';
				}
				@endphp
				<option value="{{ $coin->id }}" {{ $select }}>{{ $coin->name }}</option>
				@endforeach
			</select>
		</div>		
		<div class="form-group">
			<label for="afiliado_precio">Precio</label>
			<input type="text" name="afiliado_precio" class="form-control" value="{{ $producto->afiliado_precio }}" id="afiliado_precio" placeholder="">
		</div>
		<div class="form-group d-flex justify-content-between">
			<div class="custom-control custom-switch">
				@php
				if($producto->afiliado_gratis == 1){
					$check = 'checked';
				} else {
					$check = '';
				}
				@endphp
				<input type="checkbox" class="custom-control-input" name="afiliado_gratis" id="afiliado_gratis" value="1" {{ $check }}>
				<label class="custom-control-label" for="afiliado_gratis">Gratis ?</label>
			</div>
			<div class="custom-control custom-switch">
				@php
				if($producto->afiliado_na == 1){
					$check = 'checked';
				} else {
					$check = '';
				}
				@endphp
				<input type="checkbox" class="custom-control-input" name="afiliado_na" id="afiliado_na" value="1" {{ $check }}>
				<label class="custom-control-label" for="afiliado_na">No Aplica ?</label>
			</div>
		</div>
	</div>
	<div class="col-sm-12 col-md-6">
		<div class="form-group">
			<label for="coin_publico_id">Publico General - Moneda</label>
			<select name="coin_publico_id" class="form-control select2-p" style="width: 100%;" id="coin_publico_id">
				@foreach($coins as $coin)
				@php
				if($coin->id == $producto->coin_publico_id){
					$select = 'selected';
				} else {
					$select = '';
				}
				@endphp
				<option value="{{ $coin->id }}" {{ $select }}>{{ $coin->name }}</option>
				@endforeach
			</select>
		</div>		
		<div class="form-group">
			<label for="publico_precio">Precio</label>
			<input type="text" name="publico_precio" class="form-control" value="{{ $producto->publico_precio }}" id="publico_precio" placeholder="">
		</div>
		<div class="form-group d-flex justify-content-between">
			<div class="custom-control custom-switch">
				@php
				if($producto->publico_gratis == 1){
					$check = 'checked';
				} else {
					$check = '';
				}
				@endphp
				<input type="checkbox" class="custom-control-input" name="publico_gratis" id="publico_gratis" value="1" {{ $check }}>
				<label class="custom-control-label" for="publico_gratis">Gratis ?</label>
			</div>
			<div class="custom-control custom-switch">
				@php
				if($producto->public_na == 1){
					$check = 'checked';
				} else {
					$check = '';
				}
				@endphp
				<input type="checkbox" class="custom-control-input" name="public_na" id="public_na" value="1" {{ $check }}>
				<label class="custom-control-label" for="public_na">No Aplica ?</label>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-12 col-md-6">
		<div class="form-group" id="show_imagen_principal">
			<label for="imagen_principal">Imágen principal</label>
			<div class="input-group">
				<div class="custom-file">
					<input type="file" class="custom-file-input" name="imagen_principal" id="imagen_principal">
					<label class="custom-file-label" for="imagen_principal"></label>
				</div>
				<div class="input-group-append">
					<span class="input-group-text" id="">Upload</span>
				</div>
			</div>
		</div>
		<img id="showImagenPrincipal" src="{{ asset('img/'.$producto->imagen_principal) }}" width="100%"/>
	</div>

	<div class="col-sm-12 col-md-6">
		<div class="form-group" id="show_logo">
			<label for="logo">Logo del establecimiento</label>
			<div class="input-group">
				<div class="custom-file">
					<input type="file" class="custom-file-input" name="logo" id="logo">
					<label class="custom-file-label" for="logo"></label>
				</div>
				<div class="input-group-append">
					<span class="input-group-text" id="">Upload</span>
				</div>
			</div>
		</div>
		<img id="showLogo" src="{{ asset('img/'.$producto->logo) }}" width="100%"/>
	</div>
</div>
<!-- /.row -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
function filePreviewImagenPrincipal(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#show_imagen_principal + img').remove();
      $('#show_imagen_principal').after('<img src="'+e.target.result+'" width="100%"/>');
    }
    reader.readAsDataURL(input.files[0]);
    $('#showImagenPrincipal').remove();
  }
}

function filePreviewLogo(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#show_logo + img').remove();
      $('#show_logo').after('<img src="'+e.target.result+'" width="100%"/>');
    }
    reader.readAsDataURL(input.files[0]);
    $('#showLogo').remove();
  }
}

$("#imagen_principal").change(function () {
    filePreviewImagenPrincipal(this);
});

$("#logo").change(function () {
    filePreviewLogo(this);
});

function tipoProducto() {
	var tipoProducto = $('#tipo_producto_id option:selected').text();
	if (tipoProducto == 'Evento') {
		$('#linkTab_3').prop('style', 'display:none');
		$('#tab_3').prop('style', 'display:none');

		$('#linkTab_4').prop('style', 'display:none');
		$('#tab_4').prop('style', 'display:none');

		$('#linkTab_6').prop('style', 'display:none');
		$('#tab_6').prop('style', 'display:none');
		
		$('#tipoEventoContent').html('<div class="col-sm-12 col-md-6"><div class="form-group"><label for="establecimiento">Establecimiento <span style="color: red;">*</span></label><select name="establecimiento[]" class="form-control select2" style="width: 100%;" id="establecimiento"><option value="">Seleccione un establecimiento ...</option>@foreach($establishments as $establishment)<option value="{{ $establishment->id }}">{{ $establishment->name }}</option>@endforeach</select></div></div><div class="col-sm-12 col-md-6"><div class="form-group"><label for="direccion">Dirección <span style="color: red;">*</span></label><input type="text" name="direccion" value="" class="form-control" id="direccion"></div></div><div class="col-sm-12 col-md-6"><div class="form-group"><label for="fecha_producto">Fecha Evento <span style="color: red;">*</span></label><input type="date" name="fecha_producto" class="form-control" id="fecha_producto"></div></div><div class="col-sm-12 col-md-6"><div class="form-group"><label for="hora_producto">Hora Evento <span style="color: red;">*</span></label><input type="time" name="hora_producto" class="form-control" id="hora_producto"></div></div>')
	} else {
		$('#linkTab_3').prop('style', '');
		$('#tab_3').prop('style', '');

		$('#linkTab_4').prop('style', '');
		$('#tab_4').prop('style', '');

		$('#linkTab_6').prop('style', '');
		$('#tab_6').prop('style', '');
		
		$('#tipoEventoContent').html('');
	}
}
</script>