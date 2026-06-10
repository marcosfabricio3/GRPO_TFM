<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clase;
use App\Models\Instructor;

class ClaseController extends Controller
{
    // Lista todas las clases
    public function index()
    {
        $clases = Clase::all();

        return view('clases.index', compact('clases'));
    }

    // Muestra el formulario para crear una clase
    public function create()
    {
        // Trae instructores para mostrarlos en un select
        $instructores = Instructor::all();

        return view('clases.create', compact('instructores'));
    }

    // Guarda una clase nueva
    public function store(Request $request)
    {
        try {
            //Validación de días de la semana
            $request->validate([
                'DiasSemana' => 'required|array|min:1',
                'DiasSemana.*' => 'in:Lunes,Martes,Miércoles,Jueves,Viernes,Sábado,Domingo'
            ]); 

            Clase::create([
                'Nombre' => $request->nombre,
                'Tipo' => $request->Tipo,
                'InstructorID' => $request->InstructorID,
                'DiasSemana' => implode(',', $request->DiasSemana),
                'Horario' => $request->Horario,
                'CupoMaximo' => $request->CupoMaximo,
                'Activa' => $request->boolean('activa') ? 1 : 0
            ]);    
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al crear la clase.'], 409);
        }
        
        return response()->json(['success' => true, 'message' => 'Clase creada correctamente']);

    }

    // Muestra una clase específica
    public function show(string $id)
    {
        $clase = Clase::findOrFail($id);

        return view('clases.show', compact('clase'));
    }

    // Muestra el formulario para editar una clase
    public function edit(string $id)
    {
        $clase = Clase::findOrFail($id);

        // Trae instructores para poder cambiar el instructor de la clase
        $instructores = Instructor::all();

        return view('clases.edit', compact('clase', 'instructores'));
    }

    // Actualiza una clase existente
    public function update(Request $request, string $id)
    {
        try {
            $clase = Clase::findOrFail($id);
            //Validación de días de la semana
            $request->validate([
                'DiasSemana' => 'required|array|min:1',
                'DiasSemana.*' => 'in:Lunes,Martes,Miércoles,Jueves,Viernes,Sábado,Domingo'
            ]); 
            $clase->update([
                'Nombre' => $request->Nombre,
                'Tipo' => $request->Tipo,
                'InstructorID' => $request->InstructorID,
                'DiasSemana' => implode(',', $request->DiasSemana),
                'Horario' => $request->Horario,
                'CupoMaximo' => $request->CupoMaximo,
                'Activa' => $request->boolean('activa') ? 1 : 0
            ]); 
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al actualizar la clase.'], 409);
        }
        return response()->json(['success' => true]);
    }

    // Elimina una clase
    public function destroy(string $id)
    {
        $clase = Clase::findOrFail($id);

        $clase->delete();

        return response()->json(['success' => true]);
    }
}