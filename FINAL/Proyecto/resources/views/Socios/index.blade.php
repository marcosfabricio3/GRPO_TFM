@extends('layouts.app')
@section('title', 'Lista de socios')
@section('content')
@section('socio_active', 'link-secondary')
<x-nav-bar />
    <h1>Lista de Socios</h1>

    <a href="{{ route('socios.create') }}">
    Crear Nuevo Socio
    </a>
    <br><br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($socios as $socio)

                <tr>

                    <td>{{ $socio->SocioID }}</td>

                    <td>{{ $socio->Nombre }}</td>

                    <td>{{ $socio->Email }}</td>

                    <td>
                        <div class="btn-group">
                        <button type="button" class="btn btn-success" 
                            onclick="window.location='{{ route('socios.show', $socio->SocioID) }}'">
                            Ver
                        </button>
                        <button type="button" class="btn btn-warning"
                            onclick="window.location='{{ route('socios.edit', $socio->SocioID) }}'">
                            Editar
                        </button>
                        <button type="button" class="btn btn-danger"
                            onclick="window.location='{{ route('socios.destroy', $socio->SocioID) }}'">
                            Eliminar
                        </button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
