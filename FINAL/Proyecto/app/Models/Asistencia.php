<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    // Nombre real de la tabla en SQL Server
    protected $table = 'Asistencias';

    // Clave primaria de la tabla
    protected $primaryKey = 'AsistenciaID';

    public $timestamps = false;

    // Campos que se pueden guardar masivamente
    protected $fillable = [
        'SocioID',
        'ClaseID',
        'FechaEntrada',
        'FechaSalida'
    ];

    //Relación con el modelo Socio
    public function socio()
    {
        return $this->belongsTo(Socio::class,
            'SocioID',
            'SocioID'
    );
    }

    //Relación con el modelo Clase
    public function clase()
    {
        return $this->belongsTo(Clase::class,
            'ClaseID',
            'ClaseID'
    );
    }   

}