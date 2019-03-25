<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\TiposContrato;
use Alert;

class TiposContratoController extends Controller
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
        return $this->listaTiposContrato();
    }


    public function listaTiposContrato()
    {
        $tipos_contrato = TiposContrato::all();
        return view('tipos-contrato.tipos-contrato', compact('tipos_contrato'))->with(array('MsgType' => 'info', 'Msg' => 'Info: Haga clic sobre alguna fila si desea editar algun tipo de contrato'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipos-contrato.nuevo-tipocontrato');
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

        TiposContrato::create([
            'nombre' => $data['nombre'],
        ]);
        Alert::success('¡ El nuevo tipo de contrato fue registrado exitosamente !')->autoclose(4000);
        return redirect('tipos-contrato');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id=null)
    {
        $tipo_contrato = TiposContrato::where('id', $id)->first();
        return view('tipos-contrato.editar-tipocontrato')->with('tipo_contrato', $tipo_contrato);
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
        $data = $this->validate($request, [
            'id' => 'required',
            'nombre' => 'required',
        ]);

        try {
            DB::table('tiposcontrato')->where('id','=', $id)->update($data);
            Alert::success('¡ Datos guardados exitosamente !')->autoclose(4000);
        } catch (\Illuminate\Database\QueryException $e) {
        Alert::error('Ocurrio un problema al intentar guardar los datos, intente más tarde '.$e, 'Error fatal')->persistent("Close");
        }
        return redirect('tipos-contrato');
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
            DB::table('tiposcontrato')->where('id','=', $id)->delete();
            Alert::success('¡ El tipo de contrato se ha eliminado exitosamente !')->autoclose(4000);
        } catch (\Illuminate\Database\QueryException $e) {
            Alert::error('Ocurrio un problema al intentar eliminar el tipo de contrato, intente más tarde '.$e, 'Error fatal')->persistent("Close");
        }
        return redirect('tipos-contrato');
    }
}