<div class="container mt-3">
    <div class="mb-3">
        <div class="mb-3">
            <label class="form-label">Descripción:</label>
            <input disabled type="text" class="form-control" value="{{ $membresia->Descripcion }}">
        </div>    
        <div class="mb-3">
            <label class="form-label">Tipo:</label>
            <input disabled type="text" class="form-control" value="{{ $membresia->Tipo }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Precio:</label>
            <input disabled type="text" class="form-control" value="{{ $membresia->Precio }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Cantidad de Clases Incluidas:</label>
            <input disabled type="text" class="form-control" value="{{ $membresia->CantidadClasesIncluidas ? $membresia->CantidadClasesIncluidas : 'No cuenta con clases incluidas' }}"> 
        </div>
    </div>
</div>
