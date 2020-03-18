<!-- /.row -->
<div class="row">
	<div class="col-sm-12 col-md-6">
		<div class="form-group">
			<div class="input-group">
				<div class="custom-file" id="listInput">
					<input type="file" class="custom-file-input" name="gallery[]" id="gallery_1" onchange="filePreviewImagen(this);">
					<label class="custom-file-label" for=""></label>
				</div>
				<div class="input-group-append">
					<span class="input-group-text" id="">Agregar Imagen</span>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="row" id="listGalery">
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
var num = 1;

function filePreviewImagen(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#listGalery').append('<div class="col-sm-12 col-md-3" id="itemGallery_'+num+'"><div class="form-group close1"><button type="button" class="closeButton1" onclick="eliminarGallery('+num+')"></button><img src="'+e.target.result+'" style="width: 100%;"><input type="text" name="ordenGallery[]" class="form-control" value="" id="" placeholder=""></div></div>');
    }
    reader.readAsDataURL(input.files[0]);
    
    $('#galery_'+num).prop('style', 'display:none');
    
    num++;
    
    $('#listInput').append('<input type="file" class="custom-file-input" name="gallery[]" id="gallery_'+num+'" onchange="filePreviewImagen(this);">')
  }
  
}

function eliminarGallery(id) {
	var num2 = id - 1;
	$('#itemGallery_' + id).remove();
	$('#gallery_'+ num2).remove();
}
</script>

<style>
.close1 {position:relative;}

.close1 .closeButton1 {
	top:0;
	right:0;
	position:absolute;
	background-image: url("{{ asset('img/public/eliminar.jpg') }}");
	background-color: #cccccc;
	height: 20px;
	width:20px;
	background-position: center;
	background-repeat: no-repeat;
	background-size: cover;
	border: none;
}
</style>