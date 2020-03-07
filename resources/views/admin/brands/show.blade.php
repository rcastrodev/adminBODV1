@extends('adminlte::page')
@section('css')
@stop
@section('title', 'Marcas')
@section('content_header')
<h1>{{ $brand->name }}</h1>
@stop
@section('content')
<div class="card card-default">
	<div class="card-header">
		<h3 class="card-title"> Detalle de la marca <a href="/admin/marcas" class="ml-3 btn btn-sm btn-primary">Ver marcas</a></h3>

		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
		</div>
	</div>
	<!-- /.card-header -->
	<div class="card-body" enctype='multipart/form-data'>
		<div class="row">
			<div class="col-sm-12 col-md-6" data-select2-id="29">
				<div class="form-group">
					<label for="tel">Teléfono</label>
					<input type="text" class="form-control" id="tel" name="tel"  value="{{ $brand->tel }}">
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="text" class="form-control" id="email" name="email"  value="{{ $brand->email }}">
				</div>
				<div class="form-group">
					<label for="status">Estatus</label>
					<input type="text" class="form-control" id="status" name="status"  value="{{ $brand->status }}">
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
			</div>
			<div class="col-sm-12">
				<label for="address">Dirección</label>
				<textarea cols='80' id='address' name='address' rows='10' placeholder="Ingresar la dirección">
					{{ $brand->address }}
				</textarea>
			</div>
			<div class="col-sm-12 mt-5">
				<img src="{{ Storage::disk('public')->url($brand->logo) }}" alt="" class="img-fluid d-block mx-auto">				
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</div>
	<!-- /.card-body -->
	<div class="card-footer">
		<a href="https://loyalfeel.com/">Loyalfeel</a>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Establecimientos Relacionados con {{ $brand->name }}</h3>
			</div>
			<!-- /.card-header -->
			<div class="card-body table-responsive p-0" style="height: 300px;">
				<table class="table table-head-fixed" id="tableEstablecimientos">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nombre</th>
							<th>Email</th>
							<th>Rif</th>
							<th>Accion</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
			<!-- /.card-body -->
			<div class="card-footer">
				<a href="">loyalfeel</a>
			</div>
		</div>
		<!-- /.card -->
	</div>
</div>
@stop
@section('js')
<script>
	CKEDITOR.replace('address');
</script>
@stop