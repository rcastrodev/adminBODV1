@extends('adminlte::page')
@section('css')
@stop
@section('title', 'Establecimientos')
@section('content_header')
<h1>Establecimientos</h1>
@stop
@section('content')
<div class="card card-default">
	<div class="card-header">
		<h3 class="card-title">Lista de establecimientos <a href="/admin/establecimientos/create" class="ml-3 btn btn-sm btn-primary">Crear establecimiento</a></h3>

		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
		</div>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
		  	<table class="table" id="table-establishment">
		    	<thead>
		    		<tr>
				    	<th>Nombre</th>
				    	<th>Gastronomía</th>
				    	<th>País</th>
				    	<th>Ciudad</th>
				    	<th>Estatus</th>
				    	<th>Acción</th>
		    		</tr>
		    	</thead>
		  	</table>
		</div>
	</div>
	<!-- /.card-body -->
	<div class="card-footer">
		<a href="https://loyalfeel.com/">Loyalfeel</a> 
	</div>
</div>
@stop
@section('js')
	<script>
		$(document).ready(function(){

			$('#table-establishment').DataTable({
				'serverSide' : true,
				'ajax' 		 : "{{ route('establishment-get-list') }}",
				'columns'    : [
					{data: 'name'},
					{data: 'gastronomy', name: "types.name"},
					{data: 'country' , name: "countries.name"},
					{data: 'city' , name: "cities.name"},
					{data: 'status'},
					{ data: 'accion', name: 'accion', orderable: false, searchable: false }
				],
				language: {
            			url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
        			}, 
			})
		})
	</script>
@stop
