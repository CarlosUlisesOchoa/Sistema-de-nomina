<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\TiposNomina;
use Alert;

class TiposNominaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->listaTiposNomina();
    }


    public function listaTiposNomina()
    {
        $tipos_nomina = TiposNomina::all();
        return view('tipos-nomina.tipos-nomina', compact('tipos_nomina'))->with(array('MsgType' => 'info', 'Msg' => 'Info: Haga clic sobre alguna fila si desea editar algun tipo de nómina'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipos-nomina.nuevo-tiponomina');
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

        TiposNomina::create([
            'nombre' => $data['nombre'],
        ]);
        Alert::success('¡ La nueva tiponomina fue registrado exitosamente !')->autoclose(4000);
        return redirect('tipos-nomina');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id=null)
    {
        $tipo_nomina = TiposNomina::where('id', $id)->first();
        return view('tipos-nomina.editar-tiponomina')->with('tipo_nomina', $tipo_nomina);
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
            DB::table('tiposnomina')->where('id','=', $id)->update($data);
            Alert::success('¡ Datos guardados exitosamente !')->autoclose(4000);
        } catch (\Illuminate\Database\QueryException $e) {
        Alert::error('Ocurrio un problema al intentar guardar los datos, intente más tarde '.$e, 'Error fatal')->persistent("Close");
        }
        return redirect('tipos-nomina');
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
            DB::table('tiposnomina')->where('id','=', $id)->delete();
            Alert::success('¡ El tipo de nómina se ha eliminado exitosamente !')->autoclose(4000);
        } catch (\Illuminate\Database\QueryException $e) {
            Alert::error('Ocurrio un problema al intentar eliminar el tipo de nómina, intente más tarde '.$e, 'Error fatal')->persistent("Close");
        }
        return redirect('tipos-nomina');
    }
}