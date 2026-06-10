@extends('layouts.app')
@section('title', 'Lista de socios')
@vite(['resources/js/socios/main-actions.js', 'resources/css/person_status.css'])
@section('content')
@section('socio_active', 'link-secondary')
<x-nav-bar />
<h1>Lista de Socios</h1>
<button type="button" class="btn btn-primary" onclick="window.location='{{ route('socios.create') }}'" >Registrar nuevo Socio</button>
<br><br>
<table class="table table-striped table-hover table-bordered table-sm table-responsive">
    <thead>
        <tr>
            <th>Documento</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($socios as $socio)
            <tr>
                <td>{{ $socio->DocumentoIdentidad }}</td>
                <td>{{ $socio->Nombre }}</td>
                <td>{{ $socio->Email }}</td>
                <td>
                    @if($socio->Activo)
                    <svg class="animated-tick d-inline-block me-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                        <circle class="tick-circle" cx="26" cy="26" r="25" fill="none"/>
                        <path class="tick-check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                    </svg>
                    <span class="badge bg-success">Activo</span>
                    @else
                    <svg class="animated-cross d-inline-block me-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                        <circle class="cross-circle" cx="26" cy="26" r="25" fill="none"/>
                        <path class="cross-line" fill="none" d="M16 16 L36 36"/>
                        <path class="cross-line" fill="none" d="M36 16 L16 36"/>
                    </svg>
                    <span class="badge bg-danger">Inactivo</span>
                    @endif
                </td>
                <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-success abrir-modal" data-id="{{ $socio->SocioID }}" data-url="{{ route('socios.show', $socio->SocioID) }}" data-action="" data-title="Detalle del Socio" data-confirm-text="Cerrar">Ver</button>
                        <button type="button" class="btn btn-warning abrir-modal" data-id="{{ $socio->SocioID }}" data-url="{{ route('socios.edit', $socio->SocioID) }}" data-action="editarSocio" data-title="Editar socio" data-confirm-text="Editar socio" data-cancel-text="Cancelar">Editar</button>
                        <button type="button" class="btn btn-danger  abrir-modal" data-id="{{ $socio->SocioID }}" data-url="{{ route('socios.show', $socio->SocioID) }}" data-action="eliminarSocio" data-title="Eliminar socio" data-confirm-text="Eliminar datos de socio" data-cancel-text="Cancelar" data-actionForDelete="true">Eliminar</button>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection