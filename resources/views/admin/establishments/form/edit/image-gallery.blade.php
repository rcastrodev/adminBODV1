<form action="/admin/establecimientos/save-gallery-of-establishment" method="post" class="card card-default mt-5" enctype="multipart/form-data">
	@csrf
	<input type="hidden" name="establishment_id" value="{{$establishment->id}}">
	<div class="card-header">
		<h3 class="card-title">Galeria de imágenes</h3>
		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
		</div>			
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-sm-12 col-md-4">
				<div class="form-group">
					<label for="name">Imágen</label>
					<div class="input-group">
						<div class="custom-file">
							<input type="file" name='img' class="custom-file-input" id="img1">
							<label class="custom-file-label" for="img1">Imágen</label>
						</div>
						<div class="input-group-append">
							<span class="input-group-text" id="">Subir</span>
						</div>
					</div>
				</div>				
			</div>
			<div class="col-sm-12 col-md-4">
				<div class="form-group">
					<label for="ordenImg1">Ordén</label>
					<input type="text" name="order" class="form-control" id="ordenImg1" placeholder="Ingresar el ordén Ej AA|BB|CC">
				</div>
			</div>
			<div class="col-sm-12 col-md-4 d-flex justify-content-center align-items-center">
				<button type="submit" class="btn btn-sm btn-primary">Subir imágenes</button>
			</div>
		</div>
	</div>
	<div class="card-footer">
		<a href="https://loyalfeel.com/">Loyalfeel</a>
	</div>
</form>
<div class="card card-default">
	<div class="card-header">
		<span>Galería</span>
	</div>
	<div class="card-body row justify-content-center">
		@forelse($images as $imagen)
			<div class="col-sm-12 col-md-3 position-relative">
				<form action="/admin/establecimientos/delete-gallery-of-establishment/{{$imagen->id}}" method="post" class="position-absolute" style="top: -10px; left: -4px;">
					@csrf
					@method('DELETE')
					<button class="btn btn-sm btn-danger rounded-circle"><i class="far fa-trash-alt"></i></button>
				</form>
				<img src="{{ asset("img/$imagen->ruta") }}" alt="" class="img-fluid" style="max-width: 200px; min-height: 180px; min-width: 200px; max-width:180px; object-fit: cover;">
			</div>
		@empty
			<div>
				<span>No tiene galería</span>
			</div>				
		@endforelse
	</div>
	<div class="card-footer"></div>
</div>