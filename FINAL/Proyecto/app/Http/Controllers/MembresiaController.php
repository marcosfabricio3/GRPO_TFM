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
        Membresia::create($request->all());

        return redirect()->route('membresias.index');
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

        return redirect()->route('membresias.index');
    }

    // Elimina una membresía
    public function destroy(string $id)
    {
        $membresia = Membresia::findOrFail($id);

        $membresia->delete();

        return redirect()->route('membresias.index');
    }
}