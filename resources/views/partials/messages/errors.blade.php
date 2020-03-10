@if ($errors->any())
	<div class="row">
		<div class="col-sm-12 alert alert-danger alert-dismissible">
			<button type="button" class="close" data-dismiss="alert">×</button>
			@foreach ($errors->all() as $error)
				<span class="mb-0 mr-1"> {{ $error }}, </span>
			@endforeach
		</div>		
	</div>
@endif
