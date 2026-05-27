<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de la Clase</title>
</head>
<body>

    <h1>Detalles de la Clase</h1>

    <p>
        <strong>ID:</strong>
        {{ $clase->ClaseID }}
    </p>

    <p>
        <strong>Nombre:</strong>
        {{ $clase->Nombre }}
    </p>

    <p>
        <strong>Tipo:</strong>
        {{ $clase->Tipo }}
    </p>

    <p>
        <strong>Días:</strong>
        {{ $clase->DiasSemana }}
    </p>

    <p>
        <strong>Horario:</strong>
        {{ $clase->Horario }}
    </p>

    <p>
        <strong>Cupo Máximo:</strong>
        {{ $clase->CupoMaximo }}
    </p>

    <p>
        <strong>Activa:</strong>
        {{ $clase->Activa ? 'Sí' : 'No' }}
    </p>

    <p>
        <strong>Instructor:</strong>
        {{ $clase->instructor?->Nombre }}   
    </p>

    <br>

    <a href="{{ route('clases.index') }}">
        Volver a la lista de clases
    </a>

</body>
</html>