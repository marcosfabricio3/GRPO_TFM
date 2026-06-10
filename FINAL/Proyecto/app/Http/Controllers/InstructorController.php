<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instructor;

class InstructorController extends Controller
{
    // Lista todos los instructores
    public function index()
    {
        $instructores = Instructor::all();

        return view('instructores.index', compact('instructores'));
    }

    // Muestra el formulario para crear un instructor
    public function create()
    {
        return view('instructores.create');
    }

    // Guarda un instructor nuevo
    public function store(Request $request)
    {
        try{
            Instructor::create([
                'Nombre' => $request->Nombre,
                'Especialidad' => $request->Especialidad,
                'Email' => $request->Email,
                'Telefono' => $request->Telefono,
                'Activo' => $request->Activo ? 1 : 0
            ]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al crear el instructor. Contacte al administrador.'], 409);
        }
        
        return response()->json(['success' => true, 'message' => 'Instructor creado correctamente.']);
    }

    // Muestra un instructor específico
    public function show(string $id)
    {
        $instructor = Instructor::findOrFail($id);

        return view('instructores.show', compact('instructor'));
    }

    // Muestra el formulario para editar un instructor
    public function edit(string $id)
    {
        $instructor = Instructor::findOrFail($id);

        return view('instructores.edit', compact('instructor'));
    }

    // Actualiza un instructor existente
    public function update(Request $request, string $id)
    {
        try{
            $instructor = Instructor::findOrFail($id);
            $instructor->Nombre = $request->Nombre;
            $instructor->Especialidad = $request->Especialidad;
            $instructor->Email = $request->Email;
            $instructor->Telefono = $request->Telefono;
            $instructor->Activo = $request->has('Activo');
            
            $instructor->save();
        }catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al actualizar el instructor. Contacte al administrador.'], 409);
        }
        return response()->json(['success' => true, 'message' => 'Instructor actualizado correctamente.']);
    }

    // Elimina un instructor
    public function destroy(string $id)
    {
        try{
            $instructor = Instructor::findOrFail($id);
            $instructor->delete();
        }catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al eliminar el instructor. Contacte al administrador.'], 409);
        }
        
        return response()->json(['success' => true, 'message' => 'Instructor eliminado correctamente.']);
    }
}