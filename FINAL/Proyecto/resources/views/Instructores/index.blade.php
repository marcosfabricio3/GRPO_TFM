<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Lista de Instructores</h1>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Especialidad</th>
                <th>Email</th>
                <th>Telefono</th>
                <th>Activo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($instructores as $instructor)
                <tr>
                    <td>{{ $instructor->nombre }}</td>
                    <td>{{ $instructor->especialidad }}</td>
                    <td>{{ $instructor->email }}</td>
                    <td>{{ $instructor->telefono }}</td>
                    <td>{{ $instructor->activo ? 'Sí' : 'No' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('instructores.create') }}">Crear Nuevo Instructor</a> 
    <a href="{{ route('instructores.show', $instructor->id) }}">Ver Detalles</a>
    <a href="{{ route('instructores.edit', $instructor->id) }}">Editar</a>
    <a>
        <form action="{{ route('instructores.destroy', $instructor->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('¿Estás seguro de eliminar este instructor?')">Eliminar</button>
        </form>
    </a>

    <a href="{{ route('instructores.index') }}">Volver a la lista de instructores</a>

</body>
</html>