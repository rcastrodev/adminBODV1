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
		<!-- /.row -->
		<div class="row">
			<div class="col-sm-12 col-md-6">				
			</div>
			<div class="col-sm-12 col-md-6">
				
			</div>
		</div>
		<!-- /.row -->
	</div>
	<!-- /.card-body -->
	<div class="card-footer">
		<a href="https://loyalfeel.com/">Loyalfeel</a> 
	</div>
</div>
@stop
@section('js')
@stop