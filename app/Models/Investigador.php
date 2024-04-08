<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investigador extends Model
{
    use HasFactory;
    protected $table = 'investigadores';
    protected $primaryKey = 'id_invest';
    public $incrementing = true;
    public $timestamps = false;



    public function personasInvestigadores() {
        return $this-> hasMany(
            Persona::class, 
            'id_persona'
        );
     }
}
