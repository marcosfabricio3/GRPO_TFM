@extends('layouts.app')
@section('title', 'Crear Nuevo Pago')
@section('content')
@section('pago_active', 'link-secondary')
@vite(['resources/js/pagos/create.js'])
<x-nav-bar />
<div class="container mt-3">
    <form id="formCrearPago" class="form-control" action="{{ route('pagos.store') }}" method="POST">
        @csrf
        <h2>Crear Nuevo Pago</h2>
        <div class="mb-3">
            <label class='form-label' for="InscripcionID">Inscripción:</label>
            <select class="form-select" id="InscripcionID" name="InscripcionID" required>
                <option value="">--Seleccione una inscripción--</option>
                @foreach($inscripciones as $inscripcion)
                    <option value="{{ $inscripcion->InscripcionID }}">{{ $inscripcion->socio?->DocumentoIdentidad }} - {{ $inscripcion->membresia?->Descripcion }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class='form-label' for="Monto">Monto:</label>
            <input type="number" class="form-control" id="Monto" name="Monto" step="0.01" required>
        </div>
        <div class="mb-3">
            <label class='form-label' for="FechaPago">Fecha Pago:</label>
            <input type="datetime-local" class="form-control" id="FechaPago" name="FechaPago" required>
        </div>
        <div class="mb-3">
            <label class='form-label' for="MedioPago">Medio Pago:</label>
            <select class="form-select" id="MedioPago" name="MedioPago" required>
                <option value="">--Seleccione un medio de pago--</option>
                <option value="Efectivo">Efectivo</option>
                <option value="Tarjeta">Tarjeta</option>
                <option value="Transferencia">Transferencia</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary" >Crear Pago</button>
    </form>
    <br>
    <button type="button" class="btn btn-secondary" onclick="window.location='{{route('pagos.index')}}'">Volver a la lista de pagos</button>
</div>
@endsection