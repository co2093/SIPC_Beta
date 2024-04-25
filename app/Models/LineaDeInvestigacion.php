<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LineaDeInvestigacion extends Model
{
    use HasFactory;
    protected $table = 'lineas_investigaciones';
    protected $primaryKey = 'id_l_de_invest';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
        'nombre_l_invest',
        'descripcion_l_invest',
        'codigo_l_invest',
    ];
    public function lineasProyectos()
    {
        return $this->hasMany(Proyecto::class, 'id_proyecto');
    }
}
