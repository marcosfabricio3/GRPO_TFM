<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Membresia extends Model
{
    // Nombre real de la tabla en SQL Server
    protected $table = 'Membresias';

    // Clave primaria de la tabla
    protected $primaryKey = 'MembresiaID';

    public $timestamps = false;

    // Campos que se pueden guardar masivamente
    protected $fillable = [
        'Tipo',
        'Precio',
        'CantidadClasesIncluidas',
        'Descripcion'
    ];
}