@extends('adminlte::page')
@section('css')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>
<style>
	.select2-container{width: 100% !important;}
	#tab_7{ height: 600px;}
	#map { height: 500px; }
	
      #description {
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
      }

      #infowindow-content .title {
        font-weight: bold;
      }

      #infowindow-content {
        display: none;
      }

      #map #infowindow-content {
        display: inline;
      }

      .pac-card {
        margin: 10px 10px 0 0;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        background-color: #fff;
        font-family: Roboto;
      }

      #pac-container {
        padding-bottom: 12px;
        margin-right: 12px;
      }

      .pac-controls {
        display: inline-block;
        padding: 5px 11px;
      }

      .pac-controls label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
		height: 50px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      #title {
        color: #fff;
        background-color: #4d90fe;
        font-size: 25px;
        font-weight: 500;
        padding: 6px 12px;
      }
      #target {
        width: 345px;
      }
    
	
</style>
@stop
@section('title', 'Establecimientos')
@section('content_header')
<h1>Establecimiento <strong>{{ $establishment->name }}</strong> <a href="/admin/establecimientos" class="ml-3 btn btn-sm btn-primary">Ver Establecimientos</a></h1>
@stop
@section('content')
<div class="pb-5">
	@include('partials.messages.success')
	@include('partials.messages.errors')
	<div class="row">
		<div class="col-md-12">
			<!-- Custom Tabs -->
			<div class="card">
				<div class="card-header d-flex p-0">
					<ul class="nav nav-pills ml-auto p-2">
						<li class="nav-item">
							<a class="nav-link active" href="#tab_1" data-toggle="tab">Datos Basicos</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#tab_2" data-toggle="tab">Dirección</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#tab_3" data-toggle="tab">Descuento estacional</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#tab_4" data-toggle="tab">Max comensales</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#tab_5" data-toggle="tab">Hora de ini y fin</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#tab_6" data-toggle="tab">Desc por comensal</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#tab_7" data-toggle="tab">Galería</a>
						</li>
					</ul>
				</div>
				<!-- /.card-header -->

				<div class="card-body">
					<div class="tab-content">
						<div class="tab-pane active" id="tab_1">
							@include('admin.establishments.form.edit.establishment-of-basic-data')
						</div>
						<!-- /.tab-pane -->
						<div class="tab-pane" id="tab_2">			
							@include('admin.establishments.form.edit.maps')
						</div>
						<!-- /.tab-pane -->

						<div class="tab-pane" id="tab_3">
							@include('admin.establishments.form.edit.seasonal-discount')
						</div>
						<!-- /.tab-pane -->
						<div class="tab-pane" id="tab_4">
							@include('admin.establishments.form.edit.maximum-number-of-forks')
						</div>
						<!-- /.tab-pane -->
						<div class="tab-pane" id="tab_5">
							@include('admin.establishments.form.edit.opening-hours')
						</div>
						<!-- /.tab-pane -->
						<div class="tab-pane" id="tab_6">
							@include('admin.establishments.form.edit.discounts-for-number-of-people')
						</div>
						<!-- /.tab-pane -->
						<!--tab-pane -->
						<div class="tab-pane" id="tab_7">
							@include('admin.establishments.form.edit.image-gallery')
						</div>
						<!-- /.tab-pane -->

					</div>
					<!-- /.tab-content -->

				</div>
				<!-- /.card-body -->

			</div>
			<!-- ./card -->

		</div>
		<!-- /.col -->

	</div>
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


	var idcountryactual = $('#country_id').val();
	$.ajax({
		method: "GET",
		url: "{{ route('estados-by-pais') }}",
		data: { 
			id: idcountryactual
		},
		success: function(result){
			var select;
    		result.forEach(function(element){
    			if (element.id == {{$establishment->region_id}}) {
    				select = 'selected';
    			} else {
    				select = '';
    			}
    			$('#region_id').append('<option value="'+element.id+'" '+select+'>'+element.name+'</option>')
    		});


    		var idregionactual = $('#region_id').val();
			$.ajax({
				method: "GET",
				url: "{{ route('ciudades-by-estado') }}",
				data: { 
					id: idregionactual
				},
				success: function(result){
					var select2;
    				result.forEach(function(element){
    					if (element.id == {{$establishment->city_id}}) {
    						select2 = 'selected';
    					} else {
    						select2 = '';
    					}
    					$('#city_id').append('<option value="'+element.id+'" '+select2+'>'+element.name+'</option>')
    				});


					var idcityactual = $('#city_id').val();
					$.ajax({
						method: "GET",
						url: "{{ route('zonas-by-ciudad') }}",
						data: { 
							id: idcityactual
						},
						success: function(result){
							var select3;
		    				result.forEach(function(element){
		    					if (element.id == {{$establishment->zone_id}}) {
		    						select3 = 'selected';
		    					} else {
		    						select3 = '';
		    					}
		    					$('#zone_id').append('<option value="'+element.id+'" '+select3+'>'+element.name+'</option>')
		    				});
		  				}
		  			});



  				}
  			});
  		}
  	});

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
	});


	

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
<script src='{{ asset('js/establishments/maps.js') }}'></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzMDCfcjxmZhdg2aBmnlspfyQjT2JyrH8&callback=initMap&libraries=places"></script>
@stop
