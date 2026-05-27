<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Socio</title>
</head>
<body>

    <h1>Editar Socio</h1>

    <form action="{{ route('socios.update', $socio->SocioID) }}" method="POST">

        @csrf
        @method('PUT')

        <label>Nombre:</label>
        <input type="text"
               name="Nombre"
               value="{{ $socio->Nombre }}"
               required>
        <br><br>

        <label>Documento:</label>
        <input type="text"
               name="DocumentoIdentidad"
               value="{{ $socio->DocumentoIdentidad }}"
               required>
        <br><br>

        <label>Email:</label>
        <input type="email"
               name="Email"
               value="{{ $socio->Email }}"
               required>
        <br><br>

        <label>Teléfono:</label>
        <input type="text"
               name="Telefono"
               value="{{ $socio->Telefono }}"
               required>
        <br><br>

        <label>Fecha de Nacimiento:</label>
        <input type="date"
               name="FechaNacimiento"
               value="{{ $socio->FechaNacimiento }}"
               required>
        <br><br>

        <label>Activo:</label>

        <select name="Activo">

            <option value="1"
                {{ $socio->Activo ? 'selected' : '' }}>
                Sí
            </option>

            <option value="0"
                {{ !$socio->Activo ? 'selected' : '' }}>
                No
            </option>

        </select>

        <br><br>

        <button type="submit">
            Actualizar Socio
        </button>
    </form>
    <br>
    <a href="{{ route('socios.index') }}">
        Volver a la lista
    </a>

</body>
</html>