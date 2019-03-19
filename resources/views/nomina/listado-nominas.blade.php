@extends('layouts.app')

@section('title', 'Gestión de nóminas')

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


          <button id="btn-GenerarNomina" class="mb-3 btn btn-success" role="button">Crear una nueva nómina</button>

          <div class="table-responsive">

            <table class="table table-hover text-center">

              <thead>

                <th>No. Folio</th>

                <th>No. Empleado</th>

                <th>Nombres</th>

                <th>Apellidos</th>

                <th>Periodo</th>


              </thead>

              <tbody>
                @foreach($nominas as $nomina)

                <tr class="cursor-pointer" onclick="managePaysheet({{$nomina->id}});">

                  <td>{{$nomina->id}}</td>

                  <td>{{$nomina->empleado->id}}</td>

                  <td>{{$nomina->empleado->nombres}}</td>

                  <td>{{$nomina->empleado->apellidos}}</td>

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
    ver: {
      text: "Solo ver",
      value: "ver",
    },
    editar: {
      text: "Editar",
      value: "editar",
    },
  },
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

