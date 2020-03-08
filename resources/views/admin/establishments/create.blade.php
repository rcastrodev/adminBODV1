@extends('adminlte::page')
@section('css')
@stop
@section('title', 'Establecimientos')
@section('content_header')
<h1>Establecimiento</h1>
@stop
@section('content')
<div class="card card-default">
	<div class="card-header">
		<h3 class="card-title">Crear establecimientos <a href="/admin/establecimientos/" class="ml-3 btn btn-sm btn-primary">Ver establecimientos</a></h3>

		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
		</div>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<!-- /.row -->
		<form class="row">
			<div class="col-sm-12 col-md-6">
				<div class="form-group">
					<label for="brands_id">Franquicia</label>
					<select name="brands_id" class="form-control select2" style="width: 100%;">
					</select>
				</div>
				<div class="form-group">
					<label for="country_id">Pais</label>
					<select name="country_id" class="form-control select2" style="width: 100%;">
					</select>
				</div>		
				<div class="form-group">
					<label for="city_id">Ciudad</label>
					<select name="city_id" class="form-control select2" style="width: 100%;">
					</select>
				</div>
				<div class="form-group">
					<label for="name">Nombre</label>
					<input type="text" name="name" class="form-control" id="" placeholder="">
				</div>
				<div class="form-group">
					<label for="length">Longitud</label>
					<input type="text" name="length" class="form-control" id="" placeholder="">
				</div>
				<div class="form-group">
					<label for="reservation_email">Email de reservación</label>
					<input type="text" name="reservation_email" class="form-control" id="" placeholder="">
				</div>
				<div class="form-group">
					<label for="main_image">Imagen principal</label>
					<div class="input-group">
						<div class="custom-file">
							<input type="file" class="custom-file-input" id="main_image">
							<label class="custom-file-label" for="main_image">Choose file</label>
						</div>
						<div class="input-group-append">
							<span class="input-group-text" id="">Upload</span>
						</div>
					</div>
				</div>
				<div class="form-group d-flex justify-content-between">
					<div class="custom-control custom-switch">
						<input type="checkbox" class="custom-control-input" name="admit_reservation" id="admit_reservation">
						<label class="custom-control-label" for="admit_reservation">Admite reservacón ?</label>
					</div>
					<div class="custom-control custom-switch">
						<input type="checkbox" class="custom-control-input" name="publish_on_the_web" id="publish_on_the_web">
						<label class="custom-control-label" for="publish_on_the_web">Publicar en la web ?</label>
					</div>
				</div>	
			</div>
			<div class="col-sm-12 col-md-6">
				<div class="form-group">
					<label for="gastronomy_id">Gastronomia</label>
					<select name="gastronomy_id" class="form-control select2" style="width: 100%;">
					</select>
				</div>
				<div class="form-group">
					<label for="region_id">Departamento o Estado</label>
					<select name="region_id" class="form-control select2" style="width: 100%;">
					</select>
				</div>
				<div class="form-group">
					<label for="zone_id">Zona</label>
					<select name="zone_id" class="form-control select2" style="width: 100%;">
					</select>
				</div>
				<div class="form-group">
					<label for="latitude">Latitud</label>
					<input type="text" name="latitude" class="form-control" id="" placeholder="">
				</div>
				<div class="form-group">
					<label for="phone">Teléfono</label>
					<input type="text" name="phone" class="form-control" id="" placeholder="">
				</div>
				<div class="form-group">
					<label for="logo">Logo del estable</label>
					<div class="input-group">
						<div class="custom-file">
							<input type="file" class="custom-file-input" id="logo">
							<label class="custom-file-label" for="logo">Choose file</label>
						</div>
						<div class="input-group-append">
							<span class="input-group-text" id="">Upload</span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="linear_discount">Descuento lineal</label>
					<input type="number" name="linear_discount" min="1" max="100" class="form-control" id="" placeholder="">
				</div>
			</div>
			<div class="col-12">
				<div class="form-group">
					<label for="description">Descripción</label>
					<textarea name="description" id="" cols="10" rows="10"></textarea>
				</div>
				<div class="form-group">
					<label for="address">Direccion</label>
					<textarea name="address" id="" cols="10" rows="10"></textarea>
				</div>
				<div class="form-group">
					<label for="menu">Menu</label>
					<textarea name="menu" id="" cols="30" rows="10"></textarea>
				</div>
			</div>
			<div class="col-12 mt-5">
				<button class="btn btn-sm btn-primary">Crear</button>
			</div>
		</form>
		<!-- /.row -->
	</div>
	<!-- /.card-body -->
	<div class="card-footer">
		<a href="https://loyalfeel.com/">Loyalfeel</a> 
	</div>
</div>
@stop
@section('js')
<script>
	$('select2').select2()
	CKEDITOR.replace('menu')
	CKEDITOR.replace('description')
	CKEDITOR.replace('address')
</script>
@stop