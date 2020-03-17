@extends('adminlte::page')
@section('css')
@stop
@section('title', 'Marcas')
@section('content_header')
<h1>Editar marca</h1>
@stop
@section('content')
<div class="card card-default">
	<div class="card-header">
		<h3 class="card-title">Crear marca <a href="/admin/marcas" class="ml-3 btn btn-sm btn-primary">Ver marcas</a></h3>

		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
		</div>
	</div>
	<!-- /.card-header -->
	<form action="/admin/marcas/{{$brand->id}}" method="post" class="card-body" enctype='multipart/form-data'>
		@csrf
		@method('PUT')
		@include('partials.messages.errors')
		@include('partials.messages.success')
		<div class="row">
			<div class="col-sm-12 col-md-6" data-select2-id="29">
				<div class="form-group">
					<label for="name">Nombre</label>
					<input type="text" class="form-control" id="name" name="name" value="{{ $brand->name }}">
				</div>
				<div class="form-group">
					<label for="tel">Teléfono</label>
					<input type="text" class="form-control" id="tel" name="tel"  value="{{ $brand->tel }}">
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="text" class="form-control" id="email" name="email"  value="{{ $brand->email }}">
				</div>
				<div class="form-group">
					<div class="custom-control custom-switch">
						<input type="checkbox" class="custom-control-input" name="status" value="1" id="status">
						<label class="custom-control-label" for="status">Estatus</label>
					</div>
                </div>
                <div class="form-group">
                	<img src="{{$brand->logo}}" alt="" class="img-fluid admin-img-marca">
                </div>
			</div>
			<!-- /.col -->
			<div class="col-sm-12 col-md-6">
				<div class="form-group">
					<label for="rif">Rif</label>
					<input type="text" class="form-control" id="rif" name="rif"  value="{{ $brand->rif }}">
				</div>	
				<div class="form-group">
					<label for="contact_person">Persona de contacto</label>
					<input type="text" class="form-control" id="contact_person" name="contact_person"  value="{{ $brand->contact_person }}">
				</div>
				<div class="input-group mt-5">
					<div class="custom-file">
						<input type="file" name="logo" class="custom-file-input" id="logo">
						<label class="custom-file-label" for="logo">logo</label>
					</div>
					<div class="input-group-append">
						<span class="input-group-text" id="">Subir</span>
					</div>
				</div>
				<div class="input-group mt-5">
					<img src="{{ asset("img/$brand->logo") }}" alt="" class="img-fluid admin-img-marca">
				</div>
			</div>
			<div class="col-sm-12">
				<label for="address">Dirección</label>
				<textarea cols='80' id='address' name='address' rows='10' placeholder="Ingresar la dirección">
					{{ $brand->address }}
				</textarea>
			</div>
			<div class="col-sm-12 mt-4">
				<button type="submit" class="btn btn-primary">Actualizar</button>
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</form>
	<!-- /.card-body -->
	<div class="card-footer">
		<a href="https://loyalfeel.com/">Loyalfeel</a>
	</div>
</div>
@stop
@section('js')
<script>
	// si estatus es 1 hacer click en el swich de status
	if({{$brand->status}}){
		$('#status').trigger('click')
	}
	CKEDITOR.replace('address');
</script>
@stop