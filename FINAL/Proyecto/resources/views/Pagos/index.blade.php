<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pagos</title>
</head>
<body>

    <h1>Lista de Pagos</h1>

    <a href="{{ route('pagos.create') }}">
        Crear Nuevo Pago
    </a>

    <br><br>

    <ul>

        @foreach($pagos as $pago)

            <li>

                <strong>

                    {{ $pago->inscripcion?->socio?->Nombre }}

                </strong>

                -

                {{ $pago->Monto }}

                -

                {{ $pago->MedioPago }}

                <br><br>

                <strong>

                    Fecha:

                </strong>

                {{ \Carbon\Carbon::parse($pago->FechaPago)->format('d/m/Y H:i') }}

                <br><br>

                <a href="{{ route('pagos.show', $pago->PagoID) }}">
                    Ver
                </a>

                <a href="{{ route('pagos.edit', $pago->PagoID) }}">
                    Editar
                </a>

                <form action="{{ route('pagos.destroy', $pago->PagoID) }}"
                      method="POST"
                      style="display:inline;"
                      onsubmit="return confirm('¿Eliminar este pago?');">

                    @csrf
                    @method('DELETE')

                    <button type="submit">
                        Eliminar
                    </button>

                </form>

            </li>

            <br><hr><br>

        @endforeach

    </ul>

</body>
</html>