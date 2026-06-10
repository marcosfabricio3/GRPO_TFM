@extends('layouts.app')
@section('title', 'Listado de Inscripciones')
@section('content')
@section('inscripcion_active', 'link-secondary')
@vite(['resources/js/inscripciones/main-actions.js'])
<x-nav-bar/>
<h1>Listado de Inscripciones</h1>
<button type="button" class="btn btn-primary" onclick="window.location='{{ route('inscripciones.create') }}'" >Registrar nueva Inscripción</button>
<br><br>
<table class="table table-striped table-hover table-bordered table-sm table-responsive">
    <thead>
        <tr>
            <th>Socio</th>
            <th>Membresia</th>
            <th>Estado</th>
            <th>Fecha Inicio</th>
            <th>Fecha Vencimiento</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($inscripciones as $inscripcion)
        <tr>
            <td>{{ $inscripcion->socio->DocumentoIdentidad}} - {{ $inscripcion->socio->Nombre }}</td>
            <td>{{ $inscripcion->membresia?->Descripcion }}</td>
            <td>{{ $inscripcion->Estado }}</td>
            <td>{{ $inscripcion->FechaInicio }}</td>
            <td>{{ $inscripcion->FechaVencimiento }}</td>
            <td>
                <div class="btn-group">
                    <button type="button" class="btn btn-success abrir-modal" data-id="{{ $inscripcion->InscripcionID }}" data-url="{{ route('inscripciones.show', $inscripcion->InscripcionID) }}" data-action="" data-title="Detalle de la inscripcion" data-confirm-text="Cerrar">Ver</button>
                    <button type="button" class="btn btn-warning abrir-modal" data-id="{{ $inscripcion->InscripcionID }}" data-url="{{ route('inscripciones.edit', $inscripcion->InscripcionID) }}" data-action="editarInscripcion" data-title="Editar inscripcion" data-confirm-text="Editar inscripcion" data-cancel-text="Cancelar">Editar</button>
                    <button type="button" class="btn btn-danger  abrir-modal" data-id="{{ $inscripcion->InscripcionID }}" data-url="{{ route('inscripciones.show', $inscripcion->InscripcionID) }}" data-action="eliminarInscripcion" data-title="Eliminar inscripcion" data-confirm-text="Eliminar inscripcion" data-cancel-text="Cancelar" data-actionForDelete="true">Eliminar</button>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection