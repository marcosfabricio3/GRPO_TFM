<form id="formEditarAsistencia" method="PUT">
    <div class="container mb-3">
        <div class="mb-3">
            <label for="SocioID" class="form-label">Socio:</label>
            <select class="form-select" id="SocioID" name="SocioID" required>
                <option value="">--Seleccione un socio--</option>
                @foreach($socios as $socio)
                    <option value="{{ $socio->SocioID }}" @if ($asistencia->SocioID == $socio->SocioID) selected @endif>{{ $socio->DocumentoIdentidad }} - {{ $socio->Nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="ClaseID" class="form-label">Clase:</label>
            <select class="form-select" id="ClaseID" name="ClaseID" required>
                <option value="">--Seleccione una clase--</option>
                @foreach($clases as $clase)
                    <option value="{{ $clase->ClaseID }}" @if ($asistencia->ClaseID == $clase->ClaseID) selected @endif>{{ $clase->Nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="FechaEntrada" class="form-label">Fecha Entrada:</label>
            <input type="datetime-local" class="form-control" id="FechaEntrada" name="FechaEntrada" value="{{ str_replace(' ', 'T', substr($asistencia->FechaEntrada, 0, 16)) }}" required>
        </div>
        <div class="mb-3">
            <label for="FechaSalida" class="form-label">Fecha Salida:</label>
            <input type="datetime-local" class="form-control" id="FechaSalida" name="FechaSalida" value="{{ $asistencia->FechaSalida ? str_replace(' ', 'T', substr($asistencia->FechaSalida, 0, 16)) : '' }}">
        </div>
    </div>
</form>