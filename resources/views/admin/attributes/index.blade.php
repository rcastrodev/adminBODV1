@extends('adminlte::page')

@section('css')
@stop

@section('title', 'Atributos')

@section('content_header')
<h1>Atributos</h1>
@stop

@section('content')
<div class="card card-default">
	<div class="card-header">
		<h3 class="card-title">Lista de Atributos 
			<a href="/admin/atributos/create" class="ml-3 btn btn-sm btn-primary">Crear atributo</a>
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
				    	<th>Clave</th>
				    	<th>Valor</th>
				    	<th>Uso</th>
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
@include('admin.attributes.modals.modal-delete-attribute')
@stop

@section('js')
	<script src="{{ asset('js/attributes/deleteAttribute.js') }}"></script>
	<script>
		$(document).ready(function(){

			$('#table-brands').DataTable({
				'serverSide' : true,
				'ajax' 		 : "{{ route('atributos-get-list') }}",
				'columns'    : [
					{data: 'id'},
					{data: 'key'},
					{data: 'value'},
					{data: 'use'},
					{ data: 'accion', name: 'accion', orderable: false, searchable: false }
				],
				language: {
            			url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
        			}, 
			})
		})
	</script>
@stop