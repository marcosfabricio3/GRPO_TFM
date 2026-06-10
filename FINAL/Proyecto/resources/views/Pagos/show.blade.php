<div class="container mt-3">
    <div class="mb-3">
        <div class="mb-3">
            <label class="form-label">Inscripción:</label>
            <input disabled type="text" class="form-control" value="{{ $pago->inscripcion?->socio?->DocumentoIdentidad }} / {{ $pago->inscripcion?->membresia?->Descripcion }}">
        </div>
            <label class="form-label">Monto:</label>
            <input disabled type="text" class="form-control" value="{{ $pago->Monto }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Medio de Pago:</label>
            <input disabled type="text" class="form-control" value="{{ $pago->MedioPago }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Fecha:</label>
            <input disabled type="text" class="form-control" value="{{ \Carbon\Carbon::parse($pago->FechaPago)->format('d/m/Y H:i') }}">
        </div>
    </div>
</div>