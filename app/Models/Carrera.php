<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory;
    protected $table = 'carreras';
    public $timestamps = false;
    protected $primaryKey = 'id_carrera';
    public $incrementing = true;
    protected $fillable = ['cod_carrera', 'nombre_carrera', 'descrip_carrera'];
    public function facultadesCarreras()
    {
        return $this->belongsTo(
            Facultad::class,
            'id_facultad'
        );
    }
    public function investigadoresCarreras()
    {
        return $this->hasMany(
            Investigador::class,
            'id_invest'
        );
    }
    public function acronimosCarreras()
    {
        return $this->belongsTo(
            Acronimo::class,
            'id_acronimo'
        );
    }
    public function aa_de_uuCarreras()
    {
        return $this->hasMany(
            Aa_de_uu::class,
            'id_autoridad_unidad'
        );
    }
}
