<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Nomina;
use DateTime;
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

    private function strMoneyToNum($str) {
        $num = str_replace("$ ", "", $str);
        $num = str_replace(",", "", $num);
        return floatval($num);
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
            'user_id' => 'required',
            'inicio_periodo' => 'required',
            'fin_periodo' => 'required',
            'monto_sueldo' => 'required',
            'monto_isr' => 'required',
            'monto_imss' => 'required',
            'monto_cuotasindical' => 'required',
            'monto_totalpago' => 'required',
        ]);

        $data['monto_sueldo'] = $this->strMoneyToNum($request->monto_sueldo);
        $data['monto_isr'] = $this->strMoneyToNum($request->monto_isr);
        $data['monto_imss'] = $this->strMoneyToNum($request->monto_imss);
        $data['monto_cuotasindical'] = $this->strMoneyToNum($request->monto_cuotasindical);
        $data['monto_totalpago'] = $this->strMoneyToNum($request->monto_totalpago);
        $data['inicio_periodo'] = DateTime::createFromFormat('d-m-Y', str_replace('/', '-', $data['inicio_periodo']))->format('Y-m-d');
        $data['fin_periodo'] = DateTime::createFromFormat('d-m-Y', str_replace('/', '-', $data['fin_periodo']))->format('Y-m-d');

        $data['dias_trabajados'] = $request->dias_nomina;

        if($request->dias_faltas != null) {
            $data['dias_trabajados'] = $request->dias_nomina - $request->dias_faltas;
            $data['dias_faltas'] = $request->dias_faltas;
            $data['monto_faltas'] = $this->strMoneyToNum($request->monto_faltas);
        } else {
            $data['dias_faltas'] = 0;
            $data['monto_faltas'] = 0;
        }
        if($request->dias_vacaciones != null) {
            $data['dias_vacaciones'] = $request->dias_vacaciones;
            $data['monto_vacaciones'] = $this->strMoneyToNum($request->monto_vacaciones);
            $data['monto_primavacacional'] = $this->strMoneyToNum($request->monto_primavacacional);
        } else {
            $data['dias_vacaciones'] = 0;
            $data['monto_vacaciones'] = 0;
            $data['monto_primavacacional'] = 0;
        }
        if($request->dias_aguinaldo != null) {
            $data['dias_aguinaldo'] = $request->dias_aguinaldo;
            $data['monto_aguinaldo'] = $this->strMoneyToNum($request->monto_aguinaldo);
        } else {
            $data['dias_aguinaldo'] = 0;
            $data['monto_aguinaldo'] = 0;
        }
        if($request->monto_utilidades != null) {
            $data['monto_utilidades'] = $this->strMoneyToNum($request->monto_utilidades);
        } else {
            $data['monto_utilidades'] = 0;
        }

        $newNomina = Nomina::create([
            'user_id' => $data['user_id'],
            'inicio_periodo' => $data['inicio_periodo'],
            'fin_periodo' => $data['fin_periodo'],
            'monto_sueldo' => $data['monto_sueldo'],
            'monto_isr' => $data['monto_isr'],
            'monto_imss' => $data['monto_imss'],
            'monto_cuotasindical' => $data['monto_cuotasindical'],
            'monto_totalpago' => $data['monto_totalpago'],
            'dias_trabajados' => $data['dias_trabajados'],
            'dias_faltas' => $data['dias_faltas'],
            'monto_faltas' => $data['monto_faltas'],
            'dias_vacaciones' => $data['dias_vacaciones'],
            'monto_vacaciones' => $data['monto_vacaciones'],
            'monto_primavacacional' => $data['monto_primavacacional'],
            'dias_aguinaldo' => $data['dias_aguinaldo'],
            'monto_aguinaldo' => $data['monto_aguinaldo'],
            'monto_utilidades' => $data['monto_utilidades'],
        ]);
        Alert::success('¡ La nomina fue creada exitosamente !')->autoclose(4000);
        return redirect('nomina/'.$newNomina->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nomina = Nomina::where('id', $id)->first(); 
        return view('nomina.ver-nomina')->with('nomina', $nomina);
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
