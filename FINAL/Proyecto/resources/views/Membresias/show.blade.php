<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <strong>ID:</strong>
            {{ $membresia->MembresiaID }}
        </div>
        <div class="col-md-6">
            <strong>Tipo:</strong>
            {{ $membresia->Tipo }}
        </div>
        <div class="col-md-6">
            <strong>Precio:</strong>
            ${{ $membresia->Precio }}
        </div>
        <div class="col-md-6">
            <strong>Cantidad de Clases Incluidas:</strong>
            {{ $membresia->CantidadClasesIncluidas }}
        </div>
        <div class="col-md-6">
            <strong>Descripción:</strong>
            {{ $membresia->Descripcion }}
        </div>
    </div>
</div>
