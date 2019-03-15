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
            <input type="text" class="form-control" name="datos_Empleado" value="{{\App\TiposNomina::where('id', $empleado->id_tiponomina)->first()->nombre}}" readonly>
        </div>
    </div>

    <form id="main-form" method="POST" action="{{ route('nomina.store') }}">
        @csrf

        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">Periodo</label>
            <div id="date-picker" class="col-md-3 input-append date">
                <input id="fec_nac" name="fec_nac" value="" class="date-picker1">
            </div>
            <label> - </label>
            <div id="date-picker" class="col-md-3 input-append date">
                <input id="fec_nac" name="fec_nac" value="" class="date-picker2">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">Faltas</label>

            <div class="col-md-6">
                <input type="text" class="digits-only form-control" name="datos_Empleado" value="">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">Vacaciones (No. de días)</label>

            <div class="col-md-4 pr-md-0">
                <input id="vacaciones" type="text" class="form-control" name="datos_Empleado" value="Habilite sólo si aplica" disabled>
            </div>

            <div class="col-md-2 pl-md-0">
                <a style="width: 100%" id="btn-vacaciones" class="btn btn-success" href="#!" role="button">Habilitar</a>
            </div>
        </div>

        <div id="hidden-vacaciones" class="display-none">
            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">Monto por vacaciones</label>

                <div class="col-md-6">
                    <input type="text" class="form-control" name="datos_Empleado" value="" disabled>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">Prima vacacional</label>

                <div class="col-md-6">
                    <input type="text" class="form-control" name="datos_Empleado" value="" disabled>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">Aguinaldo</label>

            <div class="col-md-4 pr-md-0">
                <input id="aguinaldo" type="text" class="form-control" name="datos_Empleado" value="Habilite sólo si aplica" disabled>
            </div>

            <div class="col-md-2 pl-md-0">
                <a id="btn-aguinaldo" style="width: 100%" class="btn btn-success" href="#!" role="button">Habilitar</a>
            </div>
        </div>

        <div id="monto-aguinaldo" class="form-group row  display-none">
            <label class="col-md-4 col-form-label text-md-right">Monto por aguinaldo</label>

            <div class="col-md-6">
                <input type="text" class="form-control" name="datos_Empleado" value="" disabled>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">Utilidades</label>

            <div class="col-md-4 pr-md-0">
                <input id="utilidades" type="text" class="form-control" name="datos_Empleado" value="Habilite sólo si aplica" disabled>
            </div>

            <div class="col-md-2 pl-md-0">
                <a id="btn-utilidades" style="width: 100%" class="btn btn-success" href="#!" role="button">Habilitar</a>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">Sueldo</label>

            <div class="col-md-6">
                <input type="text" class="form-control" name="datos_Empleado" value="" disabled>
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
            <label class="col-md-4 col-form-label text-md-right">Descuento por faltas</label>

            <div class="col-md-6">
                <input type="text" class="form-control" name="datos_Empleado" value="" disabled>
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

    $('#btn-vacaciones').click(function() {
        manage_Input($('#vacaciones'), $(this), $('#hidden-vacaciones'), "block");
    });

    $('#btn-aguinaldo').click(function() {
        manage_Input($('#aguinaldo'), $(this), $('#monto-aguinaldo'), "flex");
    });

    $('#btn-utilidades').click(function() {
        manage_Input($('#utilidades'), $(this));
    });

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

    $('.date-picker1').datepicker({
        uiLibrary: 'bootstrap4', format: 'dd/mm/yyyy'
    });
    $('.date-picker2').datepicker({
        uiLibrary: 'bootstrap4', format: 'dd/mm/yyyy'
    });
</script>
@endsection