<form id="formEditarInstructor" method="PUT">
    <div class="mb-3">
        <label class='form-label' for="Nombre">Nombre</label>
        <input type="text" class="form-control" id="Nombre" name="Nombre"  value="{{ $instructor->Nombre }}" placeholder="Ingrese el nombre del instructor" required>
    </div>
    <div class="mb-3">
        <label class='form-label' for="Especialidad">Especialidad:</label>
        <input type="text" class="form-control" id="Especialidad" name="Especialidad" value="{{ $instructor->Especialidad }}" placeholder="Ingrese la especialidad del instructor" required>
    </div>
    <div class="mb-3">        
        <label class='form-label' for="Email">Email:</label>
        <input type="email" class="form-control" id="Email" name="Email" value="{{ $instructor->Email }}" placeholder="Ingrese el email del instructor" required>
    </div>
    <div class="mb-3">
        <label class='form-label' for="Telefono">Telefono:</label>
        <input type="tel" class="form-control" id="Telefono" name="Telefono" value="{{ $instructor->Telefono }}" placeholder="Ingrese el telefono del instructor" required>
    </div>
    <div class="mb-3 form-check form-switch">
        <input type="checkbox" class="form-check-input" id="Activo" name="Activo" {{ $instructor->Activo ? 'checked' : '' }}>
        <label class='form-check-label' for="Activo">Activo:</label>
    </div>
</form>   