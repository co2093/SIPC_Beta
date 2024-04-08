<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    use HasFactory;



    public function aa_de_uuCargos() {
        return $this-> hasMany(
            Aa_de_uu::class, 
            'id_autoridad_unidad'
        );
     }


}
