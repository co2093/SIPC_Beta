<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory;
    protected $table = 'carreras';
    public $timestamps = false;
    protected $primarKey = 'id_carrera';
    public function facultades()
    {
        return $this->belongsTo(
            Facultad::class,
            'id_facultad'
        );
    }
}
