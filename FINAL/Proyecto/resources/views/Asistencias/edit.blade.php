<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Asistencia</title>
</head>
<body>

    <h1>Editar Asistencia</h1>

    <form action="{{ route('asistencias.update', $asistencia->AsistenciaID) }}"
          method="POST">

        @csrf
        @method('PUT')

        <label>Socio:</label>

        <select name="SocioID" required>

            @foreach ($socios as $socio)

                <option value="{{ $socio->SocioID }}"
                    {{ $asistencia->SocioID == $socio->SocioID ? 'selected' : '' }}>

                    {{ $socio->Nombre }}

                </option>

            @endforeach

        </select>

        <br><br>

        <label>Clase:</label>

        <select name="ClaseID" required>

            @foreach ($clases as $clase)

                <option value="{{ $clase->ClaseID }}"
                    {{ $asistencia->ClaseID == $clase->ClaseID ? 'selected' : '' }}>

                    {{ $clase->Nombre }}

                </option>

            @endforeach

        </select>

        <br><br>

        <label>Fecha Entrada:</label>

        <input type="datetime-local"
               name="FechaEntrada"
               value="{{ str_replace(' ', 'T', substr($asistencia->FechaEntrada, 0, 16)) }}"
               required>

        <br><br>

        <label>Fecha Salida:</label>

        <input type="datetime-local"
               name="FechaSalida"
               value="{{ $asistencia->FechaSalida ? str_replace(' ', 'T', substr($asistencia->FechaSalida, 0, 16)) : '' }}">

        <br><br>

        <button type="submit">
            Actualizar Asistencia
        </button>

    </form>

    <br>

    <a href="{{ route('asistencias.index') }}">
        Volver a la lista de asistencias
    </a>

</body>
</html>