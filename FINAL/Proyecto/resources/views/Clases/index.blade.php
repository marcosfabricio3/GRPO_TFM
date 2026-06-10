@extends('layouts.app')
@section('title', 'Listado de Clases')
@section('content')
@section('clase_active', 'link-secondary')
@vite(['resources/js/clases/main-actions.js'])
<x-nav-bar />
<h1>Listado de Clases</h1>
<button type="button" class="btn btn-primary" onclick="window.location='{{ route('clases.create') }}'" >Registrar nueva Clase</button>
<br><br>
<table class="table table-striped table-hover table-bordered table-sm table-responsive">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Instructor a cargo</th>
            <th>Días de la semana</th>
            <th>Horario</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($clases as $clase)
        <tr>
            <td>{{ $clase->Nombre }}</td>
            <td>{{ $clase->Tipo }}</td>
            <td>{{ $clase->instructor->Nombre }}</td>
            <td>{{ $clase->DiasSemana }}</td>
            <td>{{ \Carbon\Carbon::parse($clase->Horario)->format('H:i') }}</td>
            <td>
                <div class="btn-group">
                    <button type="button" class="btn btn-success abrir-modal" data-id="{{ $clase->ClaseID }}" data-url="{{ route('clases.show', $clase->ClaseID) }}" data-action="" data-title="Detalle de la clase" data-confirm-text="Cerrar">Ver</button>
                    <button type="button" class="btn btn-warning abrir-modal" data-id="{{ $clase->ClaseID }}" data-url="{{ route('clases.edit', $clase->ClaseID) }}" data-action="editarClase" data-title="Editar clase" data-confirm-text="Editar clase" data-cancel-text="Cancelar">Editar</button>
                    <button type="button" class="btn btn-danger  abrir-modal" data-id="{{ $clase->ClaseID }}" data-url="{{ route('clases.show', $clase->ClaseID) }}" data-action="eliminarClase" data-title="Eliminar clase" data-confirm-text="Eliminar clase" data-cancel-text="Cancelar" data-actionForDelete="true">Eliminar</button>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection