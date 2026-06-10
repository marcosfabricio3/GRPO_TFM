<form id="formEditarInscripcion" method="PUT">
    <div class="mb-3">
        <label for="SocioID" class='form-label'>Socio:</label>
        <select class="form-select" id="SocioID" name="SocioID" value="{{ $inscripcion->SocioID }}" required>
            @foreach($socios as $socio)    
                <option 
                    value="{{ $socio->SocioID }}" 
                    {{ $inscripcion->SocioID == $socio->SocioID ? 'selected' : '' }}>
                    {{ $socio->DocumentoIdentidad}} - {{ $socio->Nombre }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="MembresiaID" class='form-label'>Membresia:</label>
        <select class="form-select" id="MembresiaID" name="MembresiaID" value="{{ $inscripcion->MembresiaID }}" required>
            @foreach($membresias as $membresia)    
                <option 
                    value="{{ $membresia->MembresiaID }}" 
                    {{ $inscripcion->MembresiaID == $membresia->MembresiaID ? 'selected' : '' }}>
                    {{ $membresia->Descripcion }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="FechaInicio" class='form-label'>Fecha Inicio:</label>
        <input type="date" class="form-control" id="FechaInicio" name="FechaInicio" value="{{ $inscripcion->FechaInicio }}" required>
    </div>

    <div class="mb-3">
        <label for="FechaVencimiento" class='form-label'>Fecha Vencimiento:</label>
        <input type="date" class="form-control" id="FechaVencimiento" name="FechaVencimiento" value="{{ $inscripcion->FechaVencimiento }}" required>
    </div>

    <div class="mb-3">
        <label for="Estado class='form-label'">Estado:</label>
        <select class="form-select" id="Estado" name="Estado" value="{{ $inscripcion->Estado }}" required>
            <option value="Activa" {{ $inscripcion->Estado == 'Activa' ? 'selected' : '' }}>Activa</option>
            <option value="Vencida" {{ $inscripcion->Estado == 'Vencida' ? 'selected' : '' }}>Vencida</option>
            <option value="Cancelada" {{ $inscripcion->Estado == 'Cancelada' ? 'selected' : '' }}>Cancelada</option>
        </select>
    </div>
</form>