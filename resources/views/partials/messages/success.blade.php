@if (\Session::has('mensaje'))
<div class="alert alert-primary alert-dismissible fade show" role="alert">
	{{ $mensaje }}
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
@endif