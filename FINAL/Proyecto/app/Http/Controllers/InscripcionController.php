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

        return view('inscripciones.create', compact('socios','membresias'));
    }

    // Guarda una inscripción nueva
    public function store(Request $request)
    {
        //Validación de pago inicial si esta admitido en la solicitud
        if ($request->boolean('RegistrarPago')) {
            $request->validate(
                [
                    'Monto' => 'required|min:1',
                    'FechaPago' => 'required|date',
                    'MedioPago' => 'required'
                ],
                [
                    'Monto.required' => 'Debe ingresar el monto del pago inicial.',
                    'Monto.min' => 'El monto debe ser mayor a 0.',

                    'FechaPago.required' => 'Debe ingresar la fecha del pago.',
                    'FechaPago.date' => 'La fecha del pago no es válida.',

                    'MedioPago.required' => 'Debe seleccionar un medio de pago.'
                ]
            );
        }
        // Verifica si el socio ya tiene una inscripción activa
        $existeInscripcionActiva = Inscripcion::where('SocioID',$request->SocioID)->where('Estado','Activa')->first();

        // Si ya tiene una inscripción activa
        if ($existeInscripcionActiva) {
            //Verificar si la actual solicitud tiene el estado activa
            if ($request->Estado == 'Activa') {
                return response()->json(['success' => false, 'message' => 'El socio ya tiene una inscripción activa.'], 409);    
            }
        }

        try{
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
        if ($request->boolean('RegistrarPago')) {
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
        }
        catch(\Exception $e){
            return response()->json(['success' => false, 'message' => 'Error al registrar la inscripción.', 409]);
        }

        return response()->json(['success' => true]);
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
        try{
            $inscripcion = Inscripcion::findOrFail($id);
            // Verifica si el socio ya tiene una inscripción activa
            $existeInscripcionActiva = Inscripcion::where('SocioID',$request->SocioID)->where('Estado','Activa')->first();
            // Si ya tiene una inscripción activa
            if ($existeInscripcionActiva) {
                //Verificar si la actual solicitud tiene el estado activa
                if ($request->Estado == 'Activa') {
                    return response()->json(['success' => false, 'message' => 'El socio ya tiene una inscripción activa.'], 409);    
                }
            }

            $inscripcion->update([
                'SocioID' => $request->SocioID,
                'MembresiaID' => $request->MembresiaID,
                'FechaInicio' => $request->FechaInicio,
                'FechaVencimiento' => $request->FechaVencimiento,
                'Estado' => $request->Estado
            ]);
        }
        catch(\Exception $e){
            return response()->json(['success' => false, 'message' => 'Error al actualizar la inscripción.', 409]);
        }

        return response()->json(['success' => true]);
    }

    // Elimina una inscripción
    public function destroy(string $id)
    {
        try{
        $inscripcion = Inscripcion::findOrFail($id);

        if ($inscripcion->pagos()->exists()) {
            return response()->json([
                'success' => false,
                'message' => 'No se puede eliminar la inscripción porque tiene pagos asociados.'],
                409
            );
        }

        $inscripcion->delete();
        }
        catch(\Exception $e){
            return response()->json(['success' => false, 'message' => 'Error al eliminar la inscripción.', 409]);
        }
        return response()->json(['success' => true]);
    }
}