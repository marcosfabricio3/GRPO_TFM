@extends('layouts.app')
@section('title', 'Crear Membresía')
@section('content')
@section('membresia_active', 'link-secondary')
@vite(['resources/js/membresias/create.js'])
<x-nav-bar />
<div class="container mt-3">
    <form id="formCrearMembresia" class="form-control" action="{{ route('membresias.store') }}" method="POST">
        @csrf
        <h2>Crear Nueva Membresía</h2>
        <div class="mb-3">
            <label class='form-label' for="Tipo">Tipo de Membresia:</label>
            <select class="form-select" id="Tipo" name="Tipo" required>
                <option value="">--Seleccione un tipo de membresia--</option>
                <option value="Mensual">Mensual</option>
                <option value="Trimestral">Trimestral</option>
                <option value="Anual">Anual</option>
                <option value="Clase Suelta">Clase Suelta</option>
            </select>
        </div>
        <div class="mb-3">
            <label class='form-label' for="Descripcion">Descripción:</label>
            <input type="text" class="form-control" id="Descripcion" name="Descripcion" placeholder="Ingrese la descripción de la membresia" required>
        </div>
        <div class="mb-3">
            <label class='form-label' for="Precio">Precio:</label>
            <input type="number" class="form-control" id="Precio" name="Precio" placeholder="Ingrese el precio de la membresia" step="0.01" required>
        </div>
        <div class="mb-3 form-check form-switch" >
            <input type="checkbox" class="form-check-input" data-bs-toggle="collapse" data-bs-target="#incluirCantidadClases" aria-expanded="false" aria-controls="incluirCantidadClases">
            <label for="activo" class='form-check-label'>Incluir cantidad de clases</label>
        </div>
        <div class="mb-3 collapse" id="incluirCantidadClases">
            <label class='form-label' for="CantidadClasesIncluidas">Cantidad de Clases Incluidas:</label>
            <input type="number" class="form-control" id="CantidadClasesIncluidas" name="CantidadClasesIncluidas" placeholder="Ingrese la cantidad de clases incluidas en la membresia">
        </div>
        <button type="submit" class="btn btn-primary">Crear Membresia</button>
    </form>
    <br>
    <button type="button" class="btn btn-secondary" onclick="window.location='{{route('membresias.index')}}'">Volver a la lista de membresias</button>
</div>
@endsection