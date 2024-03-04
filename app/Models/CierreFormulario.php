<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CierreFormulario extends Model
{
    use HasFactory;
    protected $table = 'cierres_periodos_';
    protected $primaryKey = 'id_cierre_periodo_';
    public $incrementing = true;
    protected $fillable = [
        'estado_periodo_',
        'fecha_periodo_'
    ];
    public $timestamps = false;
    public function cierresConsolidados()
    {
        return $this->belongsTo(
            ConsolidadoFormulario::class,
            'id_consolidacion'
        );
    }
    public function cierresFormularios(){
        return $this->hasMany(
            Formulario::class,
            'id_form'
        );
    }
}
