@extends('layouts.app')
@section('title', 'Crear Nuevo Instructor')
@vite(['resources/js/instructores/create.js'])
@section('content')
@section('instructor_active', 'link-secondary')
<x-nav-bar />
<div class="container mt-3">
    <form id="formCrearInstructor" class="form-control" action="{{ route('instructores.store') }}" method="POST">
        @csrf
        <h2>Crear Nuevo Instructor</h2>
        <div class="mb-3">
            <label class='form-label' for="Nombre">Nombre</label>
            <input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="Ingrese el nombre del instructor" required>
        </div>
        <div class="mb-3">
            <label class='form-label' for="Especialidad">Especialidad</label>
            <input type="text" class="form-control" id="Especialidad" name="Especialidad" placeholder="Ingrese la especialidad del instructor" required>
        </div>
        <div class="mb-3">
            <label class='form-label' for="Email">Email</label>
            <input type="email" class="form-control" id="Email" name="Email" placeholder="Ingrese el email del instructor" required>
        </div>
        <div class="mb-3">
            <label class='form-label' for="Telefono">Telefono</label>
            <input type="text" class="form-control" id="Telefono" name="Telefono" placeholder="Ingrese el telefono del instructor" required>
        </div>
        <div class="mb-3 form-check form-switch">
            <input id="Activo" name="Activo" type="checkbox" class="form-check-input">
            <label class='form-check-label' for="Activo">Activo</label>
        </div>
        <button type="submit" class="btn btn-primary">Crear Instructor</button>
    </form>
    <br>
    <button type="button" class="btn btn-secondary" onclick="window.location='{{route('instructores.index')}}'">Volver a la lista de instructores</button>
<div>
@endsection