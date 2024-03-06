<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Str;

class Formulario extends Model
{
    use HasFactory;
    protected $table = 'forms';
    protected $primaryKey = 'id_form';
    public $incrementing = true;
    protected $fillable = [
        'descripcion_form',
        'fecha_creacion_form',
        'codigo_form'
    ];
    public $timestamps = false;
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->fecha_creacion_form = now()->toDateString();
        });
    }
    public static function generarCodigo()
    {
        $fechaHora = Carbon::now()->format('Ymd-Hi'); // Formato de fecha y hora
        $codigoAdicional = Str::random(3); // Los tres caracteres adicionales
        return 'SICUES-' . $fechaHora . '-' . $codigoAdicional;
    }
    public function formulariosTipos()
    {
        return $this->belongsTo(
            TipoFormulario::class,
            'id_t_form'
        );
    }
    public function formulariosEstados()
    {
        return $this->hasMany(
            EstadoFormulario::class,
            'id_e_form'
        );
    }
    public function formulariosCierres()
    {
        return $this->belongsTo(
            CierreFormulario::class,
            'id_cierre_periodo_'
        );
    }
    public function formulariosUnidadesInvestigacion()
    {
        return $this->hasMany(
            UnidadInvestigacion::class,
            'id_unidad'
        );
    }
    public function formulariosConsolidaciones()
    {
        return $this->belongsTo(
            ConsolidadoFormulario::class,
            'id_consolidacion'
        );
    }
}
