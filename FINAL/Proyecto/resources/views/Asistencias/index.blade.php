<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Asistencias</title>
</head>
<body>

    <h1>Lista de Asistencias</h1>

    <a href="{{ route('asistencias.create') }}">
        Crear Nueva Asistencia
    </a>

    <br><br>

    @foreach ($asistencias as $asistencia)

        <hr>

        <h3>

            {{ $asistencia->socio?->Nombre }}

        </h3>

        <p>

            <strong>Clase:</strong>

            {{ $asistencia->clase?->Nombre }}

        </p>

        <p>

            <strong>Entrada:</strong>

            {{ \Carbon\Carbon::parse($asistencia->FechaEntrada)->format('d/m/Y H:i') }}

        </p>

        <p>

            <strong>Salida:</strong>

            {{ $asistencia->FechaSalida
                ? \Carbon\Carbon::parse($asistencia->FechaSalida)->format('d/m/Y H:i')
                : 'Sin salida registrada' }}

        </p>

        <br>

        <a href="{{ route('asistencias.show', $asistencia->AsistenciaID) }}">
            Ver
        </a>

        <a href="{{ route('asistencias.edit', $asistencia->AsistenciaID) }}">
            Editar
        </a>

        <form action="{{ route('asistencias.destroy', $asistencia->AsistenciaID) }}"
              method="POST"
              style="display:inline;"
              onsubmit="return confirm('¿Estás seguro de eliminar esta asistencia?');">
            @csrf
            @method('DELETE')

            <button type="submit">
                Eliminar
            </button>

        </form>

        <br><br>

    @endforeach

</body>
</html>