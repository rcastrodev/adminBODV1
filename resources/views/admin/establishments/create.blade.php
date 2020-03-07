@extends('adminlte::page')
@section('css')
@stop
@section('title', 'Establecimientos')
@section('content_header')
<h1>Establecimiento</h1>
@stop
@section('content')
<div class="card card-default">
	<div class="card-header">
		<h3 class="card-title">Crear establecimientos <a href="/admin/establecimientos/" class="ml-3 btn btn-sm btn-primary">Ver establecimiento</a></h3>

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
				<div class="form-group">
					<label for="">Franquicia</label>
					<select class="form-control select2" style="width: 100%;">
	                    <option>Alabama</option>
	                    <option>Alaska</option>
	                    <option>California</option>
	                    <option>Delaware</option>
	                    <option>Tennessee</option>
	                    <option>Texas</option>
	                    <option>Washington</option>
                  	</select>
				</div>	
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
<script>
	$('select2').select2()
</script>
@stop