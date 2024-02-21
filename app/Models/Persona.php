<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    protected $table = 'personas';
    public $timestamps = false;
    protected $primaryKey = 'id_personas';
    protected $fillable = [
        'nombre_persona',
        'apellido_persona',
        'telefono_persona',
        'correo_persona',
        'genero',
        'direccion_persona'
    ];
    public function investigadoresPersonas()
    {
        return $this->hasMany(
            Investigador::class,
            'id_invest'
        );
    }
    public function paisesPersonas()
    {
        return $this->belongsTo(
            Pais::class,
            'id_pais'
        );
    }
}
