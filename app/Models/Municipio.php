<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;
    protected $table='municipios';
    protected $primaryKey = 'id_municipio';
    public $incrementing = true;
    protected $fillable = ['cod_municipio','nombre_municipio'];
    public function departamentosMunicipios()
    {
        return $this->belongsTo(
            Departamento::class,
            'id_departamento'
        );
    }
}