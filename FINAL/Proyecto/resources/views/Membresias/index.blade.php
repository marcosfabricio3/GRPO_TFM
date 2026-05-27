<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Membresías</title>
</head>
<body>

    <h1>Listado de Membresías</h1>

    <a href="{{ route('membresias.create') }}">
        Crear Nueva Membresía
    </a>

    <br><br>

    <ul>

        @foreach ($membresias as $membresia)

            <li>

                <strong>

                    {{ $membresia->Tipo }}

                </strong>

                <br><br>

                <a href="{{ route('membresias.show', $membresia->MembresiaID) }}">
                    Ver Detalles
                </a>

                <a href="{{ route('membresias.edit', $membresia->MembresiaID) }}">
                    Editar
                </a>

                <form action="{{ route('membresias.destroy', $membresia->MembresiaID) }}"
                      method="POST"
                      style="display:inline;"
                      onsubmit="return confirm('¿Estás seguro de que quieres eliminar esta membresía?');">

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

</body>
</html>