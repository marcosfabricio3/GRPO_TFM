@extends('layouts.app')
@section('title', 'Listado de membresias')
@section('content')
@section('membresia_active', 'link-secondary')
<x-nav-bar />
<div class="container mt-3">
    <form class="form-control" action="{{ route('membresias.store') }}" method="POST">
        @csrf
        <h2>Crear Nueva Membresía</h2>
        <div class="mb-3">
            <label for="Tipo">Tipo de Membresia:</label>
            <select class="form-select" id="Tipo" name="Tipo" required>
                <option value="Mensual">Mensual</option>
                <option value="Trimestral">Trimestral</option>
                <option value="Anual">Anual</option>
                <option value="Clase Suelta">Clase Suelta</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="Descripcion">Descripción:</label>
            <input type="text" class="form-control" id="Descripcion" name="Descripcion" placeholder="Ingrese la descripción de la membresia" required>
        </div>
        <div class="mb-3">
            <label for="Precio">Precio:</label>
            <input type="number" class="form-control" id="Precio" name="Precio" placeholder="Ingrese el precio de la membresia" step="0.01" required>
        </div>
        <div class="mb-3">
            <label for="CantidadClasesIncluidas">Cantidad de Clases Incluidas:</label>
            <input type="number" class="form-control" id="CantidadClasesIncluidas" name="CantidadClasesIncluidas" placeholder="Ingrese la cantidad de clases incluidas en la membresia" required>
        </div>
        <button type="submit" class="btn btn-primary">Crear Membresia</button>

    </form>
</div>
<button type="button" class="btn btn-secondary" onclick="window.location='{{route('membresias.index')}}'">Volver a la lista de membresias</button>
@endsection