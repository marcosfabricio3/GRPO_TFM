<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Asistencia;
use App\Models\Socio;
use App\Models\Clase;


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
        // Crea un nuevo registro usando los datos del formulario $request->all() trae todos los campos enviados.
        Asistencia::create([

            'SocioID' => $request->SocioID,

            'ClaseID' => $request->ClaseID,

            'FechaEntrada' => str_replace
            (
                'T',
                ' ',
                $request->FechaEntrada
            ),

            'FechaSalida' => str_replace
            (
                'T',
                ' ',
                $request->FechaSalida
            )

        ]);

        // Redirecciona al listado de asistencias.
        return redirect()->route('asistencias.index');
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
    // Busca la asistencia por ID
    $asistencia = Asistencia::findOrFail($id);

    // Actualiza los datos
    $asistencia->update([

        'SocioID' => $request->SocioID,

        'ClaseID' => $request->ClaseID,

        'FechaEntrada' => str_replace(
            'T',
            ' ',
            $request->FechaEntrada
        ),

        'FechaSalida' => str_replace(
            'T',
            ' ',
            $request->FechaSalida
        )

    ]);

    // Redirecciona al listado
    return redirect()->route('asistencias.index');
    }


    // DESTROY - Elimina una asistencia de la base de datos.
    public function destroy(string $id)
    {
        // Busca la asistencia por ID, si no existe, Laravel muestra error 404 automáticamente.
        $asistencia = Asistencia::findOrFail($id);

        // Elimina el registro de la base de datos.
        $asistencia->delete();

        // Redirecciona al listado actualizado.
        return redirect()->route('asistencias.index');
    }
}