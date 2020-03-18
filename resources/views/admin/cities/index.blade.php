@extends('adminlte::page')

@section('css')
@stop

@section('title', 'Ciudades')

@section('content_header')
<h1>Ciudades</h1>
@stop

@section('content')
<div class="card card-default">
	<div class="card-header">
		<h3 class="card-title">Lista de Ciudades
			<a href="/admin/ciudades/create" class="ml-3 btn btn-sm btn-primary">Crear ciudad</a>
		</h3>
		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
		</div>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="message-response">
			
		</div>
		<div class="table-responsive">
		  	<table class="table" id="table-brands">
		    	<thead>
		    		<tr>
						<th>ID</th>
				    	<th>Nombre</th>
				    	<th>CODE</th>
				    	<th>Pais</th>
				    	<th>Acción</th>
		    		</tr>
		    	</thead>
		  	</table>
		</div>
	</div>
	<!-- /.card-body -->
	<div class="card-footer">
		<a href="https://loyalfeel.com/">loyalfeel</a>
	</div>
</div>
@include('admin.cities.modals.modal-delete-city')
@stop

@section('js')
	<script src="{{ asset('js/cities/deleteCity.js') }}"></script>
	<script>
		$(document).ready(function(){

			$('#table-brands').DataTable({
				'serverSide' : true,
				'ajax' 		 : "{{ route('ciudades-get-list') }}",
				'columns'    : [
					{data: 'id'},
					{data: 'name'},
					{data: 'code'},
					{data: 'country', name:'countries.name'},
					{ data: 'accion', name: 'accion', orderable: false, searchable: false }
				],
				language: {
            			url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
        			}, 
			})
		})
	</script>
@stop