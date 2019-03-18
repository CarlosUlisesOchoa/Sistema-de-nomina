<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

	/* Admin system */
	const ADMIN_TYPE = 'ADMIN';
	const DEFAULT_TYPE = 'USUARIO';
	public function isAdmin()    {        
		return $this->tipo_cuenta === self::ADMIN_TYPE;    
	}
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $table = 'empleados';
    protected $fillable = [
        'id', 
        'nombres', 
        'password', 
        'tipo_cuenta',
        'apellidos',
        'fec_nac',
        'genero',
        'estado_civil',
        'curp',
        'rfc',
        'domicilio',
        'avatar',
        'cta_bancaria',
        'salario_diario',
        'dias_descanso',
        'tipo_contrato',
        'id_puesto',
        'id_area',
        'id_tiponomina'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function puesto()
    {
         return $this->belongsTo('App\Puestos', 'id_puesto', 'id');
    }

    public function area()
    {
         return $this->belongsTo('App\Areas', 'id_area', 'id');
    }

    public function tiponomina()
    {
         return $this->belongsTo('App\TiposNomina', 'id_tiponomina', 'id');
    }

    public function nominas()
    {
        return $this->hasMany('App\Nomina');
    }

    public static function getOpciones($dato){
        $consulta = sprintf("SHOW COLUMNS FROM empleados WHERE Field = \"%s\"", $dato);
        $type = DB::select(DB::raw($consulta))[0]->Type;
        preg_match('/^enum\((.*)\)$/', $type, $matches);
        $values = array();
        foreach(explode(',', $matches[1]) as $value){
            $values[] = trim($value, "'");
        }
        foreach($values as $index => $value) {
            $values[$index] = ucfirst(strtolower($values[$index]));
        }
        return $values;
    }
}
