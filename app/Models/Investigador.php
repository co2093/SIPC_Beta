<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investigador extends Model
{
    use HasFactory;
    protected $table = 'investigadores';
    protected $primarKey='id_invest';
    public $timestamps = false;
    public function carreras(){
        return $this->belongsTo("App\Models\Carrera","id_carrera","id_carrera");
    }
    public function personas(){
        return $this->belongsTo("App\Models\Persona","id_persona","id_persona");
    }
    public function unidadRecursosHumanos(){
        
    }
}
