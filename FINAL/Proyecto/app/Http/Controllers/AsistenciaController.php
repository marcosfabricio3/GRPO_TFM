<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Asistencia;
use App\Models\Socio;
use App\Models\Clase;
use App\Models\Inscripcion;

class AsistenciaController extends Controller
{
    // INDEX - Este método se usa para listar todas las asistencias.
    public function index()
    {
        // Trae todos los registros de la tabla asistencias.
        $asistencias = Asistencia::all();

        // Retorna la vista "asistencias.index" y le envía la variable $asistencias.
        return view('asistencias.index', compact('asistencias'));
    }


    // CREATE - Muestra el formulario para crear una asistencia nueva.
    public function create()
    {
        $socios = Socio::all();
        $clases = Clase::all();
        // Carga la vista del formulario de creación.
        return view('asistencias.create', compact( 
        'socios', 'clases' ));
    }


    // STORE - Guarda una nueva asistencia en la base de datos.
    public function store(Request $request)
    {
        try{
            //Verificar todas las membresías del socio y verificar que al menos una tenga una inscripción activa
            $Inscripcion = Inscripcion::where('SocioID', $request->SocioID)->where('Estado', 'Activa')->first();
            if (!$Inscripcion) {
                return response()->json(['success' => false, 'message' => 'El socio no cuenta con una inscripción activa.'], 409);
            }
            Asistencia::create([
                'SocioID' => $request->SocioID,
                'ClaseID' => $request->ClaseID,
                'FechaEntrada' => str_replace('T',' ',$request->FechaEntrada),
                'FechaSalida' => str_replace('T',' ',$request->FechaSalida)
            ]);

        } catch(Exception $e){
            return response()->json(['success' => false, 'message' => 'Error al crear la asistencia. Contacte al administrador.'], 409);
        }
            return response()->json(['success' => true, 'message' => 'Asistencia ingresada correctamente.']);
    }


    // SHOW - Muestra una asistencia específica. Se usa para ver el detalle de un solo registro.
    public function show(string $id)
    {
    // Busca la asistencia por ID, si no existe, Laravel muestra error 404.
    $asistencia = Asistencia::findOrFail($id);

    // Retorna la vista de detalle y le manda la asistencia encontrada.
    return view('asistencias.show', compact('asistencia'));
    }


    // EDIT - Muestra el formulario para editar una asistencia existente.
    public function edit(string $id)
    {
        // Busca la asistencia por ID, si no existe, Laravel muestra error 404 automáticamente.
        $asistencia = Asistencia::findOrFail($id);

        $socios = Socio::all();
        $clases = Clase::all();

        // Retorna la vista de edición y le manda la asistencia encontrada.
        return view('asistencias.edit', compact('asistencia', 'socios', 'clases'));
    }


    // UPDATE - Actualiza una asistencia existente.
    public function update(Request $request, string $id)
    {
        try{
            $asistencia = Asistencia::findOrFail($id);
        
            $asistencia->update([
                'SocioID' => $request->SocioID,
                'ClaseID' => $request->ClaseID,
                'FechaEntrada' => str_replace('T',' ',$request->FechaEntrada),
                'FechaSalida' => str_replace('T',' ',$request->FechaSalida)
            ]);
        } catch(\Exception $e){
            return response()->json(['success' => false, 'message' => 'Error al actualizar la asistencia. Contacte al administrador.'], 409);
        }
        return response()->json(['success' => true, 'message' => 'Asistencia actualizada correctamente.']);
    }
    // DESTROY - Elimina una asistencia de la base de datos.
    public function destroy(string $id)
    {
        try{
            $asistencia = Asistencia::findOrFail($id);
            $asistencia->delete();

        } catch(\Exception $e){
            return response()->json(['success' => false, 'message' => 'Error al eliminar la asistencia. Contacte al administrador.'], 409);
        }
        return response()->json(['success' => true, 'message' => 'Asistencia eliminada correctamente.']);
    }
}