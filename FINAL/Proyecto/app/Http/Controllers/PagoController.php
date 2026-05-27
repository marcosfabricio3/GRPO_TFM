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
        Pago::create([

        'InscripcionID' => $request->InscripcionID,

        'Monto' => $request->Monto,

        'FechaPago' => str_replace(
            'T',
            ' ',
            $request->FechaPago
        ),

        'MedioPago' => $request->MedioPago

    ]);

        return redirect()->route('pagos.index');
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
        $pago = Pago::findOrFail($id);

        $pago->update([

        'InscripcionID' => $request->InscripcionID,

        'Monto' => $request->Monto,

        'FechaPago' => str_replace(
            'T',
            ' ',
            $request->FechaPago
        ),

        'MedioPago' => $request->MedioPago

        ]);

        return redirect()->route('pagos.index');
    }

    // Elimina un pago
    public function destroy(string $id)
    {
        $pago = Pago::findOrFail($id);

        $pago->delete();

        return redirect()->route('pagos.index');
    }
}