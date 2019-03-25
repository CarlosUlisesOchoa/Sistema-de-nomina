@extends('layouts.app')

@section('title', 'Gestión de mis nóminas')

@section('extra-css')
<link href="{{asset('css/paysheet-list.css')}}" rel="stylesheet" type="text/css" /> 
@endsection 

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header pb-3 pt-2">
          <div class="container">
            <div class="row">
              <div id="back-arrow" class="col-1 px-0">
                <div width="33" height="33" id="" class="fadeimg">
                  <a href="{{url('/')}}">
                    <img width="33" height="33" class="bottom" src="{{asset('images/back-hover.png')}}">
                    <img width="33" height="33" class="top" src="{{asset('images/back.png')}}">
                  </a>
                </div>
              </div>
              <div class="col-auto pr-0 pl-4 pl-md-3 pl-lg-2 pl-xl-1">
                <span class="text-left font-size-20">Mis nóminas</span>
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
                  <button id="btn-0" class="btn btn-primary w-100 filtro" role="button">Folio</button>
                </div>
                <div class="col-xs-12 pb-2 col-md-6 col-lg-4 col-xl-2 pb-xl-0">
                  <button id="btn-4" class="btn btn-primary w-100 filtro" role="button">Periodo</button>
                </div>
              </div>
            </div>
          </div>

          <div id="div-filtrador" class="form-group row justify-content-center mt-4 mb-4 display-none">
              <label class="col-md-4 col-lg-2 col-form-label text-center text-md-right">Ingrese el filtro:</label>

              <div class="col-12 col-md-6 col-lg-4">
                  <input id="unused" type="text" class="form-control filtrar-tabla" value="" disabled>
              </div>
          </div>
          

          <div class="table-responsive">

            <table id="tabla-nominas" class="table table-hover text-center text-nowrap">

              <thead>

                <th>No. Folio</th>

                <th>Percepciones</th>

                <th>Deducciones</th>

                <th>Total pagado</th>

                <th>Periodo</th>


              </thead>

              <tbody>
                @foreach($nominas as $nomina)

                <tr class="cursor-pointer" onclick="window.location='{{url('mi-nomina').'/'.$nomina->id}}'">

                  <td>{{$nomina->id}}</td>

                  <td class="money-format">{{$nomina->monto_percepciones}}</td>

                  <td class="money-format">{{$nomina->monto_deducciones}}</td>

                  <td class="money-format">{{$nomina->monto_totalpago}}</td>

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

$(document).ready(function() {
  $('.money-format').each(function() {
      let value = parseFloat($(this).html());
      if (value < 0) {
          $(this).addClass('text-danger');
      }
      $(this).html(toMoney(value));
  });
});

function applyRules(input, id) {
  input.attr('class', 'form-control filtrar-tabla');
  input.val('');
  $(".filtrar-tabla").keyup();
  switch(id) {
    case '0': input.addClass('digits-only'); break;
    default: break;
  }
}

function manageInput(div, btnFiltro) {
    let enabled_Input = !$(div).find('input').prop('disabled');
    let newId = btnFiltro.attr('id').replace('btn-', '');
    let text = btnFiltro.html();
    applyRules($(div).find('input'), newId);
    if(enabled_Input && (newId == $(div).find('input').attr('id'))) { // Si está habilitado
        $(div).slideUp('slow');
        $(div).find('input').attr('id', 'unused');
        $(div).find('input').prop("disabled", true);
    } else {
        $(div).slideDown('slow');
        $(div).css("display", "flex");
        $(div).find('input').attr('id', newId);
        $(div).find('label').html('Ingrese el ' + text + ':');
        $(div).find('input').prop("disabled", false);
        $(div).find('input').focus();
    }
}

$('.filtro').click(function() {
    manageInput($('#div-filtrador'), $(this));   
});

$(".filtrar-tabla").keyup(function() {
  let col_Id = $(this).attr('id');
  let rex = new RegExp($(this).val(), 'i');
  $('#tabla-nominas tbody tr ').hide();
  $('#tabla-nominas tbody tr ').filter(function(i, v) {
      var $t = $(this).children(":eq(" + col_Id + ")");
      return rex.test($t.text());
  }).show();
});
</script>
@endsection

