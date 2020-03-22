@extends('adminlte::page')
@section('css')
@stop
@section('title', 'Establecimientos')
@section('content_header')
<h1>Reservaciones</h1>
@stop
@section('content')
<div class="card card-default">
	<div class="card-header">
		<h3 class="card-title">Lista de reservas</h3>

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
				    	<th>Documento</th>
				    	<th>Establecimiento</th>
				    	<th>Localizador</th>
				    	<th>Estatus</th>
				    	<th>Fecha de reservación</th>
				    	<th>Hora</th>
						<th>Editar</th>
						<th>Ver detalle</th>
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
	</script>
@stop
