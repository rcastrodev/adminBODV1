@extends('adminlte::page')

@section('css')
@stop

@section('title', 'Paises')

@section('content_header')
<h1>Editar pais</h1>
@stop

@section('content')
<div class="card card-default">
	<div class="card-header">
		<h3 class="card-title">Crear pais <a href="/admin/paises" class="ml-3 btn btn-sm btn-primary">Ver paises</a></h3>

		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
		</div>
	</div>
	<!-- /.card-header -->
	<form action="/admin/paises/{{$country->id}}" method="post" class="card-body" enctype='multipart/form-data'>
		@csrf
		@method('PUT')
		@include('partials.messages.errors')
		@include('partials.messages.success')
		<div class="row">
			<div class="col-sm-12 col-md-4" data-select2-id="29">
				<div class="form-group">
					<label for="name">Nombre</label>
					<input type="text" class="form-control" id="name" name="name" value="{{ $country->name }}">
				</div>
			</div>
			<!-- /.col -->

			<div class="col-sm-12 col-md-4" data-select2-id="29">
				<div class="form-group">
					<label for="iso">ISO CODE</label>
					<input type="text" class="form-control" id="iso" name="iso"  value="{{ $country->iso }}">
				</div>
			</div>
			<!-- /.col -->

			<div class="col-sm-12 col-md-4" data-select2-id="29">
				<div class="form-group">
					<label for="utc">UTC</label>
					<input type="text" class="form-control" id="utc" name="utc"  value="{{ $country->utc }}">
				</div>
			</div>
			<!-- /.col -->
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
@stop