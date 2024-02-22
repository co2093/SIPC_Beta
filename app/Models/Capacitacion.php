<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capacitacion extends Model
{
    use HasFactory;
    protected $table = 'capacitaciones';
    protected $primaryKey = 'id_cap';
    public $incrementing = true;
    protected $fillable = [
        'cod_capacitacion',
        'nombre_capacitacion',
        'tipo_capacitacion',
        'descrip_capacitacion',
        'duracion_capacitacion'
    ];
    public function investigadoresCapacitaciones()
    {
        return $this->hasMany(
            Investigador::class,
            'id_invest'
        );
    }
}
