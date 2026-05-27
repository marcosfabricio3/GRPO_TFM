<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Pago</title>
</head>
<body>

    <h1>Editar Pago</h1>

    <form action="{{ route('pagos.update', $pago->PagoID) }}"
          method="POST">

        @csrf
        @method('PUT')

        <label>Inscripción:</label>

        <select name="InscripcionID">

            @foreach($inscripciones as $inscripcion)

                <option value="{{ $inscripcion->InscripcionID }}"
                    {{ $pago->InscripcionID == $inscripcion->InscripcionID ? 'selected' : '' }}>

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
               value="{{ $pago->Monto }}"
               step="0.01"
               required>

        <br><br>

        <label>Fecha Pago:</label>

        <input type="datetime-local"
               name="FechaPago"
               value="{{ str_replace(' ', 'T', substr($pago->FechaPago, 0, 16)) }}"
               required>

        <br><br>

        <label>Medio Pago:</label>

        <select name="MedioPago">

            <option value="Efectivo"
                {{ $pago->MedioPago == 'Efectivo' ? 'selected' : '' }}>
                Efectivo
            </option>

            <option value="Tarjeta"
                {{ $pago->MedioPago == 'Tarjeta' ? 'selected' : '' }}>
                Tarjeta
            </option>

            <option value="Transferencia"
                {{ $pago->MedioPago == 'Transferencia' ? 'selected' : '' }}>
                Transferencia
            </option>

        </select>

        <br><br>

        <button type="submit">
            Actualizar Pago
        </button>

    </form>

    <br>

    <a href="{{ route('pagos.index') }}">
        Volver a la lista de pagos
    </a>

</body>
</html>