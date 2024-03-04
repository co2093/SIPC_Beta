<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsolidadoFormulario extends Model
{
    use HasFactory;
    protected $table = 'consolidaciones';
    protected $primaryKey = 'id_consolidacion';
    public $incrementing = true;
    protected $fillable = [
        'estado_consolidacion',
        'periodos'
    ];
    public $timestamps = false;
    public function consolidacionesCierres()
    {
        return $this->hasMany(
            CierreFormulario::class,
            'id_cierre_periodo_'
        );
    }
    public function consolidacionesFacultades()
    {
        return $this->hasMany(
            Facultad::class,
            'id_facultad'
        );
    }
    public function consolidacionEstadosFormularios()
    {
        return $this->hasMany(
            EstadoFormulario::class,
            'id_e_form'
        );
    }
}
