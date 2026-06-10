<div class="container mt-3">
    <div class="mb-3">
        <div class="mb-3">
            <label class="form-label">Nombre:</label>
            <input disabled type="text" class="form-control" value="{{ $clase->Nombre }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Tipo:</label>
            <input disabled type="text" class="form-control" value="{{ $clase->Tipo }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Instructor:</label>
            <input disabled type="text" class="form-control" value="{{ $clase->instructor?->Nombre }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Días:</label>
            <input disabled type="text" class="form-control" value="{{ $clase->DiasSemana }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Horario:</label>
            <input disabled type="text" class="form-control" value="{{ \Carbon\Carbon::parse($clase->Horario)->format('H:i') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Cupo Máximo:</label>
            <input disabled type="text" class="form-control" value="{{ $clase->CupoMaximo }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Activa:</label>
            <input disabled type="text" class="form-control" value="{{ $clase->Activa ? 'Si' : 'No' }}">
        </div>
    </div>
</div>