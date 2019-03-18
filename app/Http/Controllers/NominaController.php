<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Alert;
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
        $dias_nomina = \App\TiposNomina::where('id', $empleado->id_tiponomina)->first()->num_dias;
        $sueldo = ($empleado->salario_diario * $dias_nomina);
        $isr = \App\ISR::where('lim_inferior', '<=', $sueldo)->where('lim_superior', '>=', $sueldo)->where('frecuencia_pago', $dias_nomina)->get()->first()->porcentaje;
        if($empleado != null) {
            return view('nomina.generar-nomina')->with('empleado', $empleado)->with('isr', $isr);
        } else {
            Alert::error('El número de empleado que acaba de ingresar no fue encontrado', 'Error')->autoclose(6000);
            return redirect('admin');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request;
        $data = $this->validate($request, [
            'inicio_periodo' => 'required',
            'fin_periodo' => 'required',
            'monto_sueldo' => 'required',
            'monto_isr' => 'required',
            'monto_imss' => 'required',
            'monto_cuotasindical' => 'required',
            'monto_totalpago' => 'required',
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
        return view('nomina.ver-nomina');
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
