<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoFormulario extends Model
{
    use HasFactory;
    protected $table = 'estados_forms';
    protected $primaryKey = 'id_e_forms';
    public $incrementing = true;
    protected $fillable = [
        'nombre_e_form',
        'descripcion_e_form'
    ];
    public $timestamps = false;

    public function estadosConsolidaciones()
    {
        return $this->belongsTo(
            ConsolidadoFormulario::class,
            'id_consolidacion'
        );
    }
    public function estadosFormularios()
    {
        return $this->belongsTo(
            Formulario::class,
            'id_form'
        );
    }
}
