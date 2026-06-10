<form id="formEditarMembresia" method="PUT">
    <div class="container mt-3">
        <div class="mb-3">
            <label for="Tipo" class='form-label'>Tipo de Membresia:</label>
            <select class="form-select" id="Tipo" name="Tipo"" required>
                <option value="Mensual" @if ($membresia->Tipo == 'Mensual') selected @endif>Mensual</option>
                <option value="Trimestral" @if ($membresia->Tipo == 'Trimestral') selected @endif>Trimestral</option>
                <option value="Anual" @if ($membresia->Tipo == 'Anual') selected @endif>Anual</option>
                <option value="Clase Suelta" @if ($membresia->Tipo == 'Clase Suelta') selected @endif>Clase Suelta</option>
            </select>
        </div>    
        <div class="mb-3">
            <label for="Descripcion" class='form-label'>Descripción:</label>
            <input type="text" class="form-control" id="Descripcion" name="Descripcion" value="{{ $membresia->Descripcion }}" placeholder="Ingrese la descripcion de la membresia">
        </div>
        <div class="mb-3">
            <label for="Precio" class='form-label'>Precio:</label>
            <input type="number" class="form-control" id="Precio" name="Precio" value="{{ $membresia->Precio }}" placeholder="Ingrese el precio de la membresia">
        </div>
        <div class="mb-3">
            <label for="CantidadClasesIncluidas" class='form-label'>Cantidad de Clases Incluidas:</label>
            <input type="number" class="form-control" id="CantidadClasesIncluidas" name="CantidadClasesIncluidas" value="{{ $membresia->CantidadClasesIncluidas }}" placeholder="Ingrese la cantidad de clases incluidas">
        </div>
    </div>
</form>