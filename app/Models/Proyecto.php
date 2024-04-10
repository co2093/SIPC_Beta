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
}
