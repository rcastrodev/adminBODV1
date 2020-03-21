<div class="row">
	<div class="col-sm-12 col-md-12" id="contentInventory">
		<div class="table-responsive">
			<table class="table" id="table-brands">
				<thead>
					<tr>
						<th>Localizador</th>
						<th>Estatus</th>
						<th>Acción</th>
					</tr>
				</thead>
				<tbody id="listInventory">
					@foreach($productocodigostock as $productocs)
					<tr id="inventory_{{ $productocs->id }}">
						<td>{{ $productocs->localizador }}<input type="hidden" name="inventario[]" value="{{ $productocs->localizador }}">
						</td>
						<td>
							@php
							if($productocs->estatus == 1){
								$estatus = 'Disponible';
								$disabled = '';
							} else {
								$estatus = 'Usado';
								$disabled = 'disabled';
							}
							@endphp
							{{ $estatus }}
						</td>
						<td>
							<button type="button" class="btn btn-sm btn-danger delete" onclick="eliminarInventory({{ $productocs->id }})" {{ $disabled }}><i class="far fa-trash-alt"></i>
							</button>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

<script type="text/javascript">
function eliminarInventory(numi) {
	$('#inventory_' + numi).remove();
}
</script>