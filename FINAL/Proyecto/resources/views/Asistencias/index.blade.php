@extends('layouts.app')
@section('title', 'Lista de Asistencias')
@vite(['resources/js/asistencias/main-actions.js'])
@section('content')
@section('asistencia_active', 'link-secondary')
<x-nav-bar />
<h1>Lista de Asistencias</h1>
<button type="button" class="btn btn-primary" onclick="window.location='{{ route('asistencias.create') }}'" >Registrar nueva Asistencia</button>
<br><br>
<table class="table table-striped table-hover table-bordered table-sm table-responsive">
    <thead>
        <tr>
            <th>Socio</th>
            <th>Clase</th>
            <th>Fecha Entrada</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($asistencias as $asistencia)
            <tr>
                <td>{{ $asistencia->socio?->DocumentoIdentidad }}</td>
                <td>{{ $asistencia->clase?->Nombre }}</td>
                <td>{{ \Carbon\Carbon::parse($asistencia->FechaEntrada)->format('d/m/Y H:i') }}</td>
                <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-success abrir-modal" data-id="{{ $asistencia->AsistenciaID }}" data-url="{{ route('asistencias.show', $asistencia->AsistenciaID) }}" data-action="" data-title="Detalle de la Asistencia" data-confirm-text="Cerrar">Ver</button>
                        <button type="button" class="btn btn-warning abrir-modal" data-id="{{ $asistencia->AsistenciaID }}" data-url="{{ route('asistencias.edit', $asistencia->AsistenciaID) }}" data-action="editarAsistencia" data-title="Editar Asistencia" data-confirm-text="Editar Asistencia" data-cancel-text="Cancelar">Editar</button>
                        <button type="button" class="btn btn-danger  abrir-modal" data-id="{{ $asistencia->AsistenciaID }}" data-url="{{ route('asistencias.show', $asistencia->AsistenciaID) }}" data-action="eliminarAsistencia" data-title="Eliminar Asistencia" data-confirm-text="Eliminar datos de Asistencia" data-cancel-text="Cancelar" data-actionForDelete="true">Eliminar</button>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection