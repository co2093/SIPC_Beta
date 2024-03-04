<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnidadInvestigacion extends Model
{
    use HasFactory;
    protected $table = 'uu_de_invest';
    protected $primaryKey = 'id_unidad';
    public $incrementing = true;
    protected $fillable = ['nombre_unidad'];
    public $timestamps = false;
    public function investigadoresUnidadInvest()
    {
        return $this->hasMany(
            Investigador::class,
            'id_invest'
        );
    }
}
