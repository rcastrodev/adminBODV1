@extends('adminlte::page')
@section('css')
<style>
	.select2-container{
		width: 100% !important;
	}
</style>
@stop
@section('title', 'Establecimientos')
@section('content_header')
<h1>Establecimiento <strong>{{ $establishment->name }}</strong></h1>
@stop
@section('content')
<div class="pb-5">
	@include('partials.messages.success')
	@include('partials.messages.errors')
	<div class="row">
		<div class="col-md-12">
			<!-- Custom Tabs -->
			<div class="card">
				<div class="card-header d-flex p-0">
					<h3 class="card-title p-3">Crear producto <a href="/admin/productos" class="ml-3 btn btn-sm btn-primary">Ver productos</a></h3>
					<ul class="nav nav-pills ml-auto p-2">
						<li class="nav-item">
							<a class="nav-link active" href="#tab_1" data-toggle="tab">Datos</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#tab_2" data-toggle="tab">Galería</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#tab_3" data-toggle="tab">Desc estacional</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#tab_4" data-toggle="tab">Max comensales</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#tab_5" data-toggle="tab">Hr de ini y fin</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#tab_6" data-toggle="tab">Desc por comensal</a>
						</li>
					</ul>
				</div>
				<!-- /.card-header -->

				<div class="card-body">
					<div class="tab-content">
						<div class="tab-pane active" id="tab_1">
							@include('admin.establishments.form.edit.establishment-of-basic-data')
						</div>
						<!-- /.tab-pane -->
						<div class="tab-pane" id="tab_2">
							@include('admin.establishments.form.edit.image-gallery')
						</div>
						<!-- /.tab-pane -->

						<div class="tab-pane" id="tab_3">
							@include('admin.establishments.form.edit.seasonal-discount')
						</div>
						<!-- /.tab-pane -->
						<div class="tab-pane" id="tab_4">
							@include('admin.establishments.form.edit.maximum-number-of-forks')
						</div>
						<!-- /.tab-pane -->
						<div class="tab-pane" id="tab_5">
							@include('admin.establishments.form.edit.opening-hours')
						</div>
						<!-- /.tab-pane -->
						<div class="tab-pane" id="tab_6">
							@include('admin.establishments.form.edit.discounts-for-number-of-people')
						</div>
						<!-- /.tab-pane -->

					</div>
					<!-- /.tab-content -->

				</div>
				<!-- /.card-body -->

			</div>
			<!-- ./card -->

		</div>
		<!-- /.col -->

	</div>







</div>

@stop
@section('js')
<script>
	$('.select2').select2()

	$('.select2-p').select2().on('change', function() {
		var idcountry = this.value;
		$('.region').select2({
				destroy: true,//primero destruye el anterior y después lo vuelve a cargar
				allowClear: true,
				ajax: {
					url: "{{ route('estados-by-pais') }}",
					dataType: 'json',
					delay: 250,
					data: function (params) {
						return {
							q: params.term, // search term
							page: params.page,
							id: idcountry
						};
					},
					processResults: function (data) {
						return {
							results: $.map(data, function (obj) {
								return {
									id: obj.id,
									text: obj.name
								};
							})
						};
					},
				}
			})
	})

	$('.region').select2().on('change', function() {
		var idcity = this.value;
		$('.city').select2({
				destroy: true,//primero destruye el anterior y después lo vuelve a cargar
				allowClear: true,
				ajax: {
					url: "{{ route('ciudades-by-estado') }}",
					dataType: 'json',
					delay: 250,
					data: function (params) {
						return {
							q: params.term, // search term
							page: params.page,
							id: idcity
						};
					},
					processResults: function (data) {
						return {
							results: $.map(data, function (obj) {
								return {
									id: obj.id,
									text: obj.name
								};
							})
						};
					},
				}
			})
	})

	$('.city').select2().on('change', function() {
		var idzone = this.value;
		$('.zone').select2({
				destroy: true,//primero destruye el anterior y después lo vuelve a cargar
				allowClear: true,
				ajax: {
					url: "{{ route('zonas-by-ciudad') }}",
					dataType: 'json',
					delay: 250,
					data: function (params) {
						return {
							q: params.term, // search term
							page: params.page,
							id: idzone
						};
					},
					processResults: function (data) {
						return {
							results: $.map(data, function (obj) {
								return {
									id: obj.id,
									text: obj.name
								};
							})
						};
					},
				}
			})
	})

	CKEDITOR.replace('menu')
	CKEDITOR.replace('description')
	CKEDITOR.replace('address')
</script>
@stop