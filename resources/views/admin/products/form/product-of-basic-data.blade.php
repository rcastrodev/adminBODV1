<!-- /.row -->
@include('partials.messages.errors')
<div class="row">
	<div class="col-sm-12 col-md-6">
		<div class="form-group">
			<label for="nombre">Nombre del Producto <span style="color: red;">*</span></label>
			<input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" id="nombre" placeholder="">
		</div>
	</div>
	<div class="col-sm-12 col-md-6">
		<div class="form-group">
			<label for="tipo_producto_id">Tipo de Producto <span style="color: red;">*</span></label>
			<select name="tipo_producto_id" class="form-control select2" style="width: 100%;" id="tipo_producto_id">
				<option value="">Seleccione un tipo ...</option>
				@foreach($types as $type)
					@if($type->category == NULL)
					<option value="{{ $type->id }}">{{ $type->name }}</option>
					@endif
				@endforeach
			</select>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-12 col-md-12">
		<div class="form-group">
			<label for="description">Descripción</label>
			<textarea name="description" id="description" cols="10" rows="10">
				{{ old('description') }}
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
				<option value="{{ $coin->id }}">{{ $coin->name }}</option>
				@endforeach
			</select>
		</div>		
		<div class="form-group">
			<label for="afiliado_precio">Precio</label>
			<input type="text" name="afiliado_precio" class="form-control" value="{{ old('afiliado_precio') }}" id="afiliado_precio" placeholder="">
		</div>
		<div class="form-group d-flex justify-content-between">
			<div class="custom-control custom-switch">
				<input type="checkbox" class="custom-control-input" name="afiliado_gratis" id="afiliado_gratis" value="1">
				<label class="custom-control-label" for="afiliado_gratis">Gratis ?</label>
			</div>
			<div class="custom-control custom-switch">
				<input type="checkbox" class="custom-control-input" name="afiliado_na" id="afiliado_na" value="1">
				<label class="custom-control-label" for="afiliado_na">No Aplica ?</label>
			</div>
		</div>
	</div>
	<div class="col-sm-12 col-md-6">
		<div class="form-group">
			<label for="coin_publico_id">Publico General - Moneda</label>
			<select name="coin_publico_id" class="form-control select2-p" style="width: 100%;" id="coin_publico_id">
				@foreach($coins as $coin)
				<option value="{{ $coin->id }}">{{ $coin->name }}</option>
				@endforeach
			</select>
		</div>		
		<div class="form-group">
			<label for="publico_precio">Precio</label>
			<input type="text" name="publico_precio" class="form-control" value="{{ old('publico_precio') }}" id="publico_precio" placeholder="">
		</div>
		<div class="form-group d-flex justify-content-between">
			<div class="custom-control custom-switch">
				<input type="checkbox" class="custom-control-input" name="publico_gratis" id="publico_gratis" value="1">
				<label class="custom-control-label" for="publico_gratis">Gratis ?</label>
			</div>
			<div class="custom-control custom-switch">
				<input type="checkbox" class="custom-control-input" name="public_na" id="public_na" value="1">
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
	</div>
</div>

<div class="col-12 mt-5" style="text-align: right;">
	<button class="btn btn-sm btn-primary" type="">Guardar Producto</button>
</div>
<!-- /.row -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
function filePreviewImagenPrincipal(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#show_imagen_principal + img').remove();
      $('#show_imagen_principal').after('<img src="'+e.target.result+'" width="450" height="300"/>');
    }
    reader.readAsDataURL(input.files[0]);
  }
}

function filePreviewLogo(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#show_logo + img').remove();
      $('#show_logo').after('<img src="'+e.target.result+'" width="450" height="300"/>');
    }
    reader.readAsDataURL(input.files[0]);
  }
}

$("#imagen_principal").change(function () {
    filePreviewImagenPrincipal(this);
});

$("#logo").change(function () {
    filePreviewLogo(this);
});
</script>