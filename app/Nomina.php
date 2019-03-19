<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nomina extends Model
{
    protected $table = 'nominas';

    protected $fillable = [
        'id', 'user_id', 'inicio_periodo', 'fin_periodo', 'dias_trabajados', 
        'dias_faltas', 'monto_faltas', 'monto_sueldo', 'dias_vacaciones', 'monto_vacaciones', 
        'monto_primavacacional', 'dias_aguinaldo', 'monto_aguinaldo', 'monto_utilidades', 
        'monto_isr', 'monto_imss', 'monto_cuotasindical', 'monto_totalpago'
    ];

    public function empleado()
    {
         return $this->belongsTo('App\User', 'user_id', 'id');
    }
}


