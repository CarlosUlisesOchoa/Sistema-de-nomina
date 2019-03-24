<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Puestos;
use Alert;

class PuestosController extends Controller
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
        return $this->listaPuestos();
    }


    public function listaPuestos()
    {
        $puestos = Puestos::all();
        return view('puestos.puestos', compact('puestos'))->with(array('MsgType' => 'info', 'Msg' => 'Info: Haga clic sobre alguna fila si desea editar algun puesto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('puestos.nuevo-puesto');
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
            'nombre' => 'required',
        ]);

        Puestos::create([
            'nombre' => $data['nombre'],
        ]);
        Alert::success('¡ La nueva puesto fue registrado exitosamente !')->autoclose(4000);
        return redirect('puestos');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id=null)
    {
        $puesto = Puestos::where('id', $id)->first();
        return view('puestos.editar-puesto')->with('puesto', $puesto);
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
        $puesto = DB::table('puestos')->where('id', $id)->first();

        $data = $this->validate($request, [
            'id' => 'required',
            'nombre' => 'required',
        ]);

        try {
            DB::table('puestos')->where('id','=', $id)->update($data);
            Alert::success('¡ Datos guardados exitosamente !')->autoclose(4000);
        } catch (\Illuminate\Database\QueryException $e) {
        Alert::error('Ocurrio un problema al intentar guardar los datos, intente más tarde '.$e, 'Error fatal')->persistent("Close");
        }
        return redirect('puestos');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        try {
            DB::table('puestos')->where('id','=', $id)->delete();
            Alert::success('¡ El puesto se ha eliminado exitosamente !')->autoclose(4000);
        } catch (\Illuminate\Database\QueryException $e) {
            Alert::error('Ocurrio un problema al intentar eliminar el puesto, intente más tarde '.$e, 'Error fatal')->persistent("Close");
        }
        return redirect('puestos');
    }
}
