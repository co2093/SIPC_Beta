<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investigador extends Model
{
    use HasFactory;
    protected $table = 'investigadores';
    protected $primaryKey = 'id_invest';
    public $incrementing = true;
    public $timestamps = false;

    public function carrerasInvestigadores()
    {
        return $this->belongsTo(
            Carrera::class,
            'id_carrera'
        );
    }
    public function investigadoresProyecto()
    {
        return $this->hasMany(Proyecto::class, 'id_proyecto');
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

    public function capacitacionesInvestigadores()
    {
        return $this->belongsTo(
            Capacitacion::class,
            'id_cap'
        );
    }
    //uso de tabla intermedia
    public function proyectos()
    {
        return $this->belongsToMany(
            Proyecto::class,
            'invest_proyectos',
            'id_invest',
            'id_proyecto'
        );
    }
}
