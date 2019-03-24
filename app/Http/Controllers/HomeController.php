<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\User;
use Alert;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function profile()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('empleado.mi-perfil')->with('user', $user);
    }

    public function updateProfile(Request $request) {
        $empleado = User::where('id', Auth::user()->id)->first();
        $errors = array();
        $data = null;
        if($request->newPassword != null) {
            if(Hash::check($request->actualPassword, $empleado->password)) {
                if($request->newPassword == $request->confirmedPassword) {
                    $data['password'] = Hash::make($request->newPassword);
                } else {
                   $errors[] = '¡ La nueva contraseña y su confirmación no coinciden !';
                }
            } else {
                $errors[] = '¡ La contraseña actual no coincide !';
            }
        }

        if(!empty($request['avatar'])) {
            
            $avatarName = $empleado->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();

            $request->avatar->storeAs('/images/avatars/',$avatarName);

            if($empleado->avatar != 'default_avatar.png') {
                Storage::delete('/images/avatars/'.$empleado->avatar);
            }

            $empleado->avatar = $avatarName;

            $data['avatar'] = $empleado->avatar;
        }
        try { 
            if($data != null) {
                DB::table('empleados')->where('id', Auth::user()->id)->update($data);
            }
            if(count($errors) == 0) {
                Alert::success('¡ Datos guardados exitosamente !')->autoclose(4000);
            } else {
                $msg = "";
                for($i = 0; $i < count($errors); $i++) {
                    $msg = $msg.sprintf("%s%s", $errors[$i], ($i+1 < count($errors) ? " / " : ""));
                }
                Alert::error($msg, 'Errores');
            }
        } catch (\Illuminate\Database\QueryException $e) {
        Alert::error('Ocurrio un problema al intentar guardar los datos, intente más tarde '.$e, 'Error fatal')->persistent("Close");
        }
        return redirect('mi-perfil');
    }
}
