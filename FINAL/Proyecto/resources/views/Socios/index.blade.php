<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Socios</title>
</head>
<body>

    <h1>Lista de Socios</h1>

    <a href="{{ route('socios.create') }}">
    Crear Nuevo Socio
    </a>
    <br><br>
    <table border="1">
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

                        <a href="{{ route('socios.show', $socio->SocioID) }}">
                            Ver
                        </a>

                        <a href="{{ route('socios.edit', $socio->SocioID) }}">
                            Editar
                        </a>

                        <form action="{{ route('socios.destroy', $socio->SocioID) }}"
                              method="POST"
                              style="display:inline">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    onclick="return confirm('¿Quieres eliminar este socio?')">

                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>