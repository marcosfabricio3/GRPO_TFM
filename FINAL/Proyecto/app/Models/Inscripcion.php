<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Socio;
use App\Models\Membresia;
use App\Models\Pago;

class Inscripcion extends Model
{
    // Nombre real de la tabla en SQL Server
    protected $table = 'Inscripciones';

    // Clave primaria de la tabla
    protected $primaryKey = 'InscripcionID';

    public $timestamps = false;

    // Campos que se pueden guardar masivamente
    protected $fillable = [
        'SocioID',
        'MembresiaID',
        'FechaInicio',
        'FechaVencimiento',
        'Estado',
        'FechaCreacion'
    ];

    // Relación con Socios
    public function socio()
    {
        return $this->belongsTo(
            Socio::class,
            'SocioID',
            'SocioID'
        );
    }

    // Relación con Membresias
    public function membresia()
    {
        return $this->belongsTo(
            Membresia::class,
            'MembresiaID',
            'MembresiaID'
        );
    }

    // Relación con Pagos
    public function pagos()
    {
        return $this->hasMany(
            Pago::class,
            'InscripcionID',
            'InscripcionID'
        );
    }
}