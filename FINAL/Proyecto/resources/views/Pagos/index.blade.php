@extends('layouts.app')
@section('title', 'Listado de Pagos')
@vite(['resources/js/pagos/main-actions.js'])
@section('content')
@section('pago_active', 'link-secondary')
<x-nav-bar />
<h1>Lista de Pagos</h1>
<button type="button" class="btn btn-primary" onclick="window.location='{{ route('pagos.create') }}'" >Registrar nuevo Pago</button>
<br><br>
<table class="table table-striped table-hover table-bordered table-sm table-responsive">
    <thead>
        <tr>
            <th>Inscripcion</th>
            <th>Medio de Pago</th>
            <th>Monto</th>
            <th>Fecha</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pagos as $pago)
            <tr>
                <td>
                    @if($pago->InscripcionID)
                        {{ $pago->inscripcion?->socio?->DocumentoIdentidad}} / {{ $pago->inscripcion?->membresia?->Descripcion }}
                    @endif
                </td>
                <td>{{ $pago->MedioPago }}</td> 
                <td>{{ $pago->Monto }}</td>
                <td>{{ \Carbon\Carbon::parse($pago->Fecha)->format('d-m-Y H:i') }}</td>
                <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-success abrir-modal" data-id="{{ $pago->PagoID }}" data-url="{{ route('pagos.show', $pago->PagoID) }}" data-action="" data-title="Detalle del Pago" data-confirm-text="Cerrar">Ver</button>
                        <button type="button" class="btn btn-warning abrir-modal" data-id="{{ $pago->PagoID }}" data-url="{{ route('pagos.edit', $pago->PagoID) }}" data-action="editarPago" data-title="Editar Pago" data-confirm-text="Editar Pago" data-cancel-text="Cancelar">Editar</button>
                        <button type="button" class="btn btn-danger  abrir-modal" data-id="{{ $pago->PagoID }}" data-url="{{ route('pagos.show', $pago->PagoID) }}" data-action="eliminarPago" data-title="Eliminar Pago" data-confirm-text="Eliminar datos de pago" data-cancel-text="Cancelar" data-actionForDelete="true">Eliminar</button>
                    </div>
                </td>
            </tr>            
        @endforeach
    </tbody>
</table>
@endsection