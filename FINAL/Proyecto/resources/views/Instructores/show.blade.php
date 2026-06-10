<div class="container mt-3">
    <div class="mb-3">
        <label class="form-label">Nombre:</label>
        <input disabled type="text" class="form-control" value="{{ $instructor->Nombre }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Especialidad:</label>
        <input disabled type="text" class="form-control" value="{{ $instructor->Especialidad }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Email:</label>
        <input disabled type="text" class="form-control" value="{{ $instructor->Email }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Telefono:</label>
        <input disabled type="text" class="form-control" value="{{ $instructor->Telefono }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Activo:</label>
        <input disabled type="text" class="form-control" value="{{ $instructor->Activo ? 'Si' : 'No' }}">
    </div>
</div>