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


    public function aa_de_uuPersonas() {
        return $this-> hasMany(
            Aa_de_uu::class, 
            'id_autoridad_unidad'
        );
     }


      
     public function paisesPersonas()
     {
         return $this->belongsTo(
             Pais::class,
             'id_pais'
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

     public function investigadoresPersonas()
     {
         return $this->belongsTo(
             Investigador::class,
             'id_invest'
         );
     }
      

/* 3 funciones para relacion: docentes->(facultad, materias), colaboradores->(capacitaciones), investigadores */

}
