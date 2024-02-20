<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investigador extends Model
{
    use HasFactory;
    protected $table = 'investigadores';
    protected $primarKey = 'id_invest';
    public $timestamps = false;
    public function carrerasIvvestigadores()
    {
        return $this->belongsTo(
            Carrera::class,
            'id_carrera'
        );
    }
    public function personasInvestigadores()
    {
        return $this->belongsTo(
            Persona::class,
            'id_persona'
        );
    }
    public function unidadRRHHInvestigadores()
    {
        return $this->belongsTo(
            UnidadRecursosHumanos::class,
            'id_unidad_rrhh'
        );
    }
    public function gradosAcadInvestigadores()
    {
        return $this->belongsTo(
            GradoAcademico::class,
            'id_g_acad'
        );
    }
    public function unidadesInvestigadores()
    {
        return $this->belongsTo(
            UnidadInvestigacion::class,
            'id_unidad'
        );
    }
}
