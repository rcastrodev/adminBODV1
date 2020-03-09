@extends('adminlte::page')

@section('css')
@stop

@section('title', 'Atributo')

@section('content_header')
<h1>Editar Atributo</h1>
@stop

@section('content')
<div class="card card-default">
	<div class="card-header">
		<h3 class="card-title">Crear atributo <a href="/admin/atributos" class="ml-3 btn btn-sm btn-primary">Ver atributos</a></h3>

		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
		</div>
	</div>
	<!-- /.card-header -->
	<form action="/admin/atributos/{{$attribute->id}}" method="post" class="card-body" enctype='multipart/form-data'>
		@csrf
		@method('PUT')
		@include('partials.messages.errors')
		@include('partials.messages.success')
		<div class="row">
			<div class="col-sm-12 col-md-4" data-select2-id="29">
				<div class="form-group">
					<label for="key">Clave</label>
					<input type="text" class="form-control" id="key" name="key" value="{{ $attribute->key }}">
				</div>
			</div>
			<!-- /.col -->

			<div class="col-sm-12 col-md-4" data-select2-id="29">
				<div class="form-group">
					<label for="value">Valor</label>
					<input type="text" class="form-control" id="value" name="value"  value="{{ $attribute->value }}">
				</div>
			</div>
			<!-- /.col -->

			<div class="col-sm-12 col-md-4" data-select2-id="29">
				<div class="form-group">
					<label for="use">Uso</label>
					<input type="text" class="form-control" id="use" name="use"  value="{{ $attribute->use }}">
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