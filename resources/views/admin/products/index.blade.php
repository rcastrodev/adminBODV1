@extends('adminlte::page')

@section('css')
@stop

@section('title', 'Productos')

@section('content_header')
<h1>Productos</h1>
@stop

@section('content')
<div class="card card-default">
	<div class="card-header">
		<h3 class="card-title">Lista de Productos
			<a href="/admin/productos/create" class="ml-3 btn btn-sm btn-primary">Crear productos</a>
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
				   	<th>Abreviación</th>
				   	<th>Simbolo</th>
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
@include('admin.coins.modals.modal-delete-coin')
@stop

@section('js')
<script src="{{ asset('js/coins/deleteCoin.js') }}"></script>
<script>
	$(document).ready(function(){

		$('#table-brands').DataTable({
			'serverSide' : true,
			'ajax' 		 : "{{ route('productos-get-list') }}",
			'columns'    : [
				{data: 'id'},
				{data: 'name'},
				{data: 'shortname'},
				{data: 'symbol'},
				{ data: 'accion', name: 'accion', orderable: false, searchable: false }
			],
			language: {
         url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
      }, 
		})
	})
</script>
@stop