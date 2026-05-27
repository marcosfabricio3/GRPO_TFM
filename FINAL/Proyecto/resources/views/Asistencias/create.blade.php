<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nueva Asistencia</title>
</head>
<body>

    <h1>Crear Nueva Asistencia</h1>

    <form action="{{ route('asistencias.store') }}" method="POST">

        @csrf

        <label>Socio:</label>

        <select name="SocioID" required>

            @foreach ($socios as $socio)

                <option value="{{ $socio->SocioID }}">

                    {{ $socio->Nombre }}

                </option>

            @endforeach

        </select>

        <br><br>

        <label>Clase:</label>

        <select name="ClaseID" required>

            @foreach ($clases as $clase)

                <option value="{{ $clase->ClaseID }}">

                    {{ $clase->Nombre }}

                </option>

            @endforeach

        </select>

        <br><br>

        <label>Fecha Entrada:</label>

        <input type="datetime-local"
               name="FechaEntrada"
               required>

        <br><br>

        <label>Fecha Salida:</label>

        <input type="datetime-local"
               name="FechaSalida">

        <br><br>

        <button type="submit">
            Guardar
        </button>

    </form>

    <br>

    <a href="{{ route('asistencias.index') }}">
        Volver a la lista de asistencias
    </a>

</body>
</html>