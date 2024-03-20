<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class T_infraestructuras extends Model
{
    use HasFactory;

    protected $table ='t_infraestructuras';
    protected $primaryKey="id_t_infra";
    public $incrementing=false;
    public $timestamps=false;
    public $fillable=[
        'nombre_t_infra',
        'descrip_t_infra'
    ];

}
