<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    // Nombre real de la tabla en SQL Server
    protected $table = 'Instructores';

    // Clave primaria de la tabla
    protected $primaryKey = 'InstructorID';

    public $timestamps = false;

    // Campos que se pueden guardar masivamente
    protected $fillable = [
        'Nombre',
        'Especialidad',
        'Email',
        'Telefono',
        'Activo',
        'FechaAlta'
    ];
}