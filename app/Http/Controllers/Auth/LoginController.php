<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\SessionGuard;
use Alert;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
	
	/**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        if($user->cuenta_activa == false) {
            Alert::error('Su cuenta ha sido dada de baja por un administrador, si tiene alguna duda comuniquese con la administración.', '¡ ATENCIÓN '.$user->nombres.' '.$user->apellidos.' !')->persistent("Close");
            return redirect('/')->with(Auth::logout());
        }
		if($user->tipo_cuenta == 'ADMIN') {
        	Alert::success('Bienvenido administrador '.$user->nombres)->autoclose(4000);
		} else {
			Alert::message('Bienvenido de vuelta '.$user->nombres)->autoclose(3000);
		}
    }
	
	/**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function loggedOut(Request $request)
    {
		Alert::warning('Sesión cerrada, vuelve pronto ')->autoclose(3000);
    }

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }
}
