<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capacitacion extends Model
{
    use HasFactory;
    protected $primarKey = 'id_cap';
    public function investigadoresCapacitaciones()
    {
        return $this->hasMany(
            Investigador::class,
            'id_invest'
        );
    }
}
