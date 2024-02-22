<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnidadRecursosHumanos extends Model
{
    use HasFactory;
    protected $table = 'unidades_rrhh';
    protected $primaryKey = 'id_unidad';
    public $incrementing = true;
    protected $fillable = ['nombre_unidad'];
    public function investigadoresUnidadRRHH()
    {
        return $this->hasMany(
            Investigador::class,
            'id_invest'
        );
    }
}
