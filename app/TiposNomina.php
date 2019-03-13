<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TiposNomina extends Model
{
    protected $table = 'tiposnomina';

    protected $fillable = [
        'id', 'nombre'
    ];

}
