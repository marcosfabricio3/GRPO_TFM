@extends('layouts.app')
@section('title', 'Listado de Instructores')
@vite(['resources/js/instructores/main-actions.js', 'resources/css/person_status.css'])
@section('content')
@section('instructor_active', 'link-secondary')
<x-nav-bar />
<h1>Lista de Instructores</h1>
<button type="button" class="btn btn-primary" onclick="window.location='{{ route('instructores.create') }}'" >Registrar nuevo Instructor</button>
<br><br>
<table class="table table-striped table-hover table-bordered table-sm table-responsive">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Especialidad</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($instructores as $instructor)
        <tr>
            <td>{{ $instructor->Nombre }}</td>
            <td>{{ $instructor->Especialidad }}</td>
            <td>
                @if($instructor->Activo)
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
                    <button type="button" class="btn btn-success abrir-modal" data-id="{{ $instructor->InstructorID }}" data-url="{{ route('instructores.show', $instructor->InstructorID) }}" data-action="" data-title="Detalle del Instructor" data-confirm-text="Cerrar">Ver</button>
                    <button type="button" class="btn btn-warning abrir-modal" data-id="{{ $instructor->InstructorID }}" data-url="{{ route('instructores.edit', $instructor->InstructorID) }}" data-action="editarInstructor" data-title="Editar Instructor" data-confirm-text="Editar Instructor" data-cancel-text="Cancelar">Editar</button>
                    <button type="button" class="btn btn-danger  abrir-modal" data-id="{{ $instructor->InstructorID }}" data-url="{{ route('instructores.show', $instructor->InstructorID) }}" data-action="eliminarInstructor" data-title="Eliminar Instructor" data-confirm-text="Eliminar datos de Instructor" data-cancel-text="Cancelar" data-actionForDelete="true">Eliminar</button>
                </div>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection