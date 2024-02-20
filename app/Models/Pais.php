<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    use HasFactory;
    protected $primarKey = 'id_pais';
    public function departamentosPaises()
    {
        return $this->belongsTo(
            Departamento::class,
            'id_departamento'
        );
    }
}
