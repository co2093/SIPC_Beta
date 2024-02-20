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
    public function investigadores()
    {
        return $this->hasMany(
            Investigador::class,
            'id_investigador'
        );
    }
}
