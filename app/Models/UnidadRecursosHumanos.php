<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnidadRecursosHumanos extends Model
{
    use HasFactory;
    protected $primarKey = 'id_unidad';
    protected $fillable = ['nombre_unidad'];
    public function investigadoresUnidadRRHH()
    {
        return $this->hasMany(
            Investigador::class,
            'id_invest'
        );
    }
}
