@extends('layouts.app')

@section('title', 'Generar nueva nómina')

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
            <div class="row justify-content-start">
              <div class="col-1 pl-0">
                <div width="33" height="33" id="" class="fadeimg">
                    <a href="{{url('/admin')}}">
                        <img width="33" height="33" class="bottom" src="{{asset('images/back-hover.png')}}">
                        <img width="33" height="33" class="top" src="{{asset('images/back.png')}}">
                    </a>
                </div>
            </div>
            <div class="col pl-0">
                <span style="font-size: 20px;" class="text-left">Generar nueva nómina</span>
            </div>
        </div>
    </div>
</div>

<div class="card-body">

    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">Empleado</label>

        <div class="col-md-6">
            <input type="text" class="form-control" name="datos_Empleado" value="{{sprintf("[%d] %s %s", $empleado->id, $empleado->nombres, $empleado->apellidos)}}" readonly>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">Tipo de nómina</label>

        <div class="col-md-6">
            <input id="tipo_nomina" type="text" class="form-control" name="datos_Empleado" value="{{\App\TiposNomina::where('id', $empleado->id_tiponomina)->first()->nombre}}" readonly>
        </div>
    </div>

    <form id="main-form" method="POST" action="{{ route('nomina.store') }}">
        @csrf

        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">Periodo</label>
            <div id="date-picker" class="col-md-3 input-append date">
                <input id="fec_1" name="fec_1" value="" class="date-picker1">
            </div>
            <label> - </label>
            <div id="date-picker" class="col-md-3 input-append date">
                <input id="fec_2" name="fec_2" value="" class="date-picker2" disabled>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">Sueldo</label>

            <div class="col-md-6">
                <input id="sueldo" type="text" class="form-control" name="datos_Empleado" value="" disabled>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">Faltas</label>

            <div class="col-md-6">
                <input id="input-faltas" type="text" class="digits-only form-control" name="datos_Empleado" value="" placeholder="Dejar vacio este espacio en caso de ser 0" autofocus>
            </div>
        </div>

        <div id="div-descuento-faltas" class="form-group row  display-none">
            <label class="col-md-4 col-form-label text-md-right">Descuento por faltas</label>

            <div class="col-md-6">
                <input id="input-descuento-faltas" type="text" class="form-control text-danger" name="datos_Empleado" value="" disabled>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">Vacaciones (No. de días)</label>

            <div class="col-md-4 pr-md-0">
                <input id="input-vacaciones" type="text" class="form-control" name="datos_Empleado" value="Habilite sólo si aplica" disabled>
            </div>

            <div class="col-md-2 pl-md-0">
                <a style="width: 100%" id="btn-vacaciones" class="btn btn-success" href="#!" role="button">Habilitar</a>
            </div>
        </div>

        <div id="hidden-vacaciones" class="display-none">
            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">Monto por vacaciones</label>

                <div class="col-md-6">
                    <input id="input-monto-vacaciones" type="text" class="form-control" name="datos_Empleado" value="" disabled>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">Prima vacacional</label>

                <div class="col-md-6">
                    <input id="input-prima-vacacional" type="text" class="form-control" name="datos_Empleado" value="" disabled>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">Aguinaldo</label>

            <div class="col-md-4 pr-md-0">
                <input id="input-aguinaldo" type="text" class="form-control" name="datos_Empleado" value="Habilite sólo si aplica" disabled>
            </div>

            <div class="col-md-2 pl-md-0">
                <a id="btn-aguinaldo" style="width: 100%" class="btn btn-success" href="#!" role="button">Habilitar</a>
            </div>
        </div>

        <div id="div-monto-aguinaldo" class="form-group row  display-none">
            <label class="col-md-4 col-form-label text-md-right">Monto por aguinaldo</label>

            <div class="col-md-6">
                <input id="input-monto-aguinaldo" type="text" class="form-control" name="datos_Empleado" value="" disabled>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">Utilidades</label>

            <div class="col-md-4 pr-md-0">
                <input id="input-utilidades" type="text" class="float cash form-control" name="datos_Empleado" value="Habilite sólo si aplica" disabled>
            </div>

            <div class="col-md-2 pl-md-0">
                <a id="btn-utilidades" style="width: 100%" class="btn btn-success" href="#!" role="button">Habilitar</a>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">ISR</label>

            <div class="col-md-6">
                <input type="text" class="form-control" name="datos_Empleado" value="" disabled>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">IMSS</label>

            <div class="col-md-6">
                <input type="text" class="form-control" name="datos_Empleado" value="" disabled>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">Cuota sindical</label>

            <div class="col-md-6">
                <input type="text" class="form-control" name="datos_Empleado" value="" disabled>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">Total a pagar</label>

            <div class="col-md-6">
                <input id="total-pago" type="text" class="form-control" name="datos_Empleado" value="" disabled>
            </div>
        </div>

        <a class="mt-3 mr-3 btn btn-secondary" href="{{ url('tiposnomina') }}" role="button">Regresar</a>
        {!! Form::submit('Registrar', ['class' => 'mt-3 btn btn-primary']) !!}

        {!! Form::close() !!}

    </div>
</div>
</div>
</div>
</div>
@endsection

@section('extra-scripts')
<script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>

<script>
var diasNomina = {{\App\TiposNomina::where('id', $empleado->id_tiponomina)->first()->num_dias}};
var salario_Diario = {{$empleado->salario_diario}};
$( document ).ready(function() {
    let todaysDate = new Date();
    let startDate = new Date();
    startDate.setDate(startDate.getDate() -diasNomina);
    $("#fec_1").val(dateFormat(startDate));
    $("#fec_2").val(dateFormat(todaysDate));
    $("#sueldo").val(toMoney(salario_Diario * diasNomina));
    $('#total-pago').val($("#sueldo").val());
});

function dateFormat(date) {
    let date_str = (date.getDate() > 9 ? date.getDate() : '0' + date.getDate()) + "/" + ((date.getMonth()+1) > 9 ? (date.getMonth()+1) : '0' + (date.getMonth()+1)) + "/" + date.getFullYear();
    return date_str;
}

function strToDate(strDate) { //dd/mm/yyyy
    let parts = strDate.split('/');
    var dateF = new Date(parts[2], parts[1] - 1, parts[0]);
    return dateF
}

function updateSueldo(){
    let total_amount = 0;
    total_amount += (salario_Diario * diasNomina);
    if($('#input-descuento-faltas').val().length > 0) {
        let faltas = $('#input-faltas').val();
        total_amount -= (salario_Diario * faltas);
    }
    if($('#input-monto-vacaciones').val().length > 0) {
        total_amount += moneyToVar($('#input-monto-vacaciones').val());
    }
    if($('#input-monto-aguinaldo').val().length > 0) {
        total_amount += moneyToVar($('#input-monto-aguinaldo').val());
    }
    if($('#input-utilidades').prop("disabled") == false) {
        if($('#input-utilidades').val().length > 0) {
            total_amount += moneyToVar($('#input-utilidades').val());
        }
    }

    $("#total-pago").val(toMoney(total_amount));
}

function manage_Input(input, btn, hidden_Div, display_Type) {
    let enabled_Input = !$(input).prop("disabled");
    $(input).prop("disabled", enabled_Input);
    $(input).val( enabled_Input ? "Habilite sólo si aplica" : "");
    $(btn).addClass( enabled_Input ? 'btn-success' : 'btn-danger').removeClass( enabled_Input ? 'btn-danger' : 'btn-success');
    $(btn).text( enabled_Input ? "Habilitar" : "Deshabilitar");
    if(enabled_Input) { // Si está habilitado
        $(hidden_Div).fadeOut('slow');
    } else {
        $(hidden_Div).fadeIn('slow');
        $(hidden_Div).css("display", display_Type);
        $(input).focus();
    }    
}

$('#input-faltas').on( "input", function() {
    let faltas = $(this).val();
    if(faltas > 0) {
        $('#div-descuento-faltas').fadeIn('slow');
        $('#div-descuento-faltas').css("display", "flex");
        $('#input-descuento-faltas').val(toMoney((salario_Diario * faltas)*-1));
    } else {
        $('#input-descuento-faltas').val("");
        $('#div-descuento-faltas').fadeOut('slow');
    }
    updateSueldo();
});

$('#input-vacaciones').on( "input", function() {
    let dias_vacaciones = $(this).val();
    $('#input-monto-vacaciones').val("");
    $('#input-prima-vacacional').val("");
    if(dias_vacaciones > 0) {
        let amount = salario_Diario * (dias_vacaciones);
        $('#input-monto-vacaciones').val(toMoney(amount));
        amount = amount * 0.25;
        $('#input-prima-vacacional').val(toMoney(amount));
    }
    updateSueldo();
});

$("#fec_1").change(function() {
    let newDate = strToDate($(this).val());
    newDate.setDate(newDate.getDate() + {{\App\TiposNomina::where('id', $empleado->id_tiponomina)->first()->num_dias}});
    $('#fec_2').val(dateFormat(newDate));

});

$('#btn-vacaciones').click(function() {
    manage_Input($('#input-vacaciones'), $(this), $('#hidden-vacaciones'), "block");
    if($('#input-vacaciones').prop("disabled")) {
        $('#input-monto-vacaciones').val("");
        $('#input-prima-vacacional').val("");
    }
    updateSueldo();
});

$('#btn-aguinaldo').click(function() {
    manage_Input($('#input-aguinaldo'), $(this), $('#div-monto-aguinaldo'), "flex");
    if($('#btn-aguinaldo').text() == "Deshabilitar") {
        $('#input-aguinaldo').prop("readonly", true);
        $('#input-aguinaldo').val("15 días");
        $('#input-monto-aguinaldo').val(toMoney(salario_Diario * 15));
    } else {
        $('#input-monto-aguinaldo').val("");
    }
    updateSueldo();
    
});

$('#btn-utilidades').click(function() {
    manage_Input($('#input-utilidades'), $(this));
    updateSueldo();
});

$('#input-utilidades').on( "blur", function() {
    updateSueldo();
});

$('.date-picker1').datepicker({
    uiLibrary: 'bootstrap4', format: 'dd/mm/yyyy'
});
$('.date-picker2').datepicker({
    uiLibrary: 'bootstrap4', format: 'dd/mm/yyyy'
});
</script>
@endsection