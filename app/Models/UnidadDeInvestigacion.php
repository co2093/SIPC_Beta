<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DependenciaJerarquica;
use App\Models\UnidadesRRFF;

class UnidadDeInvestigacion extends Model
{
    use HasFactory;

    protected $table = 'uu_de_invest'; 
    public $timestamps = false;
    protected $primaryKey = 'id_unidad';
    public $incrementing = true;
    
    protected $fillable=[
        'nombre_unidad',
        'direccion_unidad',
        'fecha_fundacion',
        'telefono_unidad',
        'id_unidad_rrff',
        'id_dep_jerar',
        'id_form'
    ];

    // responsablesCargos
    public function dependenciaJerarquica(){
        return $this->belongsTo(DependenciaJerarquica::class, 'id_dep_jerar');
    }

    public function unidadesRRFF(){
        return $this->belongsTo(UnidadesRRFF::class,'id_unidad_rrff');
    }
    
}
