
<form action="/admin/establishment/coordenadas" method="post" class="row mb-4 mb-2">
    @csrf
    <div class="col-sm-12 col-md-3 form-group">
        <input type="hidden" name="establishment_id" value="{{ $establishment->id }}">
        <input type="hidden" id="coords" name="coordenadas"  class="form-control" value="{{ $establishment->latitude }}, {{ $establishment->length }}">
        <button class="btn btn-sm btn-primary">Guardar posición</button> 
    </div>
    <div class="col-sm-12 col-md-9">
        <p>
            @if ($establishment->latitude)
                {{ 'La marca se encuenta en la dirección que tienes registrada, si deseas combiarla ubica el marcador en la nueva dirección y precionas el botón guardar' }}
            @else
                {{ 'No has agregado la dirección aun, si deseas combiarla ubica el marcador en la nueva dirección y precionas el botón guardar' }}
            @endif
        </p>
    </div>
</form>
<div id="map"></div>


