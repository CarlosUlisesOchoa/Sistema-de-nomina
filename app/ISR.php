<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ISR extends Model
{
    protected $table = 'isr';

    protected $fillable = [
        'id', 'lim_inferior', 'lim_superior', 'porcentaje', 'frecuencia_pago'
    ];
}
