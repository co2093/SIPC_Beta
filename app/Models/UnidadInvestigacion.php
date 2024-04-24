<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnidadInvestigacion extends Model
{
    use HasFactory;
    protected $table = 'uu_de_invest';
    protected $primaryKey = 'id_unidad';
    public $incrementing = true;
    protected $fillable = [
        'nombre_unidad',
        'direccion_unidad',
        'fecha_fundacion',
        'telefono_unidad',
        'id_unidad_rrff',
        'id_dep_jerar',
        'id_form'
    ];
    public $timestamps = false;
    //relaciones
    public function investigadoresUnidadInvest()
    {
        return $this->hasMany(
            Investigador::class,
            'id_invest'
        );
    }
    public function formulariosUnidadInvest()
    {
        return $this->belongsTo(
            Formulario::class,
            'id_form'
        );
    }
    // responsablesCargos
    public function dependenciaJerarquica()
    {
        return $this->belongsTo(DependenciaJerarquica::class, 'id_dep_jerar');
    }

    public function unidadesRRFF()
    {
        return $this->belongsTo(UnidadesRRFF::class, 'id_unidad_rrff');
    }
}
