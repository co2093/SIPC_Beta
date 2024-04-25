<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facultad extends Model
{
    use HasFactory;
    protected $table = 'facultades';
    protected $primaryKey = 'id_facultad';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
        'nombre_facultad',
        'codigo_facultad',
        'descripcion_facultad'
    ];
    public function carrerasFacultades()
    {
        return $this->hasMany(
            Carrera::class,
            'id_carrera'
        );
    }
    public function facultadesProyectos()
    {
        return $this->hasMany(
            Proyecto::class,
            'id_proyecto'
        );
    }
}
