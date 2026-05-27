<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clases</title>
</head>
<body>

    <h1>Lista de Clases</h1>

    <ul>

        @foreach ($clases as $clase)

            <li>

                <strong>

                    {{ $clase->Nombre }}

                </strong>

                <br><br>

                <a href="{{ route('clases.show', $clase->ClaseID) }}">
                    Ver
                </a>

                <a href="{{ route('clases.edit', $clase->ClaseID) }}">
                    Editar
                </a>

                <form action="{{ route('clases.destroy', $clase->ClaseID) }}"
                      method="POST"
                      style="display:inline;"
                      onsubmit="return confirm('¿Estás seguro de que quieres eliminar esta clase?');">

                    @csrf
                    @method('DELETE')

                    <button type="submit">
                        Eliminar
                    </button>

                </form>

            </li>

            <br><hr><br>

        @endforeach

    </ul>

    <a href="{{ route('clases.create') }}">
        Crear Nueva Clase
    </a>

</body>
</html>