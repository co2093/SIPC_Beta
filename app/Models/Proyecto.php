<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;
    protected $table = 'proyectos';
    protected $primaryKey = 'id_proyecto';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
        'nombre_proyecto',
        'descripcion_proyecto',
        'codigo_proyecto_sicues',
        'codigo_proyecto_facultad',
        'fecha_inicio_proyecto',
        'fecha_fin_proyecto'
    ];
    public function proyectosAreasConocimiento()
    {
        return $this->belongsTo(
            AreaDeConocimiento::class,
            'id_area_conocimiento'
        );
    }
    public function proyectosUnidadesRRHH()
    {
        return $this->belongsTo(
            UnidadRecursosHumanos::class,
            'id_unidad_rrhh'
        );
    }
    public function proyectosUnidadesInvest()
    {
        return $this->belongsTo(
            UnidadInvestigacion::class,
            'id_unidad'
        );
    }
    public function proyectosObjetivos()
    {
        return $this->belongsTo(ObjetivoProyecto::class, 'id_ojetivo');
    }
    public function proyectosLineasInvest()
    {
        return $this->belongsTo(
            LineaDeInvestigacion::class,
            'id_l_de_invest'
        );
    }
    public function proyectosInvest()
    {
        return $this->hasOne(
            Investigador::class,
            'id_proyecto' // Clave externa en la tabla investigadores
        );
    }
    public function proyectosFacultades()
    {
        return $this->belongsTo(
            Facultad::class,
            'id_facultad'
        );
    }
    public function investigador()
    {
        return $this->belongsTo(Investigador::class, 'id_invest');
    }
}
