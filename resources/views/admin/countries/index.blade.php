@extends('adminlte::page')

@section('css')
@stop

@section('title', 'Paises')

@section('content_header')
<h1>Paises</h1>
@stop

@section('content')
<div class="card card-default">
	<div class="card-header">
		<h3 class="card-title">Lista de Paises 
			<a href="/admin/paises/create" class="ml-3 btn btn-sm btn-primary">Crear pais</a>
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
				    	<th>ISO</th>
				    	<th>UTC</th>
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
@include('admin.countries.modals.modal-delete-country')
@stop

@section('js')
	<script src="{{ asset('js/countries/deleteCountry.js') }}"></script>
	<script>
		$(document).ready(function(){

			$('#table-brands').DataTable({
				'serverSide' : true,
				'ajax' 		 : "{{ route('paises-get-list') }}",
				'columns'    : [
					{data: 'id'},
					{data: 'name'},
					{data: 'iso'},
					{data: 'utc'},
					{ data: 'accion', name: 'accion', orderable: false, searchable: false }
				],
				language: {
            			url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
        			}, 
			})
		})
	</script>
@stop