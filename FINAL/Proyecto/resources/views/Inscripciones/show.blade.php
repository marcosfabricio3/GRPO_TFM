<div class="container-fluid">
    <div class="row">
        @switch($inscripcion->Estado)
            @case('Activa')
                <div class="alert alert-success text-center">Esta inscripción esta activa.</div>
                @break
            @case('Vencida')
                <div class="alert alert-warning text-center">Esta inscripción ha vencido.</div>
                @break
            @case('Cancelada')
                <div class="alert alert-danger text-center">Esta inscripción ha sido cancelada.</div>
                @break
        @endswitch
    </div>
    <br>
    <div class="row">
        <h5 class="col-md-12">Información sobre el Socio</h5>
        <div class="col-md-6">
            <strong>Nombre: </strong>{{ $inscripcion->socio?->Nombre }}
        </div>
        <div class="col-md-6">
            <strong>Documento: </strong>{{ $inscripcion->socio?->DocumentoIdentidad }}
        </div>
    </div>
    <br>
    <div class="row">
        <h5 class="col-md-12">Información sobre la Membresia</h5>
        <div class="col-md-12">
            <strong>Membresia: </strong>{{ $inscripcion->membresia?->Descripcion }}
        </div>
        <div class="col-md-6">
            <strong>Fecha de Inscripción: </strong>{{ \Carbon\Carbon::parse($inscripcion->FechaInscripcion)->format('d/m/Y H:i') }}
        </div>
        <div class="col-md-6">
            <strong>Fecha de Vencimiento: </strong>{{ \Carbon\Carbon::parse($inscripcion->FechaVencimiento)->format('d/m/Y H:i') }}
        </div>
    </div>
    <br>
    @if($inscripcion->pagos->count() == 0)
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger text-center">No se han registrado pagos para esta inscripción.</div>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success text-center">Existen pagos registrados para esta inscripción.</div>
            </div>
            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#pagos" aria-expanded="false" aria-controls="pagos">
                Ver pagos asociados
            </button>
            @forelse($inscripcion->pagos as $pago)
                <div class="collapse" id="pagos">
                    <div class="card card-body">
                        <div>
                            <strong>Medio de Pago: </strong> {{ $pago->MedioPago }}
                        </div>    
                        <div>
                            <strong>Monto: </strong> ${{ $pago->Monto }}
                        </div>
                        <div>
                            <strong>Fecha: </strong> {{ \Carbon\Carbon::parse($pago->FechaPago)->format('d/m/Y H:i') }}
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-danger text-center">No se han registrado pagos para esta inscripción.</div>
            @endforelse
        </div>
    @endif
</div>