<div class="container mt-3">
    <div class="mb-3">
        <div class="mb-3">
            <label class="form-label">Socio:</label>
            <input disabled type="text" class="form-control" value="{{ $asistencia->socio?->DocumentoIdentidad }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Clase:</label>
            <input disabled type="text" class="form-control" value="{{ $asistencia->clase?->Nombre }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Fecha entrada:</label>
            <input disabled type="text" class="form-control" value="{{ \Carbon\Carbon::parse($asistencia->FechaEntrada)->format('d/m/Y H:i') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Fecha salida:</label>
            <input disabled type="text" class="form-control" value="{{ $asistencia->FechaSalida
                ? \Carbon\Carbon::parse($asistencia->FechaSalida)->format('d/m/Y H:i')
                : 'Sin salida registrada' }}">
        </div>
    </div>
</div>