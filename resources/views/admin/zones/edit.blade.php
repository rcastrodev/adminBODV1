@extends('adminlte::page')

@section('css')
@stop

@section('title', 'Zonas')

@section('content_header')
<h1>Editar zona</h1>
@stop

@section('content')
<div class="card card-default">
	<div class="card-header">
		<h3 class="card-title">Crear zona <a href="/admin/zonas" class="ml-3 btn btn-sm btn-primary">Ver zona</a></h3>

		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
		</div>
	</div>
	<!-- /.card-header -->
	<form action="/admin/zonas/{{$zone->id}}" method="post" class="card-body" enctype='multipart/form-data'>
		@csrf
		@method('PUT')
		@include('partials.messages.errors')
		@include('partials.messages.success')
		<div class="row">
			<div class="col-sm-12 col-md-4" data-select2-id="29">
				<div class="form-group">
					<label for="name">Nombre</label>
					<input type="text" class="form-control" id="name" name="name" value="{{ $zone->name }}">
				</div>
			</div>
			<!-- /.col -->

			<div class="col-sm-12 col-md-4" data-select2-id="29">
				<div class="form-group">
					<label for="code">CODE</label>
					<input type="text" class="form-control" id="code" name="code"  value="{{ $zone->code }}">
				</div>
			</div>
			<!-- /.col -->

			<div class="col-sm-12 col-md-4" data-select2-id="29">
				<div class="form-group">
					<label for="city_id">Ciudad</label>
					<select id="city_id" name="city_id" class="form-control select2" style="width: 100%;">
						@foreach ($cities as $idCity => $city)
						<option value="{{$city->id}}">{{$city->name}}</option>
						@endforeach
					</select>
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