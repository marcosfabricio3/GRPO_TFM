<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nueva Clase</title>
</head>
<body>

    <h1>Crear Nueva Clase</h1>

    <form action="{{ route('clases.store') }}" method="POST">

        @csrf

        <label>Nombre:</label>

        <input type="text"
               name="Nombre"
               required>

        <br><br>

        <label>Tipo:</label>

        <select name="Tipo" required>

            <option value="Musculación">Musculación</option>
            <option value="Yoga">Yoga</option>
            <option value="Crossfit">Crossfit</option>
            <option value="Pilates">Pilates</option>

        </select>

        <br><br>

        <label>Instructor:</label>

        <select name="InstructorID" required>

            @foreach($instructores as $instructor)

                <option value="{{ $instructor->InstructorID }}">

                    {{ $instructor->Nombre }}

                </option>

            @endforeach

        </select>

        <br><br>

        <label>Días:</label>

        <input type="text"
               name="DiasSemana"
               placeholder="Lunes,Miércoles">

        <br><br>

        <label>Horario:</label>

        <input type="time"
               name="Horario"
               required>

        <br><br>

        <label>Cupo Máximo:</label>

        <input type="number"
               name="CupoMaximo"
               required>

        <br><br>

        <label>Activa:</label>

        <select name="Activa">

            <option value="1">Sí</option>
            <option value="0">No</option>

        </select>

        <br><br>

        <button type="submit">
            Crear Clase
        </button>

    </form>

    <br>

    <a href="{{ route('clases.index') }}">
        Volver a la lista de clases
    </a>

</body>
</html>