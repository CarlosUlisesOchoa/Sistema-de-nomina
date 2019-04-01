@extends('layouts.app')

@section('title', 'Mi perfil')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header pb-3 pt-2">
          <div class="container">
            <div class="row">
              <div class="col-auto pr-0 pl-4 pl-md-3 pl-lg-2 pl-xl-1">
            <span class="text-left font-size-20">Perfil de {{$user->nombres}}</span>
        </div>
    </div>
</div>
</div>

<div class="card-body">

    <div class="container">

        <div id="div-GuardarCambios" class="row justify-content-center mb-3 display-none" >

            <button id="btn-GuardarCambios" class="btn btn-primary">Guardar cambios</button>
        </div>

        <div class="row justify-content-center" >

            <div class="profile-header-container">   
                <div class="profile-header-img">
                    <img class="mb-2 mx-auto d-block rounded-circle cursor-pointer" src="/storage/images/avatars/{{ $user->avatar }}" width="128" id="avatar-actual"/>

                    <!-- badge -->
                    <div class="rank-label-container text-center">
                        <span class="label label-default rank-label" id="titulo-avatar">Foto de perfil</span>
                        <div id="avatar-up-info-1"><small id="fileHelp" class="form-text text-muted text-center">Haga clic sobre la foto si desea cambiarla. La imagen no debe sobrepasar los 2MB.</small></div>
                        
                        <div id="avatar-new-info-1" class="mt-3 alert alert-success alert-dismissible fade show display-none" role="alert">Se ha seleccionado una nueva imagen
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <form id="form-userdata" enctype="multipart/form-data" method="POST" action="{{route('update-profile')}}">

    {{ csrf_field() }}
    {{ method_field('PATCH') }}

    <button type="submit" id="btn-Update" class="d-none"></button>

    <input type="file" class="form-control-file invisible" name="avatar" id="avatarFile" aria-describedby="fileHelp">

    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">No. de empleado</label>

        <div class="col-md-6">
            <input type="text" class="digits-only form-control" value="{{$user->id}}" disabled="">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">Contraseña actual</label>

        <div class="col-md-4 input-group pr-md-0">
        <input type="password" name="actualPassword" id="input-ActualPassword" class="form-control" data-toggle="password" placeholder="Ingrese su contraseña actual" value="password" disabled>
        </div>

        <div class="col-md-2 pl-md-0 mt-2 mt-md-0">
            <button type="button" id="btn-CambiarPassword" class="btn btn-success w-100" role="button">Cambiar</button>
        </div>
    </div>

    <div id="div-NewPassword" class="display-none">
        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">Nueva contraseña</label>

            <div class="col-md-6 input-group">
                <input type="password" name="newPassword" id="input-NewPassword" class="form-control" data-toggle="password" placeholder="Ingresar nueva contraseña" disabled>
                <div class="input-group-append">
                    <span class="input-group-text"><i class="fa fa-eye"></i></span>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">Confirmar contraseña</label>

            <div class="col-md-6 input-group">
                <input type="password" name="confirmedPassword" id="input-ConfirmPassword" class="form-control" data-toggle="password" placeholder="Confirmar nueva contraseña" disabled>
                <div class="input-group-append">
                    <span class="input-group-text"><i class="fa fa-eye"></i></span>
                </div>
            </div>
        </div>
    </div>

    </form>

<div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right">Nombres</label>

    <div class="col-md-6">
        <input id="nombres" name="nombres" type="text" class="letters-space name form-control" value="{{$user->nombres}}" disabled>
    </div>
</div>

<div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right">Apellidos</label>

    <div class="col-md-6">
        <input id="apellidos" name="apellidos" type="text" class="letters-space name form-control" value="{{$user->apellidos}}" disabled>
    </div>
</div>

<div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right">Fecha de nacimiento</label>
    <div class="col-md-6">
        <input id="fec_nac" name="fec_nac" value="{{date('d/m/Y',strtotime($user->fec_nac))}}" class="form-control" disabled>
    </div>
</div>

<div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right">Genero</label>

    <div class="col-md-6">
        <input class="form-control" value="{{ucfirst(strtolower($user->genero))}}" disabled>
    </div>
</div>

<div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right">Estado civil</label>

    <div class="col-md-6">
        <input class="form-control" value="{{ucfirst(strtolower($user->estado_civil))}}" disabled>
    </div>
</div>

<div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right">CURP</label>

    <div class="col-md-6">
        <input id="curp" name="curp" type="text" class="alpha-numeric curp-rfc form-control" value="{{$user->curp}}" disabled>
    </div>
</div>

<div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right">RFC</label>

    <div class="col-md-6">
        <input id="rfc" name="rfc" type="text" class="alpha-numeric curp-rfc form-control" value="{{$user->rfc}}" disabled>
    </div>
</div>

<div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right">Domicilio</label>

    <div class="col-md-6">
        <input id="domicilio" name="domicilio" type="text" class="form-control" value="{{$user->domicilio}}" disabled>
    </div>
</div>

<div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right">Cuenta bancaria</label>

    <div class="col-md-6">
        <input id="cta_bancaria" name="cta_bancaria" type="text" class="digits-only form-control" value="{{$user->cta_bancaria}}" disabled>
    </div>
</div>

<div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right">Salario diario</label>

    <div class="col-md-6">
        <input id="salario_diario" name="salario_diario" type="text" class="float form-control" value="{{$user->salario_diario}}" disabled>
    </div>
</div>

<div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right">Dias de descanso</label>

    <div class="col-md-6">
        <div class="form-check">
            <table>
                <tr>
                    <td>
                        <input type="checkbox" class="form-check-input" id="opc_lunes" value="1" name="dias[]" @if(preg_match("/1/", $user->dias_descanso)) checked @endif disabled>
                        <label class="form-check-label" for="opc_lunes">Lunes</label>
                    </td>
                    <td>  
                       <span class="ml-5"><input type="checkbox" class="form-check-input" id="opc_martes" value="2" name="dias[]" @if(preg_match("/2/", $user->dias_descanso)) checked @endif disabled>
                        <label class="form-check-label" for="opc_martes">Martes</label></span> 
                    </td>
                    <td>
                        <span class="ml-5"><input type="checkbox" class="form-check-input" id="opc_miercoles" value="3" name="dias[]" @if(preg_match("/3/", $user->dias_descanso)) checked @endif disabled>
                            <label class="form-check-label" for="opc_miercoles">Miercoles</label></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" class="form-check-input" id="opc_jueves" value="4" name="dias[]" @if(preg_match("/4/", $user->dias_descanso)) checked @endif disabled>
                            <label class="form-check-label" for="opc_jueves">Jueves</label>
                        </td>
                        <td>
                           <span class="ml-5"><input type="checkbox" class="form-check-input" id="opc_viernes" value="5" name="dias[]" @if(preg_match("/5/", $user->dias_descanso)) checked @endif disabled>
                            <label class="form-check-label" for="opc_viernes">Viernes</label></span> 
                        </td>
                        <td>
                            <span class="ml-5"><input type="checkbox" class="form-check-input" id="opc_sabado" value="6" name="dias[]" @if(preg_match("/6/", $user->dias_descanso)) checked @endif disabled>
                                <label class="form-check-label" for="opc_sabado">Sabado</label></span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" class="form-check-input" id="opc_domingo" value="7" name="dias[]" @if(preg_match("/7/", $user->dias_descanso)) checked @endif disabled>
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
        <input class="form-control" value="{{$user->tipocontrato->nombre}}" disabled>
    </div>
        </div>

        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">Puesto</label>

            <div class="col-md-6">
        <input class="form-control" value="{{$user->puesto->nombre}}" disabled>
    </div>
        </div>

        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">Area</label>

            <div class="col-md-6">
        <input class="form-control" value="{{$user->area->nombre}}" disabled>
    </div>
        </div>

        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">Tipo de nómina</label>

            <div class="col-md-6">
        <input class="form-control" value="{{$user->tiponomina->nombre}}" disabled>
    </div>
        </div>
    </div>
</div>
</div>
</div>
</div>

@endsection

@section('extra-scripts')
<script>
$(document).ready(function () {

    $('#btn-CambiarPassword').on('click', function () {
        let input = $('#input-ActualPassword');
        let btn = $(this);
        let enabled_Input = !$(input).prop("disabled");
        $(input).prop("disabled", enabled_Input);
        $('#input-NewPassword').prop("disabled", enabled_Input);
        $('#input-ConfirmPassword').prop("disabled", enabled_Input);
        $(input).val( enabled_Input ? "password" : "");
        $(btn).addClass( enabled_Input ? 'btn-success' : 'btn-danger').removeClass( enabled_Input ? 'btn-danger' : 'btn-success');
        $(btn).text( enabled_Input ? "Cambiar" : "Cancelar");
        if(enabled_Input) { // Si está habilitado
            $('#div-NewPassword').slideUp('slow');
            $('#div-NewPassword input').val("");
        } else {
            $('#div-NewPassword').slideDown('slow');
            $('#div-NewPassword').css("display", "block");
            $(input).focus();
        }
        if($('#div-GuardarCambios').css('display') == 'none') {
            $('#div-GuardarCambios').slideDown('slow').css("display", "flex");
        }    
    });

    $('#avatar-actual').click(function(){
        $('#avatarFile').click();
    });

    $("input:file").change(function (){
        var fileName = $(this).val();
        $(".filename").html(fileName);
        if(fileName != '') {
            $('#avatar-up-info-1').hide();
            $("#avatar-new-info-1").slideDown('slow').css("display", "block");
            if($('#div-GuardarCambios').css('display') == 'none') {
                $('#div-GuardarCambios').slideDown('slow').css("display", "flex");
            }

        }
        else {
            $('#avatar-new-info-1').fadeOut(500);
            $('#avatar-up-info-1').delay(500).fadeIn("slow");
        }
    });

    $('#btn-GuardarCambios').on("click", function () {
        let changingPass = !$('#input-ActualPassword').prop("disabled");
        let changingAvatar = ($("#avatar-new-info-1").css('display') != 'none');
        if(changingPass == false && changingAvatar == false) {
            swal({
                title: "Error",
                text: "¡ No hay nada que actualizar !",
                icon: "warning",
            });
        } else {
            let updateItems = (changingPass ? "contraseña " : "") + (changingAvatar ? "foto de perfil" : "");
            swal({
              title: "¿Estás seguro?",
              text: "Se actualizará tu " + updateItems,
              icon: "warning",
              buttons: true,
              buttons: ["Cancelar", "Ok"],
            }).then((confirm) => {
                if (confirm) {
                    $('#btn-Update').click();
                }
            });
        }
    });

});

</script>
@endsection
