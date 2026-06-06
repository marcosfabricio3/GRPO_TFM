<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <strong>ID:</strong>
            {{ $socio->SocioID }}
        </div>
        <div class="col-md-6">
            <strong>Nombre:</strong> 
            {{ $socio->Nombre }}
        </div>
        <div class="col-md-6">
            <strong>Documento:</strong>
            {{ $socio->DocumentoIdentidad }}
        </div>
        <div class="col-md-6">
            <strong>Email:</strong>
            {{ $socio->Email }}
        </div>
        <div class="col-md-6">
            <strong>Teléfono:</strong>
            {{ $socio->Telefono }}
        </div>
        <div class="col-md-6">
            <strong>Activo:</strong>
            @if($socio->Activo)
                Sí
            @else
                No
            @endif
        </div>
    </div>
</div>