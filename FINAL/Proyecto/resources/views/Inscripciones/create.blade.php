<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Inscripción</title>
</head>
<body>

    <h1>Crear Inscripción</h1>

    <form action="{{ route('inscripciones.store') }}" method="POST">

        @csrf

        <label>Socio:</label>

        <select name="SocioID" required>

            @foreach($socios as $socio)

                <option value="{{ $socio->SocioID }}">

                    {{ $socio->Nombre }}

                </option>

            @endforeach

        </select>

        <br><br>

        <label>Membresía:</label>

        <select name="MembresiaID" required>

            @foreach($membresias as $membresia)

                <option value="{{ $membresia->MembresiaID }}">

                    {{ $membresia->Tipo }}

                </option>

            @endforeach

        </select>

        <br><br>

        <label>Fecha Inicio:</label>

        <input type="date"
               name="FechaInicio"
               required>

        <br><br>

        <label>Fecha Vencimiento:</label>

        <input type="date"
               name="FechaVencimiento"
               required>

        <br><br>

        <label>Estado:</label>

        <select name="Estado">

            <option value="Activa">
                Activa
            </option>

            <option value="Vencida">
                Vencida
            </option>

            <option value="Suspendida">
                Suspendida
            </option>

        </select>

        <br><br>

        <h2>Agregar Pago Inicial</h2>

        <label>Monto:</label>

        <input type="number"
               name="Monto"
               step="0.01">

        <br><br>

        <label>Fecha del Pago:</label>

        <input type="datetime-local"
               name="FechaPago">

        <br><br>

        <label>Medio de Pago:</label>

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
            Crear Inscripción
        </button>

    </form>

</body>
</html>