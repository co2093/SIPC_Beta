<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObjetivoProyecto extends Model
{
    use HasFactory;
    protected $table = 'objetivos_de_proyecto';
    protected $primaryKey = 'id_objetivo';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
        'titulo_objetivo',
        'descripcion_objetivo',
    ];
}
