<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Inscripciones</title>
</head>
<body>

    <h1>Listado de Inscripciones</h1>

    <a href="{{ route('inscripciones.create') }}">
        Crear Nueva Inscripción
    </a>

    <br><br>

    <ul>

        @foreach ($inscripciones as $inscripcion)

            <li>

                <strong>
                    {{ $inscripcion->socio?->Nombre }}
                </strong>

                -

                {{ $inscripcion->membresia?->Tipo }}

                -

                {{ $inscripcion->Estado }}

                <br><br>

                <strong>Fecha Inicio:</strong>

                {{ $inscripcion->FechaInicio }}

                <br>

                <strong>Fecha Vencimiento:</strong>

                {{ $inscripcion->FechaVencimiento }}

                <br><br>

                <strong>Pagos:</strong>

                <ul>

                    @forelse($inscripcion->pagos as $pago)

                        <li>

                            ${{ $pago->Monto }}

                            -

                            {{ $pago->MedioPago }}

                            -

                            {{ \Carbon\Carbon::parse($pago->FechaPago)->format('d/m/Y') }}

                        </li>

                    @empty

                        <li>

                            No tiene pagos registrados

                        </li>

                    @endforelse

                </ul>

                <br>

                <a href="{{ route('inscripciones.show', $inscripcion->InscripcionID) }}">
                    Ver Detalles
                </a>

                <a href="{{ route('inscripciones.edit', $inscripcion->InscripcionID) }}">
                    Editar
                </a>

                <form action="{{ route('inscripciones.destroy', $inscripcion->InscripcionID) }}"
                      method="POST"
                      style="display:inline;"
                      onsubmit="return confirm('¿Eliminar esta inscripción?');">

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