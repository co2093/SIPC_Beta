<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UnidadDeInvestigacion;

class DependenciaJerarquica extends Model
{
    use HasFactory;

    protected $table = 'dd_jj';
    public $timestamps = false;
    protected $primaryKey = 'id_dep_jerar';
    public $incrementing = true;
    protected $fillable = ['descrip_dep_jerar','nombre_dep_jerar'];


}
