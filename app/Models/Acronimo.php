<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acronimo extends Model
{
    use HasFactory;
    protected $table = 'acronimos';
    protected $primaryKey = 'id_acronimo';
    public $incrementing = true;
    protected $fillable = [
        'nombre_acronimo',
        'codigo_acronimo', 
        'descripcion_acronimo'
    ];
    public $timestamps = false;
    public function acronimosCarreras()
    {
        return $this->hasMany(
            Carrera::class,
            'id_carrera'
        );
    }
    public function acronimosGradosAcademicos()
    {
        return $this->hasMany(
            GradoAcademico::class,
            'id_g_acad'
        );
    }
}
