@extends('layouts.app')

@section('title', 'Gestión de nóminas')

@section('extra-css')
<link href="{{asset('css/paysheet-list.css')}}" rel="stylesheet" type="text/css" /> 
@endsection 

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header pb-3 pt-2">
          <div class="container">
            <div class="row">
              <div id="back-arrow" class="col-1 px-0">
                <div width="33" height="33" id="" class="fadeimg">
                  <a href="{{url('/admin')}}">
                    <img width="33" height="33" class="bottom" src="{{asset('images/back-hover.png')}}">
                    <img width="33" height="33" class="top" src="{{asset('images/back.png')}}">
                  </a>
                </div>
              </div>
              <div class="col-auto pr-0 pl-4 pl-md-3 pl-lg-2 pl-xl-1">
                <span class="text-left font-size-20">Gestionar nóminas</span>
              </div>
            </div>
          </div>
        </div>

        <div class="card-body">


          <div class="row mb-3 justify-content-center">
            <div class="col-12 col-md-2 text-center mt-1 mb-2">
                  <span>Filtrar por:</span>
            </div>
            <div class="col-10 px-0 mx-0">
              <div class="row justify-content-start">
                <div class="col-xs-12 pb-2 col-md-6 col-lg-4 col-xl-2 pb-xl-0">
                  <button class="btn btn-primary w-100" role="button">Folio</button>
                </div>
                <div class="col-xs-12 pb-2 col-md-6 col-lg-4 col-xl-3 pb-xl-0">
                  <button class="btn btn-primary w-100" role="button">No. Empleado</button>
                </div>
                <div class="col-xs-12 pb-2 col-md-6 col-lg-4 col-xl-3 pb-xl-0">
                  <button class="btn btn-primary w-100" role="button">Nombre empleado</button>
                </div>
                <div class="col-xs-12 pb-2 col-md-6 col-lg-4 col-xl-2 pb-xl-0">
                  <button class="btn btn-primary w-100" role="button">Periodo</button>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group row justify-content-center mt-4 mb-4">
              <label class="col-md-3 col-form-label text-center text-md-right">Ingrese el filtro:</label>

              <div class="col-md-4">
                  <input id="cta_bancaria" name="cta_bancaria" type="text" class="digits-only form-control" value="" requiered>
              </div>
          </div>
          

          <div class="table-responsive">

            <table class="table table-hover text-center text-nowrap">

              <thead>

                <th>No. Folio</th>

                <th>No. Empleado</th>

                <th class="d-none d-md-table-cell">Nombres</th>

                <th class="d-none d-md-table-cell">Apellidos</th>

                <th>Periodo</th>


              </thead>

              <tbody>
                @foreach($nominas as $nomina)

                <tr class="cursor-pointer" onclick="managePaysheet({{$nomina->id}});">

                  <td>{{$nomina->id}}</td>

                  <td>{{$nomina->empleado->id}}</td>

                  <td class="d-none d-md-table-cell">{{$nomina->empleado->nombres}}</td>

                  <td class="d-none d-md-table-cell">{{$nomina->empleado->apellidos}}</td>

                  <td>{{date('d/m/Y',strtotime($nomina->inicio_periodo))}} - {{date('d/m/Y',strtotime($nomina->fin_periodo))}}</td>

                </tr>

                @endforeach

              </tbody>

            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('extra-scripts')
<script>
$('#btn-GenerarNomina').click(function() {
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

function managePaysheet(id) {
  swal("¿Qué desea hacer?", {
  buttons: {
    cancel: "Cancelar",
    editar: {
      text: "Editar",
      value: "editar",
    },
    ver: {
      text: "Solo ver",
      value: "ver",
    },
  },
  icon: "{{asset('images/money.png')}}",
})
.then((value) => {
  switch (value) {
 
    case "ver":
      window.location='{{ url('nomina').'/'}}' + id;
      break;
 
    case "editar":
      window.location='{{ url('nomina').'/'}}' + id + '/edit';
      break;
 
    default:
      break;
  }
});
}
</script>
@endsection

