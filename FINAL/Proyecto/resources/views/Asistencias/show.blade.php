<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de la Asistencia</title>
</head>
<body>

    <h1>Detalles de la Asistencia</h1>

    <p>
        <strong>ID:</strong>

        {{ $asistencia->AsistenciaID }}
    </p>

    <p>
        <strong>Socio:</strong>

        {{ $asistencia->socio?->Nombre }}
    </p>

    <p>
        <strong>Clase:</strong>

        {{ $asistencia->clase?->Nombre }}
    </p>

    <p>
        <strong>Fecha Entrada:</strong>

        {{ \Carbon\Carbon::parse($asistencia->FechaEntrada)->format('d/m/Y H:i') }}
    </p>

    <p>
        <strong>Fecha Salida:</strong>

        {{ $asistencia->FechaSalida
            ? \Carbon\Carbon::parse($asistencia->FechaSalida)->format('d/m/Y H:i')
            : 'Sin salida registrada' }}
    </p>

    <br>

    <a href="{{ route('asistencias.index') }}">
        Volver a la lista de asistencias
    </a>

</body>
</html>