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
        Clase::create($request->all());

        return redirect()->route('clases.index');
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
        $clase = Clase::findOrFail($id);

        $clase->update($request->all());

        return redirect()->route('clases.index');
    }

    // Elimina una clase
    public function destroy(string $id)
    {
        $clase = Clase::findOrFail($id);

        $clase->delete();

        return redirect()->route('clases.index');
    }
}