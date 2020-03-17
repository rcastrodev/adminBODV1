<!-- /.row -->
<div class="row">
	<div class="col-sm-12 col-md-6">
		<div class="form-group">
			<div class="input-group">
				<div class="custom-file">
					<input type="file" class="custom-file-input" name="galery" id="galery">
					<label class="custom-file-label" for="galery"></label>
				</div>
				<div class="input-group-append">
					<span class="input-group-text" id="">Agregar Imagen</span>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="row">
	<div class="col-sm-12 col-md-3">
		<div class="form-group">
			<img src="{{ asset('img/public/image-placeholder.jpg') }}" style="width: 100%;">
			<input type="text" name="name" class="form-control" value="{{ old('name') }}" id="" placeholder="">
		</div>
	</div>

	<div class="col-sm-12 col-md-3">
		<div class="form-group">
			<img src="{{ asset('img/public/image-placeholder.jpg') }}" style="width: 100%;">
			<input type="text" name="name" class="form-control" value="{{ old('name') }}" id="" placeholder="">
		</div>
	</div>

	<div class="col-sm-12 col-md-3">
		<div class="form-group">
			<img src="{{ asset('img/public/image-placeholder.jpg') }}" style="width: 100%;">
			<input type="text" name="name" class="form-control" value="{{ old('name') }}" id="" placeholder="">
		</div>
	</div>

	<div class="col-sm-12 col-md-3">
		<div class="form-group">
			<img src="{{ asset('img/public/image-placeholder.jpg') }}" style="width: 100%;">
			<input type="text" name="name" class="form-control" value="{{ old('name') }}" id="" placeholder="">
		</div>
	</div>
</div>