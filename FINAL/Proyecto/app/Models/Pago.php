<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Inscripcion;

class Pago extends Model
{
    // Nombre real de la tabla en SQL Server
    protected $table = 'Pagos';

    // Clave primaria de la tabla
    protected $primaryKey = 'PagoID';

    public $timestamps = false;

    // Campos que se pueden guardar masivamente
    protected $fillable = [

        'InscripcionID',

        'Monto',

        'FechaPago',

        'MedioPago'

    ];

    // Relación con Inscripción
    public function inscripcion()
    {
        return $this->belongsTo(
            Inscripcion::class,
            'InscripcionID',
            'InscripcionID'
        );
    }
}