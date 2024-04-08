<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    use HasFactory;
    protected $table = 'paises';
    protected $primaryKey = 'id_pais';
    public $incrementing = true;
    protected $fillable = ['cod_pais', 'nombre_pais'];


    public function personasPaises()
    {
        return $this->hasMany(
            Persona::class,
            'id_persona'
        );
    }
    



}
