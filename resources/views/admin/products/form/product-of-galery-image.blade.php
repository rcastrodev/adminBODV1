<!-- /.row -->
<div class="row">
	<div class="col-sm-12 col-md-6">
		<div class="form-group">
			<div class="input-group">
				<div class="custom-file" id="listInput">
					<input type="file" class="custom-file-input" name="galery[]" id="galery_1" onchange="filePreviewImagen(this);">
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
      $('#listGalery').append('<div class="col-sm-12 col-md-3"><div class="form-group"><img src="'+e.target.result+'" style="width: 100%;"><input type="text" name="name" class="form-control" value="" id="" placeholder=""></div></div>');
    }
    reader.readAsDataURL(input.files[0]);
    
    $('#galery_'+num).hide();
    num++;
    
    $('#listInput').append('<input type="file" class="custom-file-input" name="galery[]" id="galery_'+num+'" onchange="filePreviewImagen(this);">')
  }
  
}
</script>