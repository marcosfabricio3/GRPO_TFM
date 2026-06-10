@extends('layouts.app')
@section('title', 'Crear Nueva Clase')
@section('content')
@section('clase_active', 'link-secondary')
@vite(['resources/js/clases/create.js'])
<x-nav-bar />
<div class="container mt-3">
    <form id="formCrearClase" class="form-control" action="{{ route('clases.store') }}" method="POST">
        @csrf
        <h2>Crear Nueva Clase</h2>
        <div class="mb-">
            <label class='form-label' for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre de la clase" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="Tipo">Tipo</label>
            <select class="form-select" id="Tipo" name="Tipo" required>
                <option value="">--Seleccione un tipo de clase--</option>
                <option value="Musculación">Musculación</option>
                <option value="Yoga">Yoga</option>
                <option value="Crossfit">Crossfit</option>
                <option value="Pilates">Pilates</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label" for="InstructorID">Instructor</label>
            <select class="form-select" id="InstructorID" name="InstructorID" required>
                <option value="">--Seleccione un instructor--</option>
                @foreach($instructores as $instructor)
                    <option value="{{ $instructor->InstructorID }}">{{ $instructor->Nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label" for="DiasSemana">Días de la semana:</label>
            <select class="form-select" id="DiasSemana" name="DiasSemana[]" multiple>
                <option value="Lunes">Lunes</option>
                <option value="Martes">Martes</option>
                <option value="Miércoles">Miércoles</option>
                <option value="Jueves">Jueves</option>
                <option value="Viernes">Viernes</option>
                <option value="Sábado">Sábado</option>
                <option value="Domingo">Domingo</option>
            </select>
            <div class="form-text">Seleccione los días de la semana en los que se ofrece la clase. <br> Manteniendo la tecla CTRL presionada, puede seleccionar varios días.</div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="Horario">Horario</label>
            <input type="time" class="form-control" id="Horario" name="Horario" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="CupoMaximo">Cupo Máximo</label>
            <input type="number" class="form-control" id="CupoMaximo" name="CupoMaximo" required>
        </div>
        <div class="mb-3 form-check form-switch" >
            <input id="activa" name="activa" type="checkbox" class="form-check-input">
            <label for="activa" class='form-check-label'>Activa</label>
        </div>
        <button type="submit" class="btn btn-primary">Crear Clase</button>
    </form>
    <button type="button" class="btn btn-secondary" onclick="window.location='{{route('clases.index')}}'">Volver a la lista de clases</button>
</div>