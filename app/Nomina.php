<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nomina extends Model
{
    protected $table = 'nominas';

    protected $fillable = [
        'id', 'id_user', 'inicio_periodo', 'fin_periodo', 'dias_trabajados', 
        'dias_faltas', 'sueldo', 'dias_vacaciones', 'monto_vacaciones', 
        'prima_vacacional', 'dias_aguinaldo', 'monto_aguinaldo', 'monto_utilidades', 
        'monto_isr', 'monto_imss', 'monto_cuotasindical', 'total_pago'
    ];
}


