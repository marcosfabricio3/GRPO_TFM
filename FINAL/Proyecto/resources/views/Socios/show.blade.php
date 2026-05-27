<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Socio</title>
</head>
<body>

    <h1>Detalles del Socio</h1>

    <p><strong>ID:</strong> {{ $socio->SocioID }}</p>

    <p><strong>Nombre:</strong> {{ $socio->Nombre }}</p>

    <p><strong>Documento:</strong> {{ $socio->DocumentoIdentidad }}</p>

    <p><strong>Email:</strong> {{ $socio->Email }}</p>

    <p><strong>Teléfono:</strong> {{ $socio->Telefono }}</p>

    <p><strong>Fecha de Nacimiento:</strong> {{ $socio->FechaNacimiento }}</p>

    <p><strong>Fecha de Alta:</strong> {{ $socio->FechaAlta }}</p>

    <p><strong>Activo:</strong>
        {{ $socio->Activo ? 'Sí' : 'No' }}
    </p>

    <a href="{{ route('socios.index') }}">
        Volver a la lista de socios
    </a>

</body>
</html>