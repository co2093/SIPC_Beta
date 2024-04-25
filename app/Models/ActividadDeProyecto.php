<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActividadDeProyecto extends Model
{
    use HasFactory;
    protected $table = 'actividades_de_proyectos';
    protected $primaryKey = 'id_actividad';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
        'nombre_actividad',
        'descripcion_actividad',
        'fecha_inicio_actividad',
        'fecha_fin_actividad'
    ];
    public function actividadesIMasDProyecto(){
        return $this->belongsTo(
        Proyecto::class,
        'id_proyecto');
    }
}
