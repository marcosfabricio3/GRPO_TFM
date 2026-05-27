<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de la Inscripción</title>
</head>
<body>

    <h1>Detalle de la Inscripción</h1>

    <p>
        <strong>ID de la Inscripción:</strong>

        {{ $inscripcion->InscripcionID }}
    </p>

    <p>
        <strong>Nombre del Socio:</strong>

        {{ $inscripcion->socio?->Nombre }}
    </p>

    <p>
        <strong>Membresía:</strong>

        {{ $inscripcion->membresia?->Tipo }}
    </p>

    <p>
        <strong>Fecha de Inicio:</strong>

        {{ $inscripcion->FechaInicio }}
    </p>

    <p>
        <strong>Fecha de Vencimiento:</strong>

        {{ $inscripcion->FechaVencimiento }}
    </p>

    <p>
        <strong>Estado:</strong>

        {{ $inscripcion->Estado }}
    </p>

    <p>
        <strong>Fecha de Creación:</strong>

        {{ $inscripcion->FechaCreacion }}
    </p>

    <br>

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

                <strong>Medio de Pago:</strong>

                {{ $pago->MedioPago }}

            </li>

            <br>

        @empty

            <li>

                No hay pagos registrados para esta inscripción.

            </li>

        @endforelse

    </ul>

    <br>

    <a href="{{ route('inscripciones.index') }}">
        Volver a la lista de inscripciones
    </a>

</body>
</html>