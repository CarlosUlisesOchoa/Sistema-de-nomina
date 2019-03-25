@extends('layouts.app')

@section('title', 'Modificar empleado')

@section('extra-css')
<link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header pb-3 pt-2">
          <div class="container">
            <div class="row">
              <div id="back-arrow" class="col-1 px-0">
                <div width="33" height="33" id="" class="fadeimg">
                  <a href="{{url('/empleados')}}">
                    <img width="33" height="33" class="bottom" src="{{asset('images/back-hover.png')}}">
                    <img width="33" height="33" class="top" src="{{asset('images/back.png')}}">
                  </a>
                </div>
              </div>
              <div class="col-auto pr-0 pl-4 pl-md-3 pl-lg-2 pl-xl-1">
            <span class="text-left font-size-20">Editar empleado - {{$user->nombres}}</span>
        </div>
    </div>
</div>
</div>

<div class="card-body">

    <div class="container">

        <div class="row justify-content-center" >


            <div class="profile-header-container">   
                <div class="profile-header-img">
                    <img class="mb-2 mx-auto d-block rounded-circle cursor-pointer" src="/storage/images/avatars/{{ $user->avatar }}" width="128" id="avatar-actual"/>

                    <!-- badge -->
                    <div class="rank-label-container text-center">
                        <span class="label label-default rank-label" id="titulo-avatar">Foto de perfil</span>
                        <div id="avatar-up-info"><small id="fileHelp" class="form-text text-muted text-center">Haga clic sobre la foto si desea cambiarla. La imagen no debe sobrepasar los 2MB.</small></div>
                        
                        <div id="avatar-new-info" class="mt-3 alert alert-success alert-dismissible fade show" role="alert">Se ha seleccionado una nueva imagen
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    {!! Form::model($user, ['method' => 'PATCH', 'id' => 'form-userdata', 'enctype' => 'multipart/form-data', 'route' => ['empleados.update', $user->id] ]) !!}

    <input type="file" class="form-control-file invisible" name="avatar" id="avatarFile" aria-describedby="fileHelp">

    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">No. de empleado</label>

        <div class="col-md-6">
            <input id="id" type="text" class="digits-only form-control" name="id" value="{{$user->id}}" requiered>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">Cambiar contraseña</label>

        <div class="col-md-6 input-group">
          <input type="password" name="password" id="password" class="form-control" data-toggle="password" placeholder="Ingresar nueva contraseña">
          <div class="input-group-append">
            <span class="input-group-text"><i class="fa fa-eye"></i></span>
        </div>
    </div>
</div>

<div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right">Nombres</label>

    <div class="col-md-6">
        <input id="nombres" name="nombres" type="text" class="letters-space name form-control" value="{{$user->nombres}}" requiered>
    </div>
</div>

<div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right">Apellidos</label>

    <div class="col-md-6">
        <input id="apellidos" name="apellidos" type="text" class="letters-space name form-control" value="{{$user->apellidos}}" requiered>
    </div>
</div>

<div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right">Fecha de nacimiento</label>
    <div id="date-picker" class="col-md-6 input-append date">
        <input id="fec_nac" name="fec_nac" value="{{date('d-m-Y',strtotime($user->fec_nac))}}" class="date-picker">
    </div>
</div>

<div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right">Genero</label>

    <div class="col-md-6">
        <select id='genero' name='genero' class="form-control">

            @foreach(\App\User::getOpciones('genero') as $index => $genero )

            <option value="{{$index+1}}" {{ $user->genero == strtoupper($genero) ? 'selected' : '' }}>{{$genero}}</option>

            @endforeach
            
        </select>
    </div>
</div>

<div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right">Estado civil</label>

    <div class="col-md-6">
        <select id='estado_civil' name='estado_civil' class="form-control">

            @foreach(\App\User::getOpciones('estado_civil') as $index => $estado_civil )

            <option value="{{$index+1}}" {{ $user->estado_civil == strtoupper($estado_civil) ? 'selected' : '' }}>{{$estado_civil}}</option>

            @endforeach

        </select>
    </div>
</div>

<div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right">CURP</label>

    <div class="col-md-6">
        <input id="curp" name="curp" type="text" class="alpha-numeric curp-rfc form-control" value="{{$user->curp}}" requiered>
    </div>
</div>

<div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right">RFC</label>

    <div class="col-md-6">
        <input id="rfc" name="rfc" type="text" class="alpha-numeric curp-rfc form-control" value="{{$user->rfc}}" requiered>
    </div>
</div>

<div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right">Domicilio</label>

    <div class="col-md-6">
        <input id="domicilio" name="domicilio" type="text" class="form-control" value="{{$user->domicilio}}" requiered>
    </div>
</div>

<div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right">Cuenta bancaria</label>

    <div class="col-md-6">
        <input id="cta_bancaria" name="cta_bancaria" type="text" class="digits-only form-control" value="{{$user->cta_bancaria}}" requiered>
    </div>
</div>

<div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right">Salario diario</label>

    <div class="col-md-6">
        <input id="salario_diario" name="salario_diario" type="text" class="float form-control" value="{{$user->salario_diario}}" requiered>
    </div>
</div>

<div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right">Dias de descanso</label>

    <div class="col-md-6">
        <div class="form-check">
            <table>
                <tr>
                    <td>
                        <input type="checkbox" class="form-check-input" id="opc_lunes" value="1" name="dias[]" @if(preg_match("/1/", $user->dias_descanso)) checked @endif>
                        <label class="form-check-label" for="opc_lunes">Lunes</label>
                    </td>
                    <td>  
                       <span class="ml-5"><input type="checkbox" class="form-check-input" id="opc_martes" value="2" name="dias[]" @if(preg_match("/2/", $user->dias_descanso)) checked @endif>
                        <label class="form-check-label" for="opc_martes">Martes</label></span> 
                    </td>
                    <td>
                        <span class="ml-5"><input type="checkbox" class="form-check-input" id="opc_miercoles" value="3" name="dias[]" @if(preg_match("/3/", $user->dias_descanso)) checked @endif>
                            <label class="form-check-label" for="opc_miercoles">Miercoles</label></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" class="form-check-input" id="opc_jueves" value="4" name="dias[]" @if(preg_match("/4/", $user->dias_descanso)) checked @endif>
                            <label class="form-check-label" for="opc_jueves">Jueves</label>
                        </td>
                        <td>
                           <span class="ml-5"><input type="checkbox" class="form-check-input" id="opc_viernes" value="5" name="dias[]" @if(preg_match("/5/", $user->dias_descanso)) checked @endif>
                            <label class="form-check-label" for="opc_viernes">Viernes</label></span> 
                        </td>
                        <td>
                            <span class="ml-5"><input type="checkbox" class="form-check-input" id="opc_sabado" value="6" name="dias[]" @if(preg_match("/6/", $user->dias_descanso)) checked @endif>
                                <label class="form-check-label" for="opc_sabado">Sabado</label></span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" class="form-check-input" id="opc_domingo" value="7" name="dias[]" @if(preg_match("/7/", $user->dias_descanso)) checked @endif>
                                <label class="form-check-label" for="opc_domingo">Domingo</label>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>

        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">Contrato</label>

            <div class="col-md-6">
                <select id='id_tipocontrato' name='id_tipocontrato' class="form-control">

                    @foreach(\App\TiposContrato::all() as $tipocontrato)

                    <option value="{{$tipocontrato->id}}" {{ $user->id_tipocontrato == $tipocontrato->id ? 'selected' : '' }}>{{$tipocontrato->nombre}}</option>

                    @endforeach

                </select>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">Puesto</label>

            <div class="col-md-6">
                <select id='id_puesto' name='id_puesto' class="form-control">

                    @foreach(\App\Puestos::all() as $puesto)

                    <option value="{{$puesto->id}}" {{ $user->id_puesto == $puesto->id ? 'selected' : '' }}>{{$puesto->nombre}}</option>

                    @endforeach

                </select>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">Area</label>

            <div class="col-md-6">
                <select id='id_area' name='id_area' class="form-control">

                    @foreach(\App\Areas::all() as $area)

                    <option value="{{$area->id}}" {{ $user->id_area == $area->id ? 'selected' : '' }}>{{$area->nombre}}</option>

                    @endforeach

                </select>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">Tipo de nómina</label>

            <div class="col-md-6">
                <select id='id_tiponomina' name='id_tiponomina' class="form-control">

                    @foreach(\App\TiposNomina::all() as $tiponomina)

                    <option value="{{$tiponomina->id}}" {{ $user->id_tiponomina == $tiponomina->id ? 'selected' : '' }}>{{$tiponomina->nombre}}</option>

                    @endforeach

                </select>
            </div>
        </div>


        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">Tipo de cuenta</label>

            <div class="col-md-6">

                @if(\Auth::user()->id == $user->id)
                <input type="hidden" id="tipo_cuenta" name="tipo_cuenta" value="2">
                @endif

                <select id="tipo_cuenta" name="tipo_cuenta" class="form-control" @if(\Auth::user()->id == $user->id) disabled="disabled" @endif>
                    @foreach(\App\User::getOpciones('tipo_cuenta') as $index => $tipo_cuenta )

                    <option value="{{$index+1}}" {{ $user->tipo_cuenta == strtoupper($tipo_cuenta) ? 'selected' : '' }}>{{$tipo_cuenta}}</option>

                    @endforeach
                </select>
            </div>
        </div>

        <a class="mt-3 mr-3 btn btn-secondary" href="{{ url('empleados') }}" role="button">Regresar</a>
        @if($user->cuenta_activa)
        <a id="btn-baja" class="mt-3 mr-3 btn btn-danger" href="#!" role="button">Dar de baja</a>
        {!! Form::submit('Guardar datos', ['class' => 'mt-3 btn btn-primary']) !!}
        @else
        <a id="btn-reactivar" class="mt-3 mr-3 btn btn-success" href="#!" role="button">Reactivar cuenta</a>
        @endif

        {!! Form::close() !!}

    </div>
</div>
</div>
</div>
</div>

@endsection

@section('extra-scripts')
<script>
    $(document).ready(function() {

        if('{{$user->cuenta_activa}}' == false) {
            $("#form-userdata :input").prop("disabled", true);
        }
        $('#avatar-actual').click(function(){
            $('#avatarFile').click();
        });
        $("input:file").change(function (){
         var fileName = $(this).val();
         $(".filename").html(fileName);
         if(fileName != '') {

            $('#avatar-up-info').hide();
            $("avatar-new-info").css("display", "block");
        }
        else {
            $('#avatar-new-info').fadeOut(500);
            $('#avatar-up-info').delay(500).fadeIn("slow");
        }
    });

        $('#btn-baja').click(function(){
            if({{\Auth::user()->id}} != {{$user->id}}) {
                swal({
                  title: "¿Estás seguro?",
                  text: "El empleado {{'['.$user->id.'] '.$user->nombres.' '.$user->apellidos}} será dado de baja",
                  icon: "warning",
                  buttons: true,
                  buttons: ["Cancelar", "Dar de baja"],
                  dangerMode: true,
              })
                .then((willDelete) => {
                  if (willDelete) {
                    window.location.replace("{{ url('empleados').'/'.$user->id.'/baja' }}");
                }
            });
            } else {
                swal({title: "NO AUTORIZADO", text: "¡ No te puedes dar de baja tu mismo !", icon: "warning"});
            }
        });

        $('#btn-reactivar').click(function(){
            swal({
              title: "¿Estás seguro?",
              text: "El empleado {{'['.$user->id.'] '.$user->nombres.' '.$user->apellidos}} será reactivado",
              icon: "warning",
              buttons: true,
              buttons: ["Cancelar", "Reactivar"],
          })
            .then((willActivate) => {
              if (willActivate) {
                window.location.replace("{{ url('empleados').'/'.$user->id.'/reactivacion' }}");
            }
        });
        });
    });

</script>

<script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>

<script>
    $('.date-picker').datepicker({
        uiLibrary: 'bootstrap4', format: 'dd/mm/yyyy'
    });
</script>

@endsection
