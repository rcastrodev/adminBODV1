@if ($errors->any())
	<div class="row">
		<div class="col-sm-12 alert alert-danger alert-dismissible">
			<button type="button" class="close" data-dismiss="alert">×</button>
			@foreach ($errors->all() as $error)
				<p> {{ $error }} </p>
			@endforeach
		</div>		
	</div>
@endif
