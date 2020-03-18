@extends('adminlte::page')

@section('css')
@stop

@section('title', 'Zonas')

@section('content_header')
<h1>Zonas</h1>
@stop

@section('content')
<div class="card card-default">
	<div class="card-header">
		<h3 class="card-title">Lista de Zonas
			<a href="/admin/zonas/create" class="ml-3 btn btn-sm btn-primary">Crear zona</a>
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
		  	<table class="table" id="table-zones">
		    	<thead>
		    		<tr>
						<th>ID</th>
				    	<th>Nombre</th>
				    	<th>CODE</th>
				    	<th>Ciudad</th>
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
@include('admin.zones.modals.modal-delete-zone')
@stop

@section('js')
	<script src="{{ asset('js/zones/deleteZone.js') }}"></script>
	<script>
		$(document).ready(function(){

			$('#table-zones').DataTable({
				'serverSide' : true,
				'ajax' 		 : "{{ route('zonas-get-list') }}",
				'columns'    : [
					{data: 'id'},
					{data: 'name'},
					{data: 'code'},
					{data: 'city', name: 'cities.id'},
					{ data: 'accion', name: 'accion', orderable: false, searchable: false }
				],
				language: {
            			url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
        			}, 
			})
		})
	</script>
@stop