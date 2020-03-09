@extends('adminlte::page')

@section('css')
@stop

@section('title', 'Moneda')

@section('content_header')
<h1>Editar Moneda</h1>
@stop

@section('content')
<div class="card card-default">
	<div class="card-header">
		<h3 class="card-title">Crear moneda <a href="/admin/monedas" class="ml-3 btn btn-sm btn-primary">Ver moneda</a></h3>

		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
		</div>
	</div>
	<!-- /.card-header -->
	<form action="/admin/monedas/{{$coin->id}}" method="post" class="card-body" enctype='multipart/form-data'>
		@csrf
		@method('PUT')
		@include('partials.messages.errors')
		@include('partials.messages.success')
		<div class="row">
			<div class="col-sm-12 col-md-4" data-select2-id="29">
				<div class="form-group">
					<label for="name">Nombre</label>
					<input type="text" class="form-control" id="name" name="name" value="{{ $coin->name }}">
				</div>
			</div>
			<!-- /.col -->

			<div class="col-sm-12 col-md-4" data-select2-id="29">
				<div class="form-group">
					<label for="shortname">Abreviación</label>
					<input type="text" class="form-control" id="shortname" name="shortname"  value="{{ $coin->shortname }}">
				</div>
			</div>
			<!-- /.col -->

			<div class="col-sm-12 col-md-4" data-select2-id="29">
				<div class="form-group">
					<label for="symbol">Simbolo</label>
					<input type="text" class="form-control" id="symbol" name="symbol"  value="{{ $coin->symbol }}">
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