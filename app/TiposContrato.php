<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TiposContrato extends Model
{
    protected $table = 'tiposcontrato';

    protected $fillable = [
        'id', 'nombre'
    ];

}
