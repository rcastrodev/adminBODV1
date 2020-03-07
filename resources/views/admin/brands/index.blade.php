@extends('adminlte::page')
@section('css')
@stop
@section('title', 'Marcas')
@section('content_header')
<h1>Marcas</h1>
@stop
@section('content')
<div class="card card-default">
	<div class="card-header">
		<h3 class="card-title">Lista de marcas 
			<a href="/admin/marcas/create" class="ml-3 btn btn-sm btn-primary">Crear marca</a>
		</h3>

		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
		</div>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
		  	<table class="table" id="table-brands">
		    	<thead>
		    		<tr>
						<th>ID</th>
				    	<th>Nombre</th>
				    	<th>RIF</th>
				    	<th>Pers de contacto</th>
				    	<th>Tel</th>
				    	<th>Email</th>
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
@stop
@section('js')
	<script>
		$(document).ready(function(){
			$('#table-brands').DataTable({
				'serverSide' : true,
				'ajax' 		 : "{{ route('marcas-get-list') }}",
				'columns'    : [
					{data: 'id'},
					{data: 'name'},
					{data: 'rif'},
					{data: 'contact_person'},
					{data: 'tel' },
					{data: 'email'},
				] 
			})
		})
	</script>
@stop