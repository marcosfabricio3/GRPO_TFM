<div class="container mt-3">
    <div class="mb-3">
        <div class="mb-3">
            <label class="form-label">Documento:</label>
            <input disabled type="text" class="form-control" value="{{ $socio->DocumentoIdentidad }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Nombre:</label>
            <input disabled type="text" class="form-control" value="{{ $socio->Nombre }}">     
        </div>
        <div class="mb-3">
            <label class="form-label">Email:</label>
            <input disabled type="text" class="form-control" value="{{ $socio->Email }}">
        </div>
        <div class="mb-3">
            <label class="form-label"> Telefono:</label>
            <input disabled type="text" class="form-control" value="{{ $socio->Telefono }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Fecha de Nacimiento:</label>
            <input disabled type="date" class="form-control" value="{{ $socio->FechaNacimiento }}">        
        </div>
        <div class="mb-3">
            <label class="form-label">Activo:</label>
            <input disabled type="text" class="form-control" value="{{ $socio->Activo ? 'Si' : 'No' }}">
        </div>
    </div>
</div>