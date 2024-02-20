<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;
    protected $primarKey = 'id_municipio';
    public function departamentosMunicipios()
    {
        return $this->belongsTo(
            Departamento::class,
            'id_departamento'
        );
    }
}
