@extends('layouts.app')
@section('title', 'Crear Nuevo Socio')
@section('content')
@section('socio_active', 'link-secondary')
<x-nav-bar />
<div class="container mt-3">
    <form class="form-control" action="{{ route('socios.store') }}" method="POST">
        @csrf    
        <h2>Crear Nuevo Socio</h2>
        <div class="mb-3">
            <label for="Nombre">Nombre:</label>
            <input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="Ingrese el nombre del socio" required>     
        </div>
        <div class="mb-3">
            <label for="DocumentoIdentidad">Documento de Identidad:</label>
            <input type="text" class="form-control" id="DocumentoIdentidad" name="DocumentoIdentidad" placeholder="Ingrese el documento de identidad del socio" required>
        </div>
        <div class="mb-3" mt-3>
            <label for="Email">Email:</label>
            <input type="email" class="form-control"  id="Email" name="Email" placeholder="Ingrese el email del socio" required>
        </div>
        <div class="mb-3">
            <label for="Telefono">Telefono:</label>
            <input type="text" class="form-control" id="Telefono" name="Telefono" placeholder="Ingrese el telefono del socio" required>
        </div>
        <div class="mb-3">
            <label for="FechaNacimiento">Fecha de Nacimiento:</label>
            <input type="date" class="form-control" id="FechaNacimiento" name="FechaNacimiento" required>        
        </div>
        <button type="submit" class="btn btn-primary">Crear Socio</button>
    </form>
</div>
<a href="{{ route('socios.index') }}">Volver a la lista de socios</a>

@endsection