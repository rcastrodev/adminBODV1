<!-- Modal -->
<form action="/admin/zonas/" method="post" class="modal fade" id="marcaModal" tabindex="-1" role="dialog" aria-labelledby="marcaModalLabel" aria-hidden="true">
	@csrf
	@method('DELETE')
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="marcaModalLabel">Seguro desea eliminar</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal" id="delete">Si</button>
			</div>
		</div>
	</div>
</form>