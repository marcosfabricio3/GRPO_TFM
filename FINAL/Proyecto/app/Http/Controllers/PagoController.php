<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pago;
use App\Models\Inscripcion;

class PagoController extends Controller
{
    // Lista todos los pagos
    public function index()
    {
        $pagos = Pago::all();

        return view('pagos.index', compact('pagos'));
    }

    // Muestra el formulario para crear un pago
    public function create()
    {
        // Trae inscripciones para elegir a cuál inscripción asociar el pago
        $inscripciones = Inscripcion::all();

        return view('pagos.create', compact('inscripciones'));
    }

    // Guarda un pago nuevo
    public function store(Request $request)
    {
        try {
            Pago::create([
                'InscripcionID' => $request->InscripcionID,
                'Monto' => $request->Monto,
                'FechaPago' => str_replace('T',' ',$request->FechaPago),
                'MedioPago' => $request->MedioPago
            ]);    
        }catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => 'Error al crear el pago.'], 409);
        }
        return response()->json(['success' => true, 'message' => 'Pago creado correctamente.']);
    }

    // Muestra un pago específico
    public function show(string $id)
    {
        $pago = Pago::findOrFail($id);

        return view('pagos.show', compact('pago'));
    }

    // Muestra el formulario para editar un pago
    public function edit(string $id)
    {
        $pago = Pago::findOrFail($id);

        $inscripciones = Inscripcion::all();

        return view('pagos.edit', compact('pago', 'inscripciones'));
    }

    // Actualiza un pago existente
    public function update(Request $request, string $id)
    {
        try {
            $pago = Pago::findOrFail($id);
            $pago->update([
                'InscripcionID' => $request->InscripcionID,
                'Monto' => $request->Monto,
                'FechaPago' => str_replace('T',' ',$request->FechaPago),
                'MedioPago' => $request->MedioPago
            ]);    
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => 'Error al actualizar el pago.'], 409);
        }
        return response()->json(['success' => true, 'message' => 'Pago actualizado correctamente.']);
    }

    // Elimina un pago
    public function destroy(string $id)
    {
        try{
            $pago = Pago::findOrFail($id);
            $pago->delete();
        }catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al eliminar el pago. Contacte al administrador.'], 409);
        }
        return response()->json(['success' => true, 'message' => 'Pago eliminado correctamente.']);
    }
}