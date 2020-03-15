<!-- /.row -->
@include('partials.messages.errors')
<div class="row">
	<div class="col-sm-12 col-md-6">
		<div class="form-group">
			<label for="name">Nombre del Producto <span style="color: red;">*</span></label>
			<input type="text" name="name" class="form-control" value="{{ old('name') }}" id="" placeholder="">
		</div>
	</div>
	<div class="col-sm-12 col-md-6">
		<div class="form-group">
			<label for="brands_id">Tipo de Producto <span style="color: red;">*</span></label>
			<select name="brand_id" class="form-control select2" style="width: 100%;">
				<option value="">Seleccione un tipo ...</option>
				<option value="1">PRODUCTO</option>
				<option value="2">REDIMIBLE</option>
				<option value="3">EVENTO</option>
			</select>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-12 col-md-12">
		<div class="form-group">
			<label for="description">Descripción</label>
			<textarea name="description" id="" cols="10" rows="10">
				{{ old('description') }}
			</textarea>
		</div>
	</div>

	<div class="col-sm-12 col-md-12">
		<div class="form-group d-flex justify-content-between">
			<div class="custom-control custom-switch">
				<input type="checkbox" class="custom-control-input" name="admit_reservation" id="admit_reservation" checked="">
				<label class="custom-control-label" for="admit_reservation">Estatus</label>
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
			<label for="country_id">AFILIADO - Moneda</label>
			<select name="country_id" class="form-control select2-p" style="width: 100%;">
			</select>
		</div>		
		<div class="form-group">
			<label for="city_id">Precio</label>
			<input type="text" name="length" class="form-control" value="{{ old('length') }}" id="" placeholder="">
		</div>
		<div class="form-group d-flex justify-content-between">
			<div class="custom-control custom-switch">
				<input type="checkbox" class="custom-control-input" name="admit_reservation" id="admit_reservation">
				<label class="custom-control-label" for="admit_reservation">Gratis ?</label>
			</div>
			<div class="custom-control custom-switch">
				<input type="checkbox" class="custom-control-input" name="publish_on_the_web" id="publish_on_the_web">
				<label class="custom-control-label" for="publish_on_the_web">No Aplica ?</label>
			</div>
		</div>
	</div>
	<div class="col-sm-12 col-md-6">
		<div class="form-group">
			<label for="country_id">Publico General - Moneda</label>
			<select name="country_id" class="form-control select2-p" style="width: 100%;">
			</select>
		</div>		
		<div class="form-group">
			<label for="city_id">Precio</label>
			<input type="text" name="length" class="form-control" value="{{ old('length') }}" id="" placeholder="">
		</div>
		<div class="form-group d-flex justify-content-between">
			<div class="custom-control custom-switch">
				<input type="checkbox" class="custom-control-input" name="admit_reservation" id="admit_reservation">
				<label class="custom-control-label" for="admit_reservation">Gratis ?</label>
			</div>
			<div class="custom-control custom-switch">
				<input type="checkbox" class="custom-control-input" name="publish_on_the_web" id="publish_on_the_web">
				<label class="custom-control-label" for="publish_on_the_web">No Aplica ?</label>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-12 col-md-6">
		<div class="form-group">
			<label for="main_image">Imágen principal</label>
			<div class="input-group">
				<div class="custom-file">
					<input type="file" class="custom-file-input" name="main_image" id="main_image">
					<label class="custom-file-label" for="main_image"></label>
				</div>
				<div class="input-group-append">
					<span class="input-group-text" id="">Upload</span>
				</div>
			</div>
		</div>
	</div>

	<div class="col-sm-12 col-md-6">
		<div class="form-group">
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
<!-- /.row -->