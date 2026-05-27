<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Membresía</title>
</head>
<body>

    <h1>Editar Membresía</h1>

    <form action="{{ route('membresias.update', $membresia->MembresiaID) }}" method="POST">

        @csrf
        @method('PUT')

        <label>Tipo de Membresía:</label>

        <select name="Tipo" required>

            <option value="Mensual"
                {{ $membresia->Tipo == 'Mensual' ? 'selected' : '' }}>
                Mensual
            </option>

            <option value="Trimestral"
                {{ $membresia->Tipo == 'Trimestral' ? 'selected' : '' }}>
                Trimestral
            </option>

            <option value="Anual"
                {{ $membresia->Tipo == 'Anual' ? 'selected' : '' }}>
                Anual
            </option>

            <option value="Clase Suelta"
                {{ $membresia->Tipo == 'Clase Suelta' ? 'selected' : '' }}>
                Clase Suelta
            </option>

        </select>

        <br><br>

        <label>Precio:</label>

        <input type="number"
               name="Precio"
               step="0.01"
               value="{{ $membresia->Precio }}"
               required>

        <br><br>

        <label>Cantidad de Clases Incluidas:</label>

        <input type="number"
               name="CantidadClasesIncluidas"
               value="{{ $membresia->CantidadClasesIncluidas }}"
               required>

        <br><br>

        <label>Descripción:</label>

        <textarea name="Descripcion">{{ $membresia->Descripcion }}</textarea>

        <br><br>

        <button type="submit">
            Actualizar Membresía
        </button>

    </form>

    <br>

    <a href="{{ route('membresias.index') }}">
        Volver a la lista de membresías
    </a>

</body>
</html>