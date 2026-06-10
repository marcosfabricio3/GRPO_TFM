@extends('layouts.app')
@section('title', 'Listado de membresias')
@section('content')
@section('membresia_active', 'link-secondary')
@vite(['resources/js/membresias/main-actions.js'])
<x-nav-bar/>
<h1>Listado de Membresías</h1>
<button type="button" class="btn btn-primary" onclick="window.location='{{ route('membresias.create') }}'" >Registrar nueva Membresía</button>
<br><br>
<table class="table table-striped table-hover table-bordered table-sm table-responsive">
    <thead>
        <tr>
            <th>Descripción</th>
            <th>Tipo</th>
            <th>Precio</th>
            <th>Clases incluidas</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($membresias as $membresia)
            <tr>
                <td>{{ $membresia->Descripcion }}</td>
                <td>{{ $membresia->Tipo }}</td>
                <td>{{ $membresia->Precio }}</td>
                <td>{{ $membresia->CantidadClasesIncluidas }}</td>
                <td>
                    <div class="btn-group">
                        <button type="button" class="btn abrir-modal btn-success abrir-modal" data-id="{{ $membresia->MembresiaID }}" data-url="{{ route('membresias.show', $membresia->MembresiaID) }}" data-action="" data-title="Detalle de la membresia" data-confirm-text="Cerrar">Ver</button>
                        <button type="button" class="btn abrir-modal btn-warning abrir-modal" data-id="{{ $membresia->MembresiaID }}" data-url="{{ route('membresias.edit', $membresia->MembresiaID) }}" data-action="editarMembresia" data-title="Editar membresia" data-confirm-text="Editar membresia" data-cancel-text="Cancelar">Editar</button>
                        <button type="button" class="btn abrir-modal btn-danger  abrir-modal" data-id="{{ $membresia->MembresiaID }}" data-url="{{ route('membresias.show', $membresia->MembresiaID) }}" data-action="eliminarMembresia" data-title="Eliminar membresia" data-confirm-text="Eliminar membresia" data-cancel-text="Cancelar" data-actionForDelete="true">Eliminar</button>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection