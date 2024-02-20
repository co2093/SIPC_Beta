<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;
    protected $primarKey = 'id_departamento';
    public function paisDepartamentos()
    {
        return $this->belongsTo(
            Pais::class,
            'id_pais'
        );
    }
    public function municipiosDepartamentos()
    {
        return $this->hasMany(
            Municipio::class,
            'id_municipio'
        );
    }
}
