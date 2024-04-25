<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaDeConocimiento extends Model
{
    use HasFactory;
    protected $table = 'areas_de_conocimientos';
    protected $primaryKey = 'id_area_conocimiento';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
        'codigo_area_conocimiento',
        'nombre_area_conocimiento',
        'descripcion_area_conocimiento',
    ];
    public function areasProyecto()
    {
        return $this->hasMany(Proyecto::class, 'i_proyecto');
    }
}
