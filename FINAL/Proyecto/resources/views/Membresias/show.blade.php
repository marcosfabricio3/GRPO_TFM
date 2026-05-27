<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de la Membresía</title>
</head>
<body>

    <h1>Detalles de la Membresía</h1>

    <p>
        <strong>ID de Membresía:</strong>
        {{ $membresia->MembresiaID }}
    </p>

    <p>
        <strong>Tipo de Membresía:</strong>
        {{ $membresia->Tipo }}
    </p>

    <p>
        <strong>Precio:</strong>
        ${{ $membresia->Precio }}
    </p>

    <p>
        <strong>Cantidad de Clases Incluidas:</strong>
        {{ $membresia->CantidadClasesIncluidas }}
    </p>

    <p>
        <strong>Descripción:</strong>
        {{ $membresia->Descripcion }}
    </p>

    <a href="{{ route('membresias.index') }}">
        Volver a la lista de membresías
    </a>

</body>
</html>