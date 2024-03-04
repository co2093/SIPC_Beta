<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoFormulario extends Model
{
    use HasFactory;
    protected $table = 'tipos_formularios';
    protected $primaryKey = 'id_t_form';
    public $incrementing = true;
    protected $fillable = [
        'nombre_t_form'
    ];
    public $timestamps = false;
    public function tiposFormularios()
    {
        return $this->hasMany(
            Formulario::class,
            'id_form'
        );
    }
}
