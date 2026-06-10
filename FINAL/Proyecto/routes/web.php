<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocioController;
use App\Http\Controllers\MembresiaController;
use App\Http\Controllers\InscripcionController;
use App\Http\Controllers\ClaseController;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\InstructorController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Rutas protegidas con autenticación
Route::middleware('auth')->group(function () {
    //Socios
    Route::get('/socios', [SocioController::class, 'index'])->name('socios.index');
    Route::get('/socios/create', [SocioController::class, 'create'])->name('socios.create');
    Route::post('/socios', [SocioController::class, 'store'])->name('socios.store');
    Route::get('/socios/{socio}', [SocioController::class, 'show'])->name('socios.show');
    Route::get('/socios/{socio}/edit', [SocioController::class, 'edit'])->name('socios.edit');
    Route::put('/socios/{socio}', [SocioController::class, 'update'])->name('socios.update');
    Route::delete('/socios/{socio}', [SocioController::class, 'destroy'])->name('socios.destroy');

    // Membresias
    Route::get('/membresias', [MembresiaController::class, 'index'])->name('membresias.index');
    Route::get('/membresias/create', [MembresiaController::class, 'create'])->name('membresias.create');    
    Route::post('/membresias', [MembresiaController::class, 'store'])->name('membresias.store');    
    Route::get('/membresias/{membresia}', [MembresiaController::class, 'show'])->name('membresias.show');    
    Route::get('/membresias/{membresia}/edit', [MembresiaController::class, 'edit'])->name('membresias.edit');    
    Route::put('/membresias/{membresia}', [MembresiaController::class, 'update'])->name('membresias.update');    
    Route::delete('/membresias/{membresia}', [MembresiaController::class, 'destroy'])->name('membresias.destroy');  

    // Inscripciones
    Route::get('/inscripciones', [InscripcionController::class, 'index'])->name('inscripciones.index');
    Route::get('/inscripciones/create', [InscripcionController::class, 'create'])->name('inscripciones.create');
    Route::post('/inscripciones', [InscripcionController::class, 'store'])->name('inscripciones.store');
    Route::get('/inscripciones/{inscripcion}', [InscripcionController::class, 'show'])->name('inscripciones.show');
    Route::get('/inscripciones/{inscripcion}/edit', [InscripcionController::class, 'edit'])->name('inscripciones.edit');
    Route::put('/inscripciones/{inscripcion}', [InscripcionController::class, 'update'])->name('inscripciones.update');
    Route::delete('/inscripciones/{inscripcion}', [InscripcionController::class, 'destroy'])->name('inscripciones.destroy');

    // Clases
    Route::get('/clases', [ClaseController::class, 'index'])->name('clases.index');
    Route::get('/clases/create', [ClaseController::class, 'create'])->name('clases.create');
    Route::post('/clases', [ClaseController::class, 'store'])->name('clases.store');
    Route::get('/clases/{clase}', [ClaseController::class, 'show'])->name('clases.show');
    Route::get('/clases/{clase}/edit', [ClaseController::class, 'edit'])->name('clases.edit');
    Route::put('/clases/{clase}', [ClaseController::class, 'update'])->name('clases.update');
    Route::delete('/clases/{clase}', [ClaseController::class, 'destroy'])->name('clases.destroy');

    // Asistencias
    Route::get('/asistencias', [AsistenciaController::class, 'index'])->name('asistencias.index');
    Route::get('/asistencias/create', [AsistenciaController::class, 'create'])->name('asistencias.create');
    Route::post('/asistencias', [AsistenciaController::class, 'store'])->name('asistencias.store');
    Route::get('/asistencias/{asistencia}', [AsistenciaController::class, 'show'])->name('asistencias.show');
    Route::get('/asistencias/{asistencia}/edit', [AsistenciaController::class, 'edit'])->name('asistencias.edit');
    Route::put('/asistencias/{asistencia}', [AsistenciaController::class, 'update'])->name('asistencias.update');
    Route::delete('/asistencias/{asistencia}', [AsistenciaController::class, 'destroy'])->name('asistencias.destroy');

    // Pagos
    Route::get('/pagos', [PagoController::class, 'index'])->name('pagos.index');
    Route::get('/pagos/create', [PagoController::class, 'create'])->name('pagos.create');
    Route::post('/pagos', [PagoController::class, 'store'])->name('pagos.store');
    Route::get('/pagos/{pago}', [PagoController::class, 'show'])->name('pagos.show');
    Route::get('/pagos/{pago}/edit', [PagoController::class, 'edit'])->name('pagos.edit');
    Route::put('/pagos/{pago}', [PagoController::class, 'update'])->name('pagos.update');
    Route::delete('/pagos/{pago}', [PagoController::class, 'destroy'])->name('pagos.destroy');

    // Instructores
    Route::get('/instructores', [InstructorController::class, 'index'])->name('instructores.index');
    Route::get('/instructores/create', [InstructorController::class, 'create'])->name('instructores.create');
    Route::post('/instructores', [InstructorController::class, 'store'])->name('instructores.store');
    Route::get('/instructores/{instructor}', [InstructorController::class, 'show'])->name('instructores.show');
    Route::get('/instructores/{instructor}/edit', [InstructorController::class, 'edit'])->name('instructores.edit');
    Route::put('/instructores/{instructor}', [InstructorController::class, 'update'])->name('instructores.update');
    Route::delete('/instructores/{instructor}', [InstructorController::class, 'destroy'])->name('instructores.destroy');

});

require __DIR__.'/auth.php';
