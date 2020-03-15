<form action="/admin/marcas/guardar-galeria-de-establecimiento" method="post" class="card card-default mt-5" enctype="multipart/form-data">
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
			<div class="col-sm-12 col-md-6">
				<div class="form-group">
					<label for="name">Imágen</label>
					<div class="input-group">
						<div class="custom-file">
							<input type="file" name='img1' class="custom-file-input" id="img1">
							<label class="custom-file-label" for="img1">Imágen</label>
						</div>
						<div class="input-group-append">
							<span class="input-group-text" id="">Subir</span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="name">Imágen</label>
					<div class="input-group">
						<div class="custom-file">
							<input type="file" name='img2' class="custom-file-input" id="img2">
							<label class="custom-file-label" for="img2">Imágen</label>
						</div>
						<div class="input-group-append">
							<span class="input-group-text" id="">Subir</span>
						</div>
					</div>					
				</div>
				<div class="form-group">
					<label for="name">Imágen</label>
					<div class="input-group">
						<div class="custom-file">
							<input type="file" name='img3' class="custom-file-input" id="img3">
							<label class="custom-file-label" for="img3">Imágen</label>
						</div>
						<div class="input-group-append">
							<span class="input-group-text" id="">Subir</span>
						</div>
					</div>					
				</div>					
			</div>
			<div class="col-sm-12 col-md-6">
				<div class="form-group">
					<label for="ordenImg1">Ordén</label>
					<input type="text" name="ordenImg1" class="form-control disable" id="ordenImg1" readonly="" value="AA">
				</div>
				<div class="form-group">
					<label for="ordenImg2">Ordén</label>
					<input type="text" name="ordenImg2" class="form-control disable" id="ordenImg2" readonly="" value="BB">
				</div>
				<div class="form-group">
					<label for="ordenImg3">Ordén</label>
					<input type="text" name="ordenImg3" class="form-control disable" id="ordenImg3" readonly="" value="CC">
				</div>
			</div>
		</div>
		<div class="col-12">
			<button type="submit" class="btn btn-sm btn-primary">Subir imágenes</button>
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
	<div class="card-body">
		<div class="row">
			@forelse($images as $images)
				<div class="col-sm-12 col-md-4">
					<img src="{{ asset("img/$images->ruta") }}" alt="" class="img-fluid">
				</div>
			@empty
				<div class="col-12">Sin registro</div>
			@endforelse					
		</div>

	</div>
	<div class="card-footer"></div>
</div>