<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradoAcademico extends Model
{
    use HasFactory;

    protected $table = 'grados_academicos';
    protected $primaryKey = 'id_g_acad';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
        'titulo_g_acad',
        'descrip_g_acad'
    ];



    public function aa_de_uuGradosAcademicos() {
        return $this-> hasMany(
            Aa_de_uu::class, 
            'id_autoridad_unidad'
        );
     }



}
