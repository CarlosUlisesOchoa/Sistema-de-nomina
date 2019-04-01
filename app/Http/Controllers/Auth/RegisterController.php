<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
	

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
        return redirect()->to(url('/'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'password' => ['required', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'password' => Hash::make($data['password']),
            'tipo_cuenta' => $data['tipo_cuenta'], // Admin system
            'nombres' => $data['nombres'],
            'apellidos' => $data['apellidos'],
            'fec_nac' => $data['fec_nac'],
            'genero' => $data['genero'],
            'estado_civil' => $data['estado_civil'],
            'curp' => $data['curp'],
            'rfc' => $data['rfc'],
            'domicilio' => $data['domicilio'],
            'avatar' => $data['avatar'],
            'cta_bancaria' => $data['cta_bancaria'],
            'salario_diario' => $data['salario_diario'],
            'dias_descanso' => $data['dias_descanso'],
            'tipo_contrato' => $data['id_contrato'],
            'id_puesto' => $data['id_puesto'],
            'id_area' => $data['id_area'],
            'id_tiponomina' => $data['id_tiponomina'],
            'tipo_cuenta' => $data['tipo_cuenta'],
        ]);
    }
}
