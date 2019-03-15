<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class NominaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->listaNominas();
    }


    public function listaNominas()
    {
        $nominas = Nomina::all();
        return view('nomina.nominas', compact('nominas'))->with(array('MsgType' => 'info', 'Msg' => 'Info: Haga clic sobre alguna fila si desea consultar la información completa y/o editar algún dato.'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generar($id_Empleado)
    {
        $empleado = User::where('id', $id_Empleado)->first();
        return view('nomina.generar-nomina')->with('empleado', $empleado);
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
        ]);

        User::create([
            'nombres' => $data['nombres'],
        ]);
        Alert::success('¡ La nomina fue creada exitosamente !')->autoclose(4000);
        return redirect('nomina.nominas');
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
        $nomina = Nomina::where('id', $id)->first();
        return view('nomina.editar-nomina')->with('nomina', $nomina);
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
        $nomina = DB::table('nominas')->where('id', $id)->first();

        $data = $this->validate($request, [
            'id' => 'required',
        ]);
        
        try {
            DB::table('nominas')->where('id','=', $id)->update($data);
            Alert::success('¡ Datos de la nómina actualizados exitosamente !')->autoclose(4000);
        } catch (\Illuminate\Database\QueryException $e) {
        Alert::error('Ocurrio un problema al intentar actualizar los datos, intente más tarde '.$e, 'Error fatal')->persistent("Close");
        }
        return redirect('admin');
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
            DB::table('nominas')->where('id','=', $id)->delete();
            Alert::success('¡ La nómina se ha eliminado exitosamente !')->autoclose(4000);
        } catch (\Illuminate\Database\QueryException $e) {
            Alert::error('Ocurrio un problema al intentar eliminar la nómina, intente más tarde '.$e, 'Error fatal')->persistent("Close");
        }
        return redirect('nomina');
    }
}
