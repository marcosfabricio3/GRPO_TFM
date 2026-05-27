<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscripcion;
use App\Models\Socio;
use App\Models\Membresia;
use App\Models\Pago;

class InscripcionController extends Controller
{
    // Lista todas las inscripciones
    public function index()
    {
        $inscripciones = Inscripcion::all();

        return view('inscripciones.index', compact('inscripciones'));
    }

    // Muestra el formulario para crear una inscripción
    public function create()
    {
        // Trae socios y membresías para mostrarlos en selects
        $socios = Socio::all();

        $membresias = Membresia::all();

        return view('inscripciones.create', compact(
            'socios',
            'membresias'
        ));
    }

    // Guarda una inscripción nueva
    public function store(Request $request)
    {
        // Verifica si el socio ya tiene una inscripción activa
        $existeInscripcionActiva = Inscripcion::where(
            'SocioID',
            $request->SocioID
        )
        ->where('Estado', 'Activa')
        ->exists();

        // Si ya tiene una inscripción activa
        if ($existeInscripcionActiva) {

            return back()->with(
                'error',
                'El socio ya tiene una inscripción activa.'
            );
        }

        // Crear inscripción
        $inscripcion = Inscripcion::create([

            'SocioID' => $request->SocioID,

            'MembresiaID' => $request->MembresiaID,

            'FechaInicio' => $request->FechaInicio,

            'FechaVencimiento' => $request->FechaVencimiento,

            'Estado' => $request->Estado,

            'FechaCreacion' => now()

        ]);

        // Crear pago inicial si se ingresó monto
        if ($request->Monto) {

            Pago::create([

                'InscripcionID' => $inscripcion->InscripcionID,

                'Monto' => $request->Monto,

                'FechaPago' => str_replace(
                    'T',
                    ' ',
                    $request->FechaPago
                ),

                'MedioPago' => $request->MedioPago

            ]);
        }

        return redirect()->route('inscripciones.index');
    }

    // Muestra una inscripción específica
    public function show(string $id)
    {
        $inscripcion = Inscripcion::findOrFail($id);

        return view('inscripciones.show', compact('inscripcion'));
    }

    // Muestra el formulario para editar una inscripción
    public function edit(string $id)
    {
        $inscripcion = Inscripcion::findOrFail($id);

        $socios = Socio::all();

        $membresias = Membresia::all();

        return view('inscripciones.edit', compact(
            'inscripcion',
            'socios',
            'membresias'
        ));
    }

    // Actualiza una inscripción existente
    public function update(Request $request, string $id)
    {
        $inscripcion = Inscripcion::findOrFail($id);

        $inscripcion->update([

            'SocioID' => $request->SocioID,

            'MembresiaID' => $request->MembresiaID,

            'FechaInicio' => $request->FechaInicio,

            'FechaVencimiento' => $request->FechaVencimiento,

            'Estado' => $request->Estado

        ]);

        return redirect()->route('inscripciones.index');
    }

    // Elimina una inscripción
    public function destroy(string $id)
    {
        $inscripcion = Inscripcion::findOrFail($id);

        $inscripcion->delete();

        return redirect()->route('inscripciones.index');
    }
}