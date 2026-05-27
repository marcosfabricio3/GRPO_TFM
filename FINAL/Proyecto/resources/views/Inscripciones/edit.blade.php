<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Inscripción</title>
</head>
<body>

    <h1>Editar Inscripción</h1>

    <form action="{{ route('inscripciones.update', $inscripcion->InscripcionID) }}"
          method="POST">

        @csrf
        @method('PUT')

        <label>Socio:</label>

        <select name="SocioID" required>

            @foreach ($socios as $socio)

                <option value="{{ $socio->SocioID }}"
                    {{ $inscripcion->SocioID == $socio->SocioID ? 'selected' : '' }}>

                    {{ $socio->Nombre }}

                </option>

            @endforeach

        </select>

        <br><br>

        <label>Membresía:</label>

        <select name="MembresiaID" required>

            @foreach ($membresias as $membresia)

                <option value="{{ $membresia->MembresiaID }}"
                    {{ $inscripcion->MembresiaID == $membresia->MembresiaID ? 'selected' : '' }}>

                    {{ $membresia->Tipo }}

                </option>

            @endforeach

        </select>

        <br><br>

        <label>Fecha Inicio:</label>

        <input type="date"
               name="FechaInicio"
               value="{{ $inscripcion->FechaInicio }}"
               required>

        <br><br>

        <label>Fecha Vencimiento:</label>

        <input type="date"
               name="FechaVencimiento"
               value="{{ $inscripcion->FechaVencimiento }}"
               required>

        <br><br>

        <label>Estado:</label>

        <select name="Estado">

            <option value="Activa"
                {{ $inscripcion->Estado == 'Activa' ? 'selected' : '' }}>
                Activa
            </option>

            <option value="Vencida"
                {{ $inscripcion->Estado == 'Vencida' ? 'selected' : '' }}>
                Vencida
            </option>

            <option value="Suspendida"
                {{ $inscripcion->Estado == 'Suspendida' ? 'selected' : '' }}>
                Suspendida
            </option>

        </select>

        <br><br>

        <h2>Pagos de la Inscripción</h2>

        <ul>

            @forelse($inscripcion->pagos as $pago)

                <li>

                    <strong>Monto:</strong>

                    ${{ $pago->Monto }}

                    <br>

                    <strong>Fecha:</strong>

                    {{ \Carbon\Carbon::parse($pago->FechaPago)->format('d/m/Y H:i') }}

                    <br>

                    <strong>Medio:</strong>

                    {{ $pago->MedioPago }}

                    <br><br>

                    <a href="{{ route('pagos.show', $pago->PagoID) }}">
                        Ver Pago
                    </a>

                    <a href="{{ route('pagos.edit', $pago->PagoID) }}">
                        Editar Pago
                    </a>

                </li>

                <br>

            @empty

                <li>

                    No hay pagos registrados.

                </li>

            @endforelse

        </ul>

        <br>

        <a href="{{ route('pagos.create') }}">
            Agregar Pago
        </a>

        <br><br>

        <button type="submit">
            Actualizar Inscripción
        </button>

    </form>

    <br>

    <a href="{{ route('inscripciones.index') }}">
        Volver a la lista de inscripciones
    </a>

</body>
</html>