@extends('layouts.app')
@section('title', 'Crear Nueva Asistencia')
@section('content')
@section('asistencia_active', 'link-secondary')
@vite(['resources/js/asistencias/create.js'])
<x-nav-bar />
<div class="container mt-3">
    <form id="formCrearAsistencia" class="form-control" action="{{ route('asistencias.store') }}" method="POST">
        @csrf
        <h2>Crear Nueva Asistencia</h2>
        <div class="mb-3">
            <label class='form-label' for="SocioID">Socio:</label>
            <select class="form-select" id="SocioID" name="SocioID" required>
                <option value="">--Seleccione un socio--</option>
                @foreach($socios as $socio)
                    <option value="{{ $socio->SocioID }}">{{ $socio->DocumentoIdentidad}} - {{ $socio->Nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class='form-label' for="ClaseID">Clase:</label>
            <select class="form-select" id="ClaseID" name="ClaseID" required>
                <option value="">--Seleccione una clase--</option>
                @foreach($clases as $clase)
                    <option value="{{ $clase->ClaseID }}">{{ $clase->Nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class='form-label' for="FechaEntrada">Fecha Entrada:</label>
            <input type="datetime-local" class="form-control" id="FechaEntrada" name="FechaEntrada" required>
        </div>
        <div class="mb-3">
            <label class='form-label' for="FechaSalida">Fecha Salida:</label>
            <input type="datetime-local" class="form-control" id="FechaSalida" name="FechaSalida" required>
        </div>
        <button type="submit" class="btn btn-primary">Crear Asistencia</button>
    </form>
    <br>
    <button type="button" class="btn btn-secondary" onclick="window.location='{{route('asistencias.index')}}'">Volver a la lista de asistencias</button>
</div>
@endsection
