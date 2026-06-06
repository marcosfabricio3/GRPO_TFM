<form id="formEditarSocio" class="form-control" method="PUT">
<div class="container mt-3">
    <div class="mb-3">
        <label for="Nombre">Nombre:</label>
        <input type="text" class="form-control" id="Nombre" name="Nombre" value="{{ $socio->Nombre }}" required placeholder="Ingrese el nombre del socio">     
    </div>
    <div class="mb-3">
        <label for="DocumentoIdentidad">Documento de Identidad:</label>
        <input type="text" class="form-control" id="DocumentoIdentidad" name="DocumentoIdentidad" value="{{ $socio->DocumentoIdentidad }}" placeholder="Ingrese el documento de identidad del socio">
    </div>
    <div class="mb-3" mt-3>
        <label for="Email">Email:</label>
        <input type="email" class="form-control"  id="Email" name="Email" value="{{ $socio->Email }}" placeholder="Ingrese el email del socio">
    </div>
    <div class="mb-3">
        <label for="Telefono">Telefono:</label>
        <input type="text" class="form-control" id="Telefono" name="Telefono" value="{{ $socio->Telefono }}" placeholder="Ingrese el telefono del socio">
    </div>
    <div class="mb-3">
        <label for="FechaNacimiento">Fecha de Nacimiento:</label>
        <input type="date" class="form-control" id="FechaNacimiento" name="FechaNacimiento" value="{{ $socio->FechaNacimiento }}">        
    </div>
    <div class="mb-3">
        <label for="activo">Activo:</label>
        <input type="checkbox" id="activo" name="activo" {{ $socio->Activo ? 'checked' : '' }}>
    </div>
</div>
</form>