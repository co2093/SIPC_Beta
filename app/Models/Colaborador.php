<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colaborador extends Model
{
    use HasFactory;
    protected $table = 'colaboradores';
    protected $primaryKey = 'id_colaborador';
    public $incrementing = true;
    public $timestamps = false;

    
    public function personasColaboradores() {
        return $this-> hasMany(
            Persona::class, 
            'id_persona'
        );
     }
}
