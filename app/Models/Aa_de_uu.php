<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Aa_de_uu extends Model
{
    use HasFactory;
    protected $table = 'aa_de_uu';
    protected $primaryKey = 'id_autoridad_unidad';
    protected $fillable = [
        'autoridad_superior',
        'id_cargo',
        'id_carrera',
        'id_g_acad',
        'id_persona',
        'id_unidad'
    ];
    public $timestamps = false;
    public $incrementing = true;

    // Accesor para el campo responsable
    public function getResponsableAttribute($value)
    {
        return $value = 'Superior';
    }
    public static function getPersona($nombre)
    {
        $personas_collection = DB::table('personas')
            ->select('id_persona', 'nombre_persona', 'apellido_persona', 'telefono_persona', 'correo_persona')->where('nombre_persona', '=', $nombre)
            ->get();
        return $personas_collection;
    }


    public static function getCargo($id)
    {
        $colaboradores_collection = DB::table('cargos')
            ->select('id_carrera', 'id_g_acad')->where('id_persona', '=', $id)
            ->get();
        return $colaboradores_collection;
    }


    public static function getGradoAcademico($id)
    {
        $colaboradores_collection = DB::table('grados_academicos')
            ->select('id_carrera', 'id_g_acad')->where('id_persona', '=', $id)
            ->get();
        return $colaboradores_collection;
    }


    public static function getColaborador($id)
    {
        $colaboradores_collection = DB::table('colaboradores')
            ->select('id_carrera', 'id_g_acad')->where('id_persona', '=', $id)
            ->get();
        return $colaboradores_collection;
    }


    public static function getDocente($id)
    {
        $docentes_collection = DB::table('docentes')
            ->select('id_carrera', 'id_g_acad')->where('id_persona', '=', $id)
            ->get();
        return $docentes_collection;
    }


    public static function getInvestigador($id)
    {
        $investigadores_collection = DB::table('investigadores')
            ->select('id_carrera', 'id_g_acad')->where('id_persona', '=', $id)
            ->get();
        return $investigadores_collection;
    }


    public function personasAa_de_uu()
    {
        return $this->belongsTo(
            Persona::class,
            'id_persona'
        );
    }

    public function gradosacademicosAa_de_uu()
    {
        return $this->belongsTo(
            GradoAcademico::class,
            'id_g_acad'
        );
    }

    public function carrerasAa_de_uu()
    {
        return $this->belongsTo(
            Carrera::class,
            'id_carrera'
        );
    }

    public function cargosAa_de_uu()
    {
        return $this->belongsTo(
            Cargo::class,
            'id_cargo'
        );
    }
}
