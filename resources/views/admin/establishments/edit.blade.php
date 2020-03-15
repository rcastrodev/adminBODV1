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
	<h1>Establecimiento <strong>{{ $establecimiento->name }}</strong></h1>
@stop
@section('content')
	<div class="pb-5">
        @include('partials.messages.success')
    	@include('admin.establishments.form.edit.image-gallery')
    	@include('admin.establishments.form.edit.seasonal-discount')
    	@include('admin.establishments.form.edit.maximum-number-of-forks')
    	@include('admin.establishments.form.edit.opening-hours')
    	@include('admin.establishments.form.edit.discounts-for-number-of-people')
	</div>

@stop
@section('js')
    <script>
        $('.select2').select2()

        $('.select2-p').select2().on('change', function() {
            var idcountry = this.value;
            $('.region').select2({
                destroy: true,//primero destruye el anterior y después lo vuelve a cargar
                allowClear: true,
                ajax: {
                    url: "{{ route('estados-by-pais') }}",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term, // search term
                            page: params.page,
                            id: idcountry
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (obj) {
                                return {
                                    id: obj.id,
                                    text: obj.name
                                };
                            })
                        };
                    },
                }
            })
        })

        $('.region').select2().on('change', function() {
            var idcity = this.value;
            $('.city').select2({
                destroy: true,//primero destruye el anterior y después lo vuelve a cargar
                allowClear: true,
                ajax: {
                    url: "{{ route('ciudades-by-estado') }}",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term, // search term
                            page: params.page,
                            id: idcity
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (obj) {
                                return {
                                    id: obj.id,
                                    text: obj.name
                                };
                            })
                        };
                    },
                }
            })
        })

        $('.city').select2().on('change', function() {
            var idzone = this.value;
            $('.zone').select2({
                destroy: true,//primero destruye el anterior y después lo vuelve a cargar
                allowClear: true,
                ajax: {
                    url: "{{ route('zonas-by-ciudad') }}",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term, // search term
                            page: params.page,
                            id: idzone
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (obj) {
                                return {
                                    id: obj.id,
                                    text: obj.name
                                };
                            })
                        };
                    },
                }
            })
        })


        CKEDITOR.replace('menu')
        CKEDITOR.replace('description')
        CKEDITOR.replace('address')
    </script>
@stop