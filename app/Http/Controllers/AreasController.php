<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Areas;
use Alert;
class AreasController extends Controller
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
        return $this->listaAreas();
    }


    public function listaAreas()
    {
        $areas = Areas::all();
        return view('areas.areas', compact('areas'))->with(array('MsgType' => 'info', 'Msg' => 'Info: Haga clic sobre alguna fila si desea editar alguna area'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('areas.nueva-area');
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

        Areas::create([
            'nombre' => $data['nombre'],
        ]);
        Alert::success('¡ La nueva area fue registrado exitosamente !')->autoclose(4000);
        return redirect('areas');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id=null)
    {
        $area = Areas::where('id', $id)->first();
        return view('areas.editar-area')->with('area', $area);
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
        $area = DB::table('areas')->where('id', $id)->first();

        $data = $this->validate($request, [
            'id' => 'required',
            'nombre' => 'required',
        ]);

        try {
            DB::table('areas')->where('id','=', $id)->update($data);
            Alert::success('¡ Datos guardados exitosamente !')->autoclose(4000);
        } catch (\Illuminate\Database\QueryException $e) {
        Alert::error('Ocurrio un problema al intentar guardar los datos, intente más tarde '.$e, 'Error fatal')->persistent("Close");
        }
        return redirect('areas');
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
            DB::table('areas')->where('id','=', $id)->delete();
            Alert::success('¡ El area se ha eliminado exitosamente !')->autoclose(4000);
        } catch (\Illuminate\Database\QueryException $e) {
            Alert::error('Ocurrio un problema al intentar eliminar el area, intente más tarde '.$e, 'Error fatal')->persistent("Close");
        }
        return redirect('areas');
    }

}
