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
        Instructor::create($request->all());

        return redirect()->route('instructores.index');
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
        $instructor = Instructor::findOrFail($id);

        $instructor->update($request->all());

        return redirect()->route('instructores.index');
    }

    // Elimina un instructor
    public function destroy(string $id)
    {
        $instructor = Instructor::findOrFail($id);

        $instructor->delete();

        return redirect()->route('instructores.index');
    }
}