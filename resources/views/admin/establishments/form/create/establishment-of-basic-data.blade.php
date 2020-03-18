<form action="/admin/establecimientos" method="post" class="card card-default" enctype="multipart/form-data">
	@csrf
	<input type="hidden" name="user_id" value="{{ auth()->user()->id}}">
	<div class="card-header">
		<h3 class="card-title">Datos basicos de establecimientos <a href="/admin/establecimientos/" class="ml-3 btn btn-sm btn-primary">Ver establecimientos</a></h3>

		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
		</div>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<!-- /.row -->
		@include('partials.messages.errors')
		<div class="row">
			<div class="col-sm-12 col-md-6">
				<div class="form-group">
					<label for="brands_id">Franquicia</label>
					<select name="brand_id" class="form-control select2" style="width: 100%;">
						<option value="">Selecciona una Franquicia</option>
						@foreach ($brands as $brand)
						<option value="{{$brand->id}}">{{$brand->name}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="country_id">Pais (*)</label>
					<select name="country_id" class="form-control select2-p" style="width: 100%;">
						<option value="">Selecciona un país</option>
						@foreach ($countries as $country)
						<option value="{{$country->id}}">{{$country->name}}</option>
						@endforeach
					</select>
				</div>		
				<div class="form-group">
					<label for="city_id">Ciudad (*)</label>
					<select name="city_id" class="form-control select2 city" style="width: 100%;">
						<option value="">Seleccione una ciudad ...</option>
					</select>
				</div>
				<div class="form-group">
					<label for="name">Nombre del establecimiento (*)</label>
					<input type="text" name="name" class="form-control" value="{{ old('name') }}" id="" placeholder="">
				</div>
				<div class="form-group">
					<label for="reservation_email">Email de reservación (*)</label>
					<input type="text" name="reservation_email" class="form-control" value="{{ old('reservation_email') }}" id="" placeholder="">
				</div>
				<div class="form-group">
					<label for="length">Longitud</label>
					<input type="text" name="length" class="form-control" value="{{ old('length') }}" id="" placeholder="">
				</div>

				<div class="form-group">
					<label for="main_image">Imágen principal (*)</label>
					<div class="input-group">
						<div class="custom-file">
							<input type="file" class="custom-file-input" name="main_image" id="main_image">
							<label class="custom-file-label" for="main_image"></label>
						</div>
						<div class="input-group-append">
							<span class="input-group-text" id="">Upload</span>
						</div>
					</div>
				</div>
				<div class="form-group d-flex justify-content-between">
					<div class="custom-control custom-switch">
						<input type="checkbox" class="custom-control-input" name="admit_reservation" id="admit_reservation">
						<label class="custom-control-label" for="admit_reservation">Admite reservacón ?</label>
					</div>
					<div class="custom-control custom-switch">
						<input type="checkbox" class="custom-control-input" name="publish_on_the_web" id="publish_on_the_web">
						<label class="custom-control-label" for="publish_on_the_web">Publicar en la web ?</label>
					</div>
				</div>
				<div class="form-group">
					<label for="linear_discount">Descuento lineal</label>
					<input type="number" name="linear_discount" min="0" max="100" class="form-control" id="" placeholder="" value="{{ old('linear_discount') }}">
				</div>
			</div>
			<div class="col-sm-12 col-md-6">
				<div class="form-group">
					<label for="type_id">Tipo (*)</label>
					<select name="type_id" class="form-control select2" style="width: 100%;">
						<option value="">Selecciona una Gastronomía</option>
						@foreach ($types as $type)
						<option value="{{$type->id}}">{{$type->name}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="region_id">Departamento o Estado (*)</label>
					<select name="region_id" class="form-control select2 region" style="width: 100%;">
						<option value="">Seleccione un estado ...</option>
					</select>
				</div>
				<div class="form-group">
					<label for="zone_id">Zona (*)</label>
					<select name="zone_id" class="form-control select2 zone" style="width: 100%;">
						<option value="">Seleccione una zona ...</option>
					</select>
				</div>
				<div class="form-group">
					<label for="owner_name">Nombre del propietario (*)</label>
					<input type="text" name="owner_name" value="{{ old('owner_name') }}" class="form-control" id="" placeholder="">
				</div>
				<div class="form-group">
					<label for="phone">Teléfono (*)</label>
					<input type="text" name="phone" value="{{ old('phone') }}" class="form-control" id="" placeholder="">
				</div>

				<div class="form-group">
					<label for="latitude">Latitud</label>
					<input type="text" name="latitude" value="{{ old('latitude') }}" class="form-control" id="" placeholder="">
				</div>
				<div class="form-group">
					<label for="logo">Logo del establecimiento</label>
					<div class="input-group">
						<div class="custom-file">
							<input type="file" class="custom-file-input" name="logo" id="logo">
							<label class="custom-file-label" for="logo"></label>
						</div>
						<div class="input-group-append">
							<span class="input-group-text" id="">Upload</span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="custom-control custom-switch">
						<input type="checkbox" class="custom-control-input" value="true" name="status" id="status">
						<label class="custom-control-label" for="status">Estatus</label>
					</div>
				</div>
				<div class="form-group">
					<label for="linear_discount">Rif (*)</label>
					<input type="text" name="rif" class="form-control" id="" placeholder="" value="{{ old('rif') }}">
				</div>
			</div>
			<div class="col-12">
				<div class="form-group">
					<label for="description">Descripción</label>
					<textarea name="description" id="" cols="10" rows="10">
						{{ old('description') }}
					</textarea>
				</div>
				<div class="form-group">
					<label for="address">Dirección (*)</label>
					<textarea name="address" id="" cols="10" rows="10">
						{{ old('address') }}
					</textarea>
				</div>
				<div class="form-group">
					<label for="menu">Menu</label>
					<textarea name="menu" id="" cols="30" rows="10">
						{{ old('menu') }}
					</textarea>
				</div>
			</div>
			<div class="col-12 mt-5">
				<button class="btn btn-sm btn-primary">Guardar datos básicos del establecimiento</button>
			</div>
		</div>
		<!-- /.row -->
	</div>
	<!-- /.card-body -->
	<div class="card-footer">
		<a href="https://loyalfeel.com/">Loyalfeel</a> 
	</div>
</form>

