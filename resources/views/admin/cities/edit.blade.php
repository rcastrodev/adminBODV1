@extends('adminlte::page')

@section('css')
@stop

@section('title', 'Ciudades')

@section('content_header')
<h1>Editar ciudad</h1>
@stop

@section('content')
<div class="card card-default">
	<div class="card-header">
		<h3 class="card-title">Crear ciudad <a href="/admin/ciudades" class="ml-3 btn btn-sm btn-primary">Ver ciudades</a></h3>

		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
		</div>
	</div>
	<!-- /.card-header -->
	<form action="/admin/ciudades/{{$city->id}}" method="post" class="card-body" enctype='multipart/form-data'>
		@csrf
		@method('PUT')
		@include('partials.messages.errors')
		@include('partials.messages.success')
		<div class="row">
			<div class="col-sm-12 col-md-3" data-select2-id="29">
				<div class="form-group">
					<label for="name">Nombre</label>
					<input type="text" class="form-control" id="name" name="name" value="{{ $city->name }}">
				</div>
			</div>
			<!-- /.col -->

			<div class="col-sm-12 col-md-3" data-select2-id="29">
				<div class="form-group">
					<label for="code">CODE</label>
					<input type="text" class="form-control" id="code" name="code"  value="{{ $city->code }}">
				</div>
			</div>
			<!-- /.col -->

			<div class="col-sm-12 col-md-3" data-select2-id="29">
				<div class="form-group">
					<label for="country_id">Pais</label>
					<select id="country_id" name="country_id" class="form-control select2" style="width: 100%;">
						@foreach ($countries as $idCountry => $country)
						<option value="{{$country->id}}">{{$country->name}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<!-- /.col -->

			<div class="col-sm-12 col-md-3" data-select2-id="29">
				<div class="form-group">
					<label for="region_id">Estado</label>
					<select id="region_id" name="region_id" class="form-control select2" style="width: 100%;">
						@foreach ($regions as $idRegion => $region)
						<option value="{{$region->id}}">{{$region->name}}</option>
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