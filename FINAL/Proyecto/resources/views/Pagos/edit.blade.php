<form id="formEditarPago" method="POST">
    <div class="container mt-3">
        <div class="mb-3">
            <label for="InscripcionID" class='form-label'>Inscripción:</label>
            <select class="form-select" id="InscripcionID" name="InscripcionID" required>
                <option value="">--Seleccione una inscripción--</option>
                @foreach($inscripciones as $inscripcion)
                    <option value="{{ $inscripcion->InscripcionID }}" {{ $pago->InscripcionID == $inscripcion->InscripcionID ? 'selected' : '' }} >{{ $inscripcion->socio?->DocumentoIdentidad }} / {{ $inscripcion->membresia?->Descripcion }}</option>
                    @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="MedioPago" class='form-label'>Medio de Pago:</label>
            <select class="form-select" id="MedioPago" name="MedioPago" required>
                <option value="">--Seleccione un medio de pago--</option>
                <option value="Efectivo" {{ $pago->MedioPago == 'Efectivo' ? 'selected' : '' }}>Efectivo</option>
                <option value="Tarjeta" {{ $pago->MedioPago == 'Tarjeta' ? 'selected' : '' }}>Tarjeta</option>
                <option value="Transferencia" {{ $pago->MedioPago == 'Transferencia' ? 'selected' : '' }}>Transferencia</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="Monto" class='form-label'>Monto:</label>
            <input type="number" class="form-control" id="Monto" name="Monto" value="{{ $pago->Monto }}" step="0.01" required>
        </div>
        <div class="mb-3">
            <label for="FechaPago" class='form-label'>Fecha Pago:</label>
            <input type="datetime-local" class="form-control" id="FechaPago" name="FechaPago" value="{{ str_replace(' ', 'T', substr($pago->FechaPago, 0, 16)) }}" required>
        </div>
    </div>
</form>