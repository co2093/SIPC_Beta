<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    use HasFactory;
    protected $table = 'cargos';
    protected $primaryKey = 'id_cargo';
    public $incrementing = true;
    protected $fillable = [
        'nombre_cargo',
        'descripcion_cargo'
    ];
    public $timestamps = false;
    public function aa_de_uuCargos()
    {
        return $this->hasMany(
            Aa_de_uu::class,
            'id_autoridad_unidad'
        );
    }
}
