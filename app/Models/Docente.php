<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;

    protected $table = 'docentes';
    protected $primaryKey = 'id_docente';
    public $incrementing = true;
    public $timestamps = false;

    public function personasDocentes() {
        return $this-> hasMany(
            Persona::class, 
            'id_persona'
        );
     }
}
