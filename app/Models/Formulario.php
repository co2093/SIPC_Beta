<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formulario extends Model
{
    use HasFactory;
    protected $table = 'forms';
    protected $primaryKey = 'id_form';
    public $incrementing = true;
    protected $fillable = [
        'descripcion_form',
        'fecha_creacion_form'
    ];
    public $timestamps = false;
    public function formulariosTipos()
    {
        return $this->belongsTo(
            TipoFormulario::class,
            'id_t_form'
        );
    }
    public function formulariosEstados()
    {
        return $this->hasMany(
            EstadoFormulario::class,
            'id_e_form'
        );
    }
    public function formulariosCierres()
    {
        return $this->belongsTo(
            CierreFormulario::class,
            'id_cierre_periodo_'
        );
    }
    public function formulariosUnidadesInvestigacion()
    {
        return $this->hasMany(
            UnidadInvestigacion::class,
            'id_unidad'
        );
    }
}
