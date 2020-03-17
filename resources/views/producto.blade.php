@extends('layouts.public')

@section('title', 'Ofertas Gastronomicas - ExperienciaBOD')

@section('head')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<link rel="stylesheet" id="elementor-post-1070-css" href="{{ asset('css/public/post-1070.css') }}" type="text/css" media="all">
<link rel="stylesheet" id="woorousell-css" href="{{ asset('css/public/core.css') }}" type="text/css" media="all">
<link rel="stylesheet" id="font-awesome-css" href="{{ asset('css/public/font-awesome.css') }}" type="text/css" media="all">
<link rel="stylesheet" id="customify-style-css" href="{{ asset('css/public/style_002.css') }}" type="text/css" media="all">
<link rel="stylesheet" id="customify-style-inline-css-ofertas" href="{{ asset('css/public/customify-ofertasgastronomicas.css') }}" type="text/css" media="all">
<script type="text/javascript" src="{{ asset('js/public/jquery_002.js') }}"></script>
@endsection 
@section('content')
<div class="container mx-auto">
	<div class="">
		<span>CARACAS | CENA EN CASA LÍA</span>
		<div class="">
			<div>
				<i></i> <h1>Cena para dos en Casa lía</h1>
			</div>
			<span>(Altamira village)</span>  
		</div>
	</div>
	<div class="row">
		{{-- imagen producto --}}
		<div class="col-sm-12 col-md-4">
			<div class="wc-product--images">
				<figure class="woocommerce-product-gallery__wrapper ">
					<div data-thumb="https://experienciasbod.com/wp-content/uploads/2020/01/GIFTAlmuerzoLaMascara-100x100.png" data-thumb-alt="" class="woocommerce-product-gallery__image"><a href="https://experienciasbod.com/wp-content/uploads/2020/01/GIFTAlmuerzoLaMascara.png"><img width="400" height="464" src="https://experienciasbod.com/wp-content/uploads/2020/01/GIFTAlmuerzoLaMascara.png" class="wp-post-image" alt="" title="GIFTAlmuerzoLaMascara" data-caption="" data-src="https://experienciasbod.com/wp-content/uploads/2020/01/GIFTAlmuerzoLaMascara.png" data-large_image="https://experienciasbod.com/wp-content/uploads/2020/01/GIFTAlmuerzoLaMascara.png" data-large_image_width="400" data-large_image_height="464" srcset="https://experienciasbod.com/wp-content/uploads/2020/01/GIFTAlmuerzoLaMascara.png 400w, https://experienciasbod.com/wp-content/uploads/2020/01/GIFTAlmuerzoLaMascara-259x300.png 259w" sizes="(max-width: 400px) 100vw, 400px"></a></div>		</figure>
				</div>
			</div>
			{{-- precio y botones de accion --}}
			<div class="col-sm-12 col-md-3">
				<strong class="discount_price">$12.00</strong>
				<small class="price">15.00$</small>
				<div class="input-group">
					<span class="input-group-btn">
						<button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
							<span class="glyphicon glyphicon-minus"></span>
						</button>
					</span>
					<input type="text" name="quant[1]" class="form-control input-number" value="1" min="1" max="10">
					<span class="input-group-btn">
						<button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
							<span class="glyphicon glyphicon-plus"></span>
						</button>
					</span>
				</div>
			</div>
			{{-- descripcion del producto --}}
			<div class="col-sm-12 col-md-5">
				<p>¡En La Máscara te deleitarás con los sabores mexicanos! Con esta Gift Card disfruta un servicio de entrada unos deliciosos nachos acompañados de chili</p>
				<p>Como plato principal, deliciosas fajitas para dos personas, acompañados de unos refrescantes jugos naturales.</p>
				<p>Para cerrar con un toque dulce, puedes pedir de postre un plato de churros para compartir.</p>
			</div>
		</div>
	</div>
	@endsection
	@section('foot')
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

	<script>
//plugin bootstrap minus and plus
//http://jsfiddle.net/laelitenetwork/puJ6G/
$('.btn-number').click(function(e){
	e.preventDefault();

	fieldName = $(this).attr('data-field');
	type      = $(this).attr('data-type');
	var input = $("input[name='"+fieldName+"']");
	var currentVal = parseInt(input.val());
	if (!isNaN(currentVal)) {
		if(type == 'minus') {

			if(currentVal > input.attr('min')) {
				input.val(currentVal - 1).change();
			} 
			if(parseInt(input.val()) == input.attr('min')) {
				$(this).attr('disabled', true);
			}

		} else if(type == 'plus') {

			if(currentVal < input.attr('max')) {
				input.val(currentVal + 1).change();
			}
			if(parseInt(input.val()) == input.attr('max')) {
				$(this).attr('disabled', true);
			}

		}
	} else {
		input.val(0);
	}
});
$('.input-number').focusin(function(){
	$(this).data('oldValue', $(this).val());
});
$('.input-number').change(function() {

	minValue =  parseInt($(this).attr('min'));
	maxValue =  parseInt($(this).attr('max'));
	valueCurrent = parseInt($(this).val());

	name = $(this).attr('name');
	if(valueCurrent >= minValue) {
		$(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
	} else {
		alert('Sorry, the minimum value was reached');
		$(this).val($(this).data('oldValue'));
	}
	if(valueCurrent <= maxValue) {
		$(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
	} else {
		alert('Sorry, the maximum value was reached');
		$(this).val($(this).data('oldValue'));
	}


});
$(".input-number").keydown(function (e) {
				// Allow: backspace, delete, tab, escape, enter and .
				if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
						 // Allow: Ctrl+A
						 (e.keyCode == 65 && e.ctrlKey === true) || 
						 // Allow: home, end, left, right
						 (e.keyCode >= 35 && e.keyCode <= 39)) {
								 // let it happen, don't do anything
								return;
							}
				// Ensure that it is a number and stop the keypress
				if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
					e.preventDefault();
				}
			});
		</script>

		@endsection