<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UnidadDeInvestigacion;

class UnidadesRRFF extends Model
{
    use HasFactory;

    protected $table = 'unidades_rrff';
    public $timestamps = false;
    protected $primaryKey = 'id_unidad_rrff';
    public $incrementing = true;

    protected $fillable = [
        'nombre_unidad_rrff'
    ];

    
/*
    public function UnidadesDeInvestigacion(){
        return $this->belongsTo(UnidadDeInvestigacion::class, 'id_unidad', 'id_unidad_rrff');
    }*/
}
