@extends('adminlte::page')
@section('css')
<style>
	.select2-container{
		width: 100% !important;
	}
</style>
@stop
@section('title', 'Establecimientos')
@section('content_header')
	<h1>Establecimiento</h1>
@stop
	@section('content')
	<div class="pb-5">
	@include('admin.establishments.form.create.establishment-of-basic-data')
	{{-- 
	@include('admin.establishments.form.create.image-gallery')
	@include('admin.establishments.form.create.seasonal-discount')
	@include('admin.establishments.form.create.maximum-number-of-forks')
	@include('admin.establishments.form.create.opening-hours')
	@include('admin.establishments.form.create.discounts-for-number-of-people')
	 --}}
	</div>

@stop
@section('js')
	<script>
		$('.select2').select2()
		CKEDITOR.replace('menu')
		CKEDITOR.replace('description')
		CKEDITOR.replace('address')
	</script>
@stop