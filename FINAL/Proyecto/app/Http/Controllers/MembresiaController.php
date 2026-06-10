<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membresia;

class MembresiaController extends Controller
{
    // Lista todas las membresías
    public function index()
    {
        $membresias = Membresia::all();

        return view('membresias.index', compact('membresias'));
    }

    // Muestra el formulario para crear una membresía
    public function create()
    {
        return view('membresias.create');
    }

    // Guarda una membresía nueva
    public function store(Request $request)
    {
        try {
            Membresia::create($request->all());
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => 'Error al crear la membresia.', 409]);
        }
        return response()->json(['success' => true, 'message' => 'Membresía creada correctamente.']);
    }

    // Muestra una membresía específica
    public function show(string $id)
    {
        $membresia = Membresia::findOrFail($id);

        return view('membresias.show', compact('membresia'));
    }

    // Muestra el formulario para editar una membresía
    public function edit(string $id)
    {
        $membresia = Membresia::findOrFail($id);

        return view('membresias.edit', compact('membresia'));
    }

    // Actualiza una membresía existente
    public function update(Request $request, string $id)
    {
        $membresia = Membresia::findOrFail($id);

        $membresia->update($request->all());

        return response()->json(['success' => true]);
    }

    // Elimina una membresía
    public function destroy(string $id)
    {
        $membresia = Membresia::findOrFail($id);

        $membresia->delete();

        return response()->json(['success' => true]);
    }
}