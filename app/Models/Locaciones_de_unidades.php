<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Locaciones_de_unidades extends Model
{
    use HasFactory;

    protected $table ='loc_de_uu';
    protected $primaryKey="id_locacion";
    public $incrementing=false;
    public $timestamps=false;

    public function t_infraestructuras(){
        return $this->hasMany(T_infraestructuras::class,'id_t_infra','id_t_infra');
    }

    public static function getProyects(){
        $proyectos_collection=DB::table('proyectos')
            ->select('id_proyecto', 'nombre_proyecto')
            ->get();
        return $proyectos_collection;
    } 
    public static function findByIdCustom(){
        $proyectos_collection=DB::table('proyectos')
            ->select('nombre_proyecto')
            ->get();
        return $proyectos_collection;
    } 
}
