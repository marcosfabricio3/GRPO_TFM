<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nuevo Pago</title>
</head>
<body>

    <h1>Crear Nuevo Pago</h1>

    <form action="{{ route('pagos.store') }}" method="POST">

        @csrf

        <label>Inscripción:</label>

        <select name="InscripcionID" required>

            @foreach($inscripciones as $inscripcion)

                <option value="{{ $inscripcion->InscripcionID }}">

                    {{ $inscripcion->socio?->Nombre }}

                    -

                    {{ $inscripcion->membresia?->Tipo }}

                </option>

            @endforeach

        </select>

        <br><br>

        <label>Monto:</label>

        <input type="number"
               name="Monto"
               step="0.01"
               required>

        <br><br>

        <label>Fecha Pago:</label>

        <input type="datetime-local"
               name="FechaPago"
               required>

        <br><br>

        <label>Medio Pago:</label>

        <select name="MedioPago">

            <option value="Efectivo">
                Efectivo
            </option>

            <option value="Tarjeta">
                Tarjeta
            </option>

            <option value="Transferencia">
                Transferencia
            </option>

        </select>

        <br><br>

        <button type="submit">
            Crear Pago
        </button>

    </form>

    <br>

    <a href="{{ route('pagos.index') }}">
        Volver a la lista de pagos
    </a>

</body>
</html>