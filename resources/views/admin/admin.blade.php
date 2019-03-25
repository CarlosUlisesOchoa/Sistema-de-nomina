<link href="../../../public/bootstrap/css/bootstrap.min.css" rel="stylesheet">

@extends('layouts.app')

@section('title', 'Panel administrativo')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">Panel admin</div>

                <div class="card-body text-center">

                    <div class="container">

                        <div class="row">
                            <div class="col"><hr></div>
                            <div class="col-auto">Administrar</div>
                            <div class="col"><hr></div>
                        </div>

                        <div class="row no-gutters">

                            <div class="col-xs-12 pb-2 col-md-6 pr-md-2 col-lg-4 col-xl-3 pb-xl-0"> <a class="btn btn-primary inside-col" href="{{ route('empleados.index') }}" role="button">Administrar empleados</a></div>
                            <div class="col-xs-12 pb-2 col-md-6 pr-md-2 col-lg-4 col-xl-3 pb-xl-0"> <a class="btn btn-primary inside-col" href="{{ route('areas.index') }}" role="button">Administrar areas</a></div>
                            <div class="col-xs-12 pb-2 col-md-6 pr-md-2 col-lg-4 col-xl-3 pb-xl-0"> <a class="btn btn-primary inside-col" href="{{ route('puestos.index') }}" role="button">Administrar puestos</a></div>
                            <div class="col-xs-12 col-md-6 pr-md-2 col-lg-4 col-xl-3"> <a class="btn btn-primary inside-col" href="{{ route('tipos-nomina.index') }}" role="button">Administrar tipos de nómina</a></div>
                        </div>

                        <div class="row no-gutters mt-2 mt-md-3">

                            <div class="col-xs-12 pb-2 col-md-6 pr-md-2 col-lg-4 col-xl-3 pb-xl-0"> <a class="btn btn-primary inside-col" href="{{ route('tipos-contrato.index') }}" role="button">Administrar tipos de contrato</a></div>
                        </div>

                    <hr/>

                    <div class="row">
                        <div class="mt-3 col"><hr></div>
                        <div class="mt-3 col-auto">Nóminas</div>
                        <div class="mt-3 col"><hr></div>
                    </div>

                    <div class="row no-gutters justify-content-center">

                        <div class="col-xs-12 pb-2 col-md-6 pr-md-2 col-lg-4 col-xl-3 pb-xl-0"><button class="btn btn-secondary inside-col" id="btn_Generar_Nomina" role="button">Generar una nómina</button></div>
                        <div class="col-xs-12 col-md-6 pr-md-2 col-lg-4 col-xl-3"><a class="btn btn-secondary inside-col" href="{{ route('nomina.index') }}" role="button">Gestionar nóminas creadas</a></div>
                    
                    </div>

                    <hr/>

                </div>

            </div>
        </div>
    </div>
</div>
</div>

@endsection

@section('extra-scripts')
<script>
$('#btn_Generar_Nomina').click(function() {
    swal({
      content: "input",
      title: "Generar nómina",
      text: "No. de empleado para el cual generará la nómina:",
      icon: "{{asset('images/money.png')}}",
      buttons: true,
      buttons: ["Cancelar", "Confirmar"],
    })
    .then((value) => {
      if(value != null && $.isNumeric(value)) {
        window.location.replace("{{ url('nomina').'/generar/'}}" + value);
      }
    });
});
</script>
@endsection


