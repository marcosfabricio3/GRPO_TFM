<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Instructor;

class Clase extends Model
{
    // Nombre real de la tabla en SQL Server
    protected $table = 'Clases';

    // Clave primaria de la tabla
    protected $primaryKey = 'ClaseID';

    public $timestamps = false;

    // Campos que se pueden guardar masivamente
    protected $fillable = [
        'Nombre',
        'Tipo',
        'InstructorID',
        'DiasSemana',
        'Horario',
        'CupoMaximo',
        'Activa'
    ];

    // Relación con Instructor
    public function instructor()
    {
        return $this->belongsTo(
            Instructor::class,
            'InstructorID',
            'InstructorID'
        );
    }
}
