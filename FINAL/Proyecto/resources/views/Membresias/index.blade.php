@extends('layouts.app')
@section('title', 'Listado de membresias')
@section('content')
@section('membresia_active', 'link-secondary')
@vite(['resources/js/membresias.js'])
<x-nav-bar/>
<h1>Listado de Membresías</h1>
<button type="button" class="btn btn-primary" onclick="window.location='{{ route('membresias.create') }}'" >Registrar nueva Membresía</button>
<br><br>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Descripción</th>
            <th>Tipo</th>
            <th>Clases incluidas</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($membresias as $membresia)
            <tr>
                <td>{{ $membresia->Descripcion }}</td>
                <td>{{ $membresia->Tipo }}</td>
                <td>{{ $membresia->CantidadClasesIncluidas }}</td>
                <td>${{ $membresia->Precio }}</td>
                <td>
                    <div class="btn-group">
                        <button type="button"class="btn abrir-modal btn-success" data-url="{{ route('membresias.show', $membresia->MembresiaID) }}" data-action="" data-title="Detalle de la membresia" data-confirm-text="Cerrar">Ver</button>
                        <button type="button" class="btn abrir-modal btn-warning" data-url="{{ route('membresias.edit', $membresia->MembresiaID) }}" data-action="editarMembresia" data-confirm-text="Editar membresia" data-id="{{ $membresia->MembresiaID }}" data-title="Editar membresia">Editar</button>
                        <button type="button" class="btn abrir-modal btn-danger" data-url="{{ route('membresias.show', $membresia->MembresiaID) }}"  data-action="eliminarMembresia" data-confirm-text="Eliminar membresia" data-id="{{ $membresia->MembresiaID }}" data-title="Eliminar membresia" >Eliminar</button>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection