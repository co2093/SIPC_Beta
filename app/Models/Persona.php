<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    protected $table = 'personas';
    public $timestamps = false;
    protected $primaryKey = 'id_persona';
    public $incrementing = true;
    protected $fillable = [
        'nombre_persona',
        'apellido_persona',
        'telefono_persona',
        'correo_persona',
        'genero_persona',
        'direccion_persona',
        'edad_persona'
    ];

    // Accesor para el campo genero_persona
    public function getGeneroPersonaAttribute($value)
    {
        return $value ? 'Masculino' : 'Femenino';
    }

    public function investigadoresPersonas()
    {
        return $this->hasOne(
            Investigador::class,
            'id_persona'
        );
    }
    public function paisesPersonas()
    {
        return $this->belongsTo(
            Pais::class,
            'id_pais'
        );
    }
    public function aa_de_uuPersonas()
    {
        return $this->hasMany(
            Aa_de_uu::class,
            'id_autoridad_unidad'
        );
    }
    public function colaboradoresPersonas()
    {
        return $this->belongsTo(
            Colaborador::class,
            'id_colaborador'
        );
    }
    public function docentesPersonas()
    {
        return $this->belongsTo(
            Docente::class,
            'id_docente'
        );
    }
}
