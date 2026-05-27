<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Pago</title>
</head>
<body>

    <h1>Detalles del Pago</h1>

    <p>
        <strong>ID:</strong>

        {{ $pago->PagoID }}
    </p>

    <p>
        <strong>Socio:</strong>

        {{ $pago->inscripcion?->socio?->Nombre }}
    </p>

    <p>
        <strong>Membresía:</strong>

        {{ $pago->inscripcion?->membresia?->Tipo }}
    </p>

    <p>
        <strong>Monto:</strong>

        ${{ $pago->Monto }}
    </p>

    <p>
        <strong>Fecha:</strong>

        {{ \Carbon\Carbon::parse($pago->FechaPago)->format('d/m/Y H:i') }}
    </p>

    <p>
        <strong>Medio de Pago:</strong>

        {{ $pago->MedioPago }}
    </p>

    <a href="{{ route('pagos.index') }}">
        Volver a la lista de pagos
    </a>

</body>
</html>