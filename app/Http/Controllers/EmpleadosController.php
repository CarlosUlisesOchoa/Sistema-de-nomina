<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\User; 
use Alert;
use DateTime;

class EmpleadosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is_admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user = User::with('puesto')->find(1);
        // return 'es: '.$user->puesto->nombre; 
        return $this->listaEmpleados();
    }


    public function listaEmpleados()
    {
        $users = User::all();
        return view('empleados.empleados', compact('users'))->with(array('MsgType' => 'info', 'Msg' => 'Info: Haga clic sobre alguna fila si desea consultar la información completa y/o editar algún dato.'));
    }

    public function darBaja($id) {

        try {
            DB::table('empleados')->where('id','=', $id)->update(array('cuenta_activa' => false));
            Alert::success('¡ El empleado se ha dado de baja exitosamente !')->autoclose(4000);
        } catch (\Illuminate\Database\QueryException $e) {
            Alert::error('Ocurrio un problema al intentar dar de baja al empleado, intente más tarde '.$e, 'Error fatal')->persistent("Close");
        }
        return redirect('empleados');
    }

    public function reactivar($id) {

        try {
            DB::table('empleados')->where('id','=', $id)->update(array('cuenta_activa' => true));
            Alert::success('¡ El empleado se ha reactivado exitosamente !')->autoclose(4000);
        } catch (\Illuminate\Database\QueryException $e) {
            Alert::error('Ocurrio un problema al intentar reactivar al empleado, intente más tarde '.$e, 'Error fatal')->persistent("Close");
        }
        return redirect('empleados');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empleados.nuevo-empleado');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'password' => 'required',
            'nombres' => 'required',
            'apellidos' => 'required',
            'fec_nac' => 'required',
            'genero' => 'required',
            'estado_civil' => 'required',
            'curp' => 'required',
            'rfc' => 'required',
            'domicilio' => 'required',
            'cta_bancaria' => 'required',
            'salario_diario' => 'required',
            'id_tipocontrato' => 'required',
            'id_puesto' => 'required',
            'id_area' => 'required',
            'id_tiponomina' => 'required',
            'tipo_cuenta' => 'required',
        ]);

        $data['fec_nac'] = DateTime::createFromFormat('d-m-Y', str_replace('/', '-', $data['fec_nac']))->format('Y-m-d');

        if(empty($request->rfc)) {
            $data['rfc'] = 'XAFF000';
        }

        if(empty($data->dias_descanso)) {
            $data['dias_descanso'] = 'Ninguno';
        }

        User::create([
            'password' => Hash::make($data['password']),
            'nombres' => $data['nombres'],
            'apellidos' => $data['apellidos'],
            'fec_nac' => $data['fec_nac'],
            'genero' => $data['genero'],
            'estado_civil' => $data['estado_civil'],
            'curp' => $data['curp'],
            'rfc' => $data['rfc'],
            'domicilio' => $data['domicilio'],
            'cta_bancaria' => $data['cta_bancaria'],
            'salario_diario' => $data['salario_diario'],
            'id_tipocontrato' => $data['id_tipocontrato'],
            'dias_descanso' => $data['dias_descanso'],
            'id_puesto' => $data['id_puesto'],
            'id_area' => $data['id_area'],
            'id_tiponomina' => $data['id_tiponomina'],
            'tipo_cuenta' => $data['tipo_cuenta'], // Admin system
        ]);
        Alert::success('¡ El nuevo empleado fue registrado exitosamente !')->autoclose(4000);
        return redirect('empleados');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id=null)
    {
        $user = User::where('id', $id)->first();
        if($user->cuenta_activa == false) {
            return view('empleados.editar-empleado')->with('user', $user)->with(array('MsgType' => 'danger', 'Msg' => 'Atención: La cuenta de este empleado se encuentra actualmente dada de baja.'));
        }
        return view('empleados.editar-empleado')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $empleado = DB::table('empleados')->where('id', $id)->first();

        $data = $this->validate($request, [
            'id' => 'required',
            'nombres' => 'required',
            'apellidos' => 'required',
            'fec_nac' => 'required',
            'genero' => 'required',
            'estado_civil' => 'required',
            'curp' => 'required',
            'rfc' => 'required',
            'domicilio' => 'required',
            'cta_bancaria' => 'required',
            'salario_diario' => 'required',
            'id_tipocontrato' => 'required',
            'id_puesto' => 'required',
            'id_area' => 'required',
            'id_tiponomina' => 'required',
            'tipo_cuenta' => 'required',
        ]);

        $data['fec_nac'] = DateTime::createFromFormat('d-m-Y', str_replace('/', '-', $data['fec_nac']))->format('Y-m-d');

        if($request->dias != null) {
            $num_dias_descanso = count($request->dias);
            $dias_descanso = implode('|',$request->dias);

            DB::table('empleados')->where('id','=', $request->id)->update(array('dias_descanso' => $dias_descanso));

        } else {
            DB::table('empleados')->where('id','=', $request->id)->update(array('dias_descanso' => 'Ninguno'));
        }

        if(!empty($request['password'])) {
            DB::table('empleados')->where('id','=', $id)->update(array('password' => Hash::make($request->password))) == 1;
        }

        if(!empty($request['avatar'])) {
            
            $avatarName = $empleado->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();

            $request->avatar->storeAs('/images/avatars/',$avatarName);

            if($empleado->avatar != 'default_avatar.png') {
                Storage::delete('/images/avatars/'.$empleado->avatar);
            }

            $empleado->avatar = $avatarName;

            DB::table('empleados')->where('id','=', $request->id)->update(array('avatar' =>$empleado->avatar));
        }

        if( (Auth::user()->id == $empleado->id) && (Auth::user()->id != $data['id']) ) {
            DB::table('empleados')->where('id','=', $id)->update($data);
            Alert::success('Por favor, vuelve a iniciar sesión', '¡ Éxito al guardar !')->autoclose(4000);
            return redirect('login')->with(Auth::logout());
        }
        
        try {
            DB::table('empleados')->where('id','=', $id)->update($data);
            Alert::success('¡ Datos guardados exitosamente !')->autoclose(4000);
        } catch (\Illuminate\Database\QueryException $e) {
        Alert::error('Ocurrio un problema al intentar guardar los datos, intente más tarde '.$e, 'Error fatal')->persistent("Close");
        }
        return redirect('empleados');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
