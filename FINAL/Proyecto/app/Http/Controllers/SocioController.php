<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Socio;

class SocioController extends Controller
{
    // Lista todos los socios
    public function index()
    {
        $socios = Socio::all();

        return view('socios.index', compact('socios'));
    }

    // Muestra el formulario para crear un socio
    public function create()
    {
        return view('socios.create');
    }

    // Guarda un socio nuevo
    public function store(Request $request)
    {
        Socio::create([
        'Nombre' => $request->Nombre,
        'DocumentoIdentidad' => $request->DocumentoIdentidad,
        'Email' => $request->Email,
        'Telefono' => $request->Telefono,
        'FechaNacimiento' => $request->FechaNacimiento,
        'FechaAlta' => now(),
        'Activo' => 1
    ]);

    return redirect()->route('socios.index');
    }

    // Muestra un socio específico
    public function show(string $id)
    {
        $socio = Socio::findOrFail($id);

        return view('socios.show', compact('socio'));
    }

    // Muestra el formulario para editar un socio
    public function edit(string $id)
    {
        $socio = Socio::findOrFail($id);

        return view('socios.edit', compact('socio'));
    }

    // Actualiza un socio existente
    public function update(Request $request, string $id)
    {
        $socio = Socio::findOrFail($id);

        $socio->Nombre = $request->Nombre;
        $socio->DocumentoIdentidad = $request->DocumentoIdentidad;
        $socio->Email = $request->Email;
        $socio->Telefono = $request->Telefono;
        $socio->FechaNacimiento = $request->FechaNacimiento;
        $socio->Activo = $request->has('activo');

        $socio->save();

        return response()->json(['success' => true]);    
    }

    // Elimina un socio
    public function destroy(string $id) {
        $socio = Socio::findOrFail($id);
        
        if(
            $socio->inscripciones()->exists() ||
            $socio->asistencias()->exists()
        ) {
            return response()->json([
                'success' => false,
                'message' => 'No se puede eliminar el socio porque tiene inscripciones o asistencias.'], 409);
        }

        $socio->delete();
        return response()->json(['success' => true]);
    }
}