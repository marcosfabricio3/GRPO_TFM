<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Crear Nueva Membresía</h1>

    <form action="{{ route('membresias.store') }}" method="POST">

    @csrf

    <label>Tipo:</label>

    <select name="Tipo" required>
        <option value="Mensual">Mensual</option>
        <option value="Trimestral">Trimestral</option>
        <option value="Anual">Anual</option>
        <option value="Clase Suelta">Clase Suelta</option>
    </select>

    <br><br>

    <label>Precio:</label>
    <input type="number" name="Precio" step="0.01" required>

    <br><br>

    <label>Cantidad de Clases Incluidas:</label>
    <input type="number" name="CantidadClasesIncluidas" required>

    <br><br>

    <label>Descripción:</label>
    <textarea name="Descripcion"></textarea>

    <br><br>

    <button type="submit">
        Crear Membresía
    </button>

    </form>

    <a href="{{ route('membresias.index') }}">Volver a la lista de membresías</a>

</body>
</html>