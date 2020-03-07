var idMarca
var button
$(document).on("click", ".delete", function () {
	idMarca = $(this).attr('data-id')
	button = $(this)
});
$(document).on("click", "#delete", function () {
	let form = $(this).parents('form')
	let ruta = form.attr('action') + idMarca
	console.log(ruta)
	$.ajax({
		url: 'http://localhost:8000/admin/marcas/' + idMarca,
		type: 'DELETE',
		dataType: 'json',
		data: form.serialize(),
		success: function( response ){
			$('.message-response').html( response.message )
            // desaparecer el registro
            $(button).parents('tr').fadeOut();
		}
	})

});
