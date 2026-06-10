@extends('layouts.app')
@section('title', 'Crear Inscripción')
@section('content')
@section('inscripcion_active', 'link-secondary')
@vite(['resources/js/inscripciones/create.js'])
<x-nav-bar />
<div class="container mt-3">
    <form id="formCrearInscripcion" class="form-control" action="{{ route('inscripciones.store') }}" method="POST">
        @csrf
        <h2>Crear Nueva Inscripción</h2>
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
            <label class='form-label' for="MembresiaID">Membresia:</label>
            <select class="form-select" id="MembresiaID" name="MembresiaID" required>
                <option value="">--Seleccione una membresia--</option>
                @foreach($membresias as $membresia)
                    <option value="{{ $membresia->MembresiaID }}">{{ $membresia->Descripcion }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class='form-label' for="FechaInicio">Fecha Inicio:</label>
            <input type="date" class="form-control" id="FechaInicio" name="FechaInicio" required>
        </div>
        <div class="mb-3">
            <label class='form-label' for="FechaVencimiento">Fecha Vencimiento:</label>
            <input type="date" class="form-control" id="FechaVencimiento" name="FechaVencimiento" required>
        </div>
        <div class="mb-3">
            <label class='form-label' for="Estado">Estado:</label>
            <select class="form-select" id="Estado" name="Estado" required>
                <option value="Activa">Activa</option>
                <option value="Vencida">Vencida</option>
                <option value="Cancelada">Cancelada</option>
            </select>
        </div>
        <div class="mb-3 form-check form-switch" >
            <input id="RegistrarPago" name="RegistrarPago" type="checkbox" class="form-check-input" data-bs-toggle="collapse" data-bs-target="#RegistrarPagoInicial" aria-expanded="false" aria-controls="RegistrarPagoInicial">
            <label for="activo" class='form-check-label'>Registrar Pago inicial</label>
        </div>
        <div id="RegistrarPagoInicial" class="mb-3 collapse">
            <h3>Agregar Pago Inicial</h3>
            <div class="mb-3">
                <label class='form-label' for="MedioPago">Medio de Pago:</label>
                <select class="form-select" id="MedioPago" name="MedioPago" >
                    <option value="">--Seleccione un medio de pago--</option>
                    <option value="Efectivo">Efectivo</option>
                    <option value="Tarjeta">Tarjeta</option>
                    <option value="Transferencia">Transferencia</option>
                </select>
            </div>
            <div class="mb-3">
                <label class='form-label' for="Monto">Monto:</label>
                <input type="number" class="form-control" id="Monto" name="Monto" step="0.01" >
            </div>
            <div class="mb-3">
                <label class='form-label' for="FechaPago">Fecha del Pago:</label>
                <input type="datetime-local" class="form-control" id="FechaPago" name="FechaPago" >
            </div>
        </div>
        <button type="submit" class="btn btn-primary" >Crear Inscripción</button>
    </form>
    <br>
    <button type="button" class="btn btn-secondary" onclick="window.location='{{route('inscripciones.index')}}'">Volver a la lista de inscripciones</button>
</div>