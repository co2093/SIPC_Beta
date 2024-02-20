<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradoAcademico extends Model
{
    use HasFactory;
    protected $table = 'grados_academicos';
    protected $primarKey = 'id_g_acad';
    public $timestamps = false;
    protected $fillable = [
        'titulo_g_acad',
        'descrip_g_acad'
    ];
    public function investigadoresGAcademico()
    {
        return $this->hasMany(
            Investigador::class,
            'id_investigador'
        );
    }
}
