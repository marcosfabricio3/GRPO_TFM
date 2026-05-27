<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nuevo Socio</title>
</head>
<body>

    <h1>Crear Nuevo Socio</h1>

    <form action="{{ route('socios.store') }}" method="POST">

        @csrf

        <label>Nombre:</label>
        <input type="text" name="Nombre" required>
        <br><br>

        <label>Documento de Identidad:</label>
        <input type="text" name="DocumentoIdentidad" required>
        <br><br>

        <label>Email:</label>
        <input type="email" name="Email" required>
        <br><br>

        <label>Teléfono:</label>
        <input type="text" name="Telefono" required>
        <br><br>

        <label>Fecha de Nacimiento:</label>
        <input type="date" name="FechaNacimiento" required>
        <br><br>

        <button type="submit">
            Crear Socio
        </button>

    </form>

    <br>

    <a href="{{ route('socios.index') }}">
        Volver a la lista de socios
    </a>

</body>
</html>