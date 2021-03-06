@extends('layouts.app')

@section('title', 'Nuevo empleado')

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
            <span class="text-left font-size-20">Registrar nuevo empleado</span>
        </div>
    </div>
</div>
</div>

<div class="card-body">

    <div class="container">

        <div class="row justify-content-center" >


            <div class="profile-header-container">   
                <div class="profile-header-img">
                    <div id="avatar-actual"><img class="mb-2 mx-auto d-block rounded-circle" src="/storage/images/avatars/default_avatar.png" width="128"/></div>

                    <!-- badge -->
                    <div class="rank-label-container text-center">
                        <div id="avatar-up-info"><small id="fileHelp" class="form-text text-muted text-center">Haga clic sobre la imagen de arriba si desea subir una foto de perfil.</small></div>
                        
                        <div id="avatar-new-info-3" class="mt-3 alert alert-success alert-dismissible fade show display-none" role="alert">
                            <h4 class="alert-heading">Foto de perfil</h4>
                            <p class="text-left">Has seleccionado una foto correctamente, la imagen será subida en cuanto llenes todos los campos y hagas clic sobre <strong>"Registrar"</strong></p>
                            <hr>
                            <p>Si deseas seleccionar otra imagen has <a href="#!" id="change-avatar-again" class="alert-link">clic aquí</a></p>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <form id="main-form" method="POST" action="{{ route('empleados.store') }}">
        @csrf

        <input type="file" class="form-control-file invisible" name="avatar" id="avatarFile" aria-describedby="fileHelp">

        <div class="form-group row">
            <label for="id" class="col-md-4 col-form-label text-md-right">No. de empleado</label>

            <div class="col-md-6">
                <input id="id" type="text" class="form-control" name="id" value="Se generará automáticamente" disabled>
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>

            <div class="col-md-6 input-group">
              <input type="password" name="password" id="password" class="form-control" data-toggle="password" required autofocus>
              <div class="input-group-append">
                <span class="input-group-text"><i class="fa fa-eye"></i></span>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">Nombres</label>

        <div class="col-md-6">
            <input id="nombres" type="text" class="letters-space name form-control" name="nombres" value="" requiered>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">Apellidos</label>

        <div class="col-md-6">
            <input id="apellidos" name="apellidos" type="text" class="letters-space name form-control" value="" requiered>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">Fecha de nacimiento</label>
        <div id="date-picker" class="col-md-6 input-append date">
            <input id="fec_nac" name="fec_nac" value="20/01/1999" class="date-picker">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">Genero</label>

        <div class="col-md-6">
            <select id='genero' name='genero' class="form-control">

                @foreach(\App\User::getOpciones('genero') as $index => $genero )

                <option value="{{$index+1}}">{{$genero}}</option>

                @endforeach
                
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">Estado civil</label>

        <div class="col-md-6">
            <select id='estado_civil' name='estado_civil' class="form-control">

                @foreach(\App\User::getOpciones('estado_civil') as $index => $estado_civil )

                <option value="{{$index+1}}">{{$estado_civil}}</option>

                @endforeach

            </select>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">CURP</label>

        <div class="col-md-6">
            <input id="curp" name="curp" type="text" class="alpha-numeric curp-rfc form-control" value="" requiered>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">RFC</label>

        <div class="col-md-6">
            <input id="rfc" name="rfc" type="text" class="alpha-numeric curp-rfc form-control" value="" requiered>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">Domicilio</label>

        <div class="col-md-6">
            <input id="domicilio" name="domicilio" type="text" class="form-control" value="" requiered>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">Cuenta bancaria</label>

        <div class="col-md-6">
            <input id="cta_bancaria" name="cta_bancaria" type="text" class="digits-only form-control" value="" requiered>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">Salario diario</label>

        <div class="col-md-6">
            <input id="salario_diario" name="salario_diario" type="text" class="float form-control" value="" requiered>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">Dias de descanso</label>

        <div class="col-md-6">
            <div class="form-check">
                <table>
                    <tr>
                        <td>
                            <input type="checkbox" class="form-check-input" id="opc_lunes" value="1" name="dias[]">
                            <label class="form-check-label" for="opc_lunes">Lunes</label>
                        </td>
                        <td>  
                         <span class="ml-5"><input type="checkbox" class="form-check-input" id="opc_martes" value="2" name="dias[]">
                            <label class="form-check-label" for="opc_martes">Martes</label></span> 
                        </td>
                        <td>
                            <span class="ml-5"><input type="checkbox" class="form-check-input" id="opc_miercoles" value="3" name="dias[]">
                                <label class="form-check-label" for="opc_miercoles">Miercoles</label></span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" class="form-check-input" id="opc_jueves" value="4" name="dias[]">
                                <label class="form-check-label" for="opc_jueves">Jueves</label>
                            </td>
                            <td>
                             <span class="ml-5"><input type="checkbox" class="form-check-input" id="opc_viernes" value="5" name="dias[]">
                                <label class="form-check-label" for="opc_viernes">Viernes</label></span> 
                            </td>
                            <td>
                                <span class="ml-5"><input type="checkbox" class="form-check-input" id="opc_sabado" value="6" name="dias[]">
                                    <label class="form-check-label" for="opc_sabado">Sabado</label></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" class="form-check-input" id="opc_domingo" value="7" name="dias[]">
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

                        <option value="{{$tipocontrato->id}}">{{$tipocontrato->nombre}}</option>

                        @endforeach

                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">Puesto</label>

                <div class="col-md-6">
                    <select id='id_puesto' name='id_puesto' class="form-control">

                        @foreach(\App\Puestos::all() as $puesto)

                        <option value="{{$puesto->id}}">{{$puesto->nombre}}</option>

                        @endforeach

                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">Area</label>

                <div class="col-md-6">
                    <select id='id_area' name='id_area' class="form-control">

                        @foreach(\App\Areas::all() as $area)

                        <option value="{{$area->id}}">{{$area->nombre}}</option>

                        @endforeach

                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">Tipo de nómina</label>

                <div class="col-md-6">
                    <select id='id_tiponomina' name='id_tiponomina' class="form-control">

                        @foreach(\App\TiposNomina::all() as $tiponomina)

                        <option value="{{$tiponomina->id}}">{{$tiponomina->nombre}}</option>

                        @endforeach

                    </select>
                </div>
            </div>


            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">Tipo de cuenta</label>

                <div class="col-md-6">

                    <select id="tipo_cuenta" name="tipo_cuenta" class="form-control">
                        @foreach(\App\User::getOpciones('tipo_cuenta') as $index => $tipo_cuenta )

                        <option value="{{$index+1}}">{{$tipo_cuenta}}</option>

                        @endforeach
                    </select>
                </div>
            </div>

            <a class="mt-3 mr-3 btn btn-secondary" href="{{ url('empleados') }}" role="button">Regresar</a>
            {!! Form::submit('Registrar', ['class' => 'mt-3 btn btn-primary']) !!}

            {!! Form::close() !!}

        </div>
    </div>
</div>
</div>
</div>
@endsection

@section('extra-scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('#avatar-actual').click(function(){
            $('#avatarFile').click();
        });
        $('#change-avatar-again').click(function(){
            $('#avatarFile').click();
        });
        $("input:file").change(function (){
           var fileName = $(this).val();
           $(".filename").html(fileName);
           if(fileName != '') {
            
            $('#avatar-up-info').fadeOut(500)
            $('#avatar-actual').fadeOut(500);
            sleep(500).then(() => {
              document.getElementById("avatar-new-info-3").style.display = "block";
          })
        }
        else {
            $('#avatar-new-info-3').fadeOut(500);
            $('#avatar-up-info').delay(500).fadeIn("slow");
            $('#avatar-actual').delay(500).fadeIn("slow");
        }
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