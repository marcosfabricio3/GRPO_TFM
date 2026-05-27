<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Socio extends Model
{
    // Nombre real de la tabla en SQL Server
    protected $table = 'Socios';

    // Clave primaria de la tabla
    protected $primaryKey = 'SocioID';

    public $timestamps = false;

    // Campos que se pueden guardar masivamente
    protected $fillable = [
        'Nombre',
        'DocumentoIdentidad',
        'Email',
        'Telefono',
        'FechaNacimiento',
        'FechaAlta',
        'Activo'
    ];
}