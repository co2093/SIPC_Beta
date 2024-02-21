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
    protected $fillable=['cod_carrera','nombre_carrera','descrip_carrera'];
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
}
