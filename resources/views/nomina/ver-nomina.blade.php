@extends('layouts.app') 

@section('title', 'Nómina') 

@section('extra-css')
<link href="{{asset('css/nomina.css')}}" rel="stylesheet" type="text/css" /> 
@endsection 

@section('content')
<div id="hidden-alert" class="row justify-content-center text-center display-none">
    <div id="hidden-msg" class="col-11 ml-3 alert alert-info" role="alert">
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header pb-3 pt-2">
                    <div class="container">
                        <div class="row">
              <div id="back-arrow" class="col-1 px-0">
                <div width="33" height="33" id="" class="fadeimg">
                @if (Auth::user()->isAdmin())
                  <a href="{{url('/admin')}}">
                @else
                  <a href="{{route('my-paysheets')}}">
                @endif
                    <img width="33" height="33" class="bottom" src="{{asset('images/back-hover.png')}}">
                    <img width="33" height="33" class="top" src="{{asset('images/back.png')}}">
                  </a>
                </div>
              </div>
              <div class="col-auto pr-0 pl-4 pl-md-3 pl-lg-2 pl-xl-1">
                                <span class="font-size-20 text-left">Viendo nómina #{{$nomina->id}}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="card-body" class="card-body">

                    <div class="content-body">
                        <div class="row justify-content-start mb-4">
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                <button id="btn-genImg" class="btn btn-primary w-100" role="button">Descargar esta nómina</button>
                            </div>
                            <div class="col-12 col-sm-3 col-md-2 mt-2 mt-sm-0">
                                <button id="btn-print" class="btn btn-success w-100" role="button">Imprimir</button>
                            </div>
                        </div>
                        <div id="nomina">
                            <section class="card">
                                <div id="nomina-template" class="card-body">
                                    <div class="row justify-content-start">
                                        <div class="col-4 mb-3">
                                            <img src="{{ asset('images/logo.svg') }}" width="120%" alt="company logo" class="">
                                        </div>
                                    </div>
                                    <div id="nomina-company-details" class="row">
                                        <div class="col-md-7 col-sm-12 text-center text-md-left">
                                            <div class="media">
                                                <div class="media-body">
                                                    <ul class="px-0 list-unstyled">
                                                        <li class="text-bold-800"><b>Shane Corporation &copy</b></li>
                                                        <li>Calz. Benito Juarez #696, Francisco J. Mújica</li>
                                                        <li>Uruapan, Michoacán, México</li>
                                                        <li>RFC: COES961111K43</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="pr-0 col-md-5 col-sm-12 text-center text-md-left">
                                            <div class="container">
                                                <div class="row">
                                                    <div id="bg-title" class="col-12 border border-danger rounded-left">
                                                        <div class="d-flex align-items-center justify-content-center">
                                                            <div class="d-flex flex-column">
                                                                <h2 class="text align-self-center p-2 text-white">Recibo de nómina</h2>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="pl-0 col-4">
                                                        <p><span class="text-muted">Folio:</span> #{{$nomina->id}}</p>
                                                    </div>
                                                    <div class="pr-1 col-8 text-left text-lg-right">
                                                        <p><span class="text-muted">Periodo:</span> {{date('d/m/Y',strtotime($nomina->inicio_periodo))}} - {{date('d/m/Y',strtotime($nomina->fin_periodo))}}</p>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
 
                                    <div id="nomina-customer-details" class="row pt-2">
                                        <div class="col-md-7 col-sm-12 text-md-left">
                                            <span class="text-muted">Datos del empleado</span>
                                            <div class="row">
                                                <div id="employeer-data" class="col-4 pr-0 text-nowrap">
                                                    <ul class="px-0 list-unstyled">
                                                        <li>No. de empleado:</li>
                                                        <li>Nombre:</li>
                                                        <li>CURP:</li>
                                                        <li>RFC:</li>
                                                        <li>Tipo de contrato:</li>
                                                        <li>Area:</li>
                                                    </ul>
                                                </div>
                                                <div class="col-auto pl-3">
                                                    <ul class="px-0 list-unstyled">
                                                        <li>{{$nomina->empleado->id}}</li>
                                                        <li>{{$nomina->empleado->nombres.' '.$nomina->empleado->apellidos}}</li>
                                                        <li>{{$nomina->empleado->curp}}</li>
                                                        <li>{{$nomina->empleado->rfc}}</li>
                                                        <li>{{$nomina->empleado->tipocontrato->nombre}}</li>
                                                        <li>{{$nomina->empleado->area->nombre}}</li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="pt-4 col-md-5 col-sm-12  text-md-left">
                                            <div class="row">
                                                <div class="col-4 pr-0 text-nowrap">
                                                    <ul class="px-0 list-unstyled">
                                                        <li>Puesto:</li>
                                                        <li>Sueldo diario:</li>
                                                        <li>Tipo de nómina:</li>
                                                        <li>Dias trabajados:</li>
                                                        <li>Faltas:</li>
                                                    </ul>
                                                </div>
                                                <div class="col-auto pl-3">
                                                    <ul class="px-0 list-unstyled">
                                                        <li>{{$nomina->empleado->puesto->nombre}}</li>
                                                        <li><span class="money-format">{{$nomina->empleado->salario_diario}}</span></li>
                                                        <li>{{$nomina->empleado->tiponomina->nombre}}</li>
                                                        <li>{{$nomina->dias_trabajados}}</li>
                                                        <li>{{$nomina->dias_faltas}}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row text-center d-none d-md-flex bg-per-dec">
                                        <div class="pt-2 col-6">
                                            <h4 class="text-dark">Percepciones</h3>
                                    </div>
                                    <div class="pt-2 col-6">
                                        <h4 class="text-dark">Deducciones</h3>
                                    </div>
                                </div>

                                <div class="row text-center d-flex d-md-none bg-per-dec">
                                    <div class="pt-2 col-12">
                                        <h4 class="text-dark">Percepciones</h3>
                                    </div>
                                </div>

                                <div id="nomina-items-details" class="pt-1 mx-0">
                                    <div class="row">
                                        <div class="col-12 col-md-6 pl-0">
                                            <div class="table-responsive table-borderless">
                                                <table class="table">
                                                    <tbody>

                    @php
                    $vars = \Illuminate\Support\Facades\Schema::getColumnListing('nominas');

                    $percepciones = array();
                    $deducciones = array();

                    foreach($vars as $var) {
                        if (strpos($var, 'monto_') !== false) {
                            if($var == 'monto_totalpago' || $nomina->$var == 0 ||
                            $var == 'monto_percepciones' || 
                            $var == 'monto_deducciones') {
                                continue;
                        }

                            if($nomina->$var > 0) {
                                $percepciones[$var] = $nomina->$var;
                            } else {
                                $deducciones[$var] = $nomina->$var;
                            }
                        }
                    }

                    $keys_percepciones = array_keys($percepciones);
                    $keys_deducciones = array_keys($deducciones);

                    @endphp

                    @foreach ($keys_percepciones as $index=>$value)

                                                        <tr>
                                                            <th scope="row">{{$index+1}}</th>
                                                            <td>
                                                                <p class="fix-name">{{$value}}</p>
                                                            </td>
                                                            <td class="money-format text-right">{{$percepciones[$value]}}</td>
                                                        </tr>
                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex pb-2 d-md-none">
                                            <div class="pt-2 pr-0 col-7 text-right">
                                                <h5>Total percepciones:</h5>
                                            </div>
                                            <div class="pt-2 col-5 text-left">
                                                <h5 class="money-format">{{$nomina->monto_percepciones}}</h5>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex d-md-none bg-per-dec">
                                            <div class="pt-2 col-12 text-center">
                                                <h4 class="text-dark">Deducciones</h4>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 pr-0">
                                        <div class="table-responsive table-borderless">
                                            <table class="table">
                                                <tbody>

                                                    @foreach ($keys_deducciones as $index=>$value)

                                                    <tr>
                                                        <th scope="row">{{$index+1}}</th>
                                                        <td>
                                                            <p class="fix-name">{{$value}}</p>
                                                        </td>
                                                        <td class="money-format text-right">{{$deducciones[$value]}}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 d-flex d-md-none">
                                    <div class="pt-2 pr-0 col-6 text-right">
                                        <h5>Total deducciones:</h5>
                                    </div>
                                    <div class="pt-2 col-6 text-left">
                                        <h5 class="money-format">{{$nomina->monto_deducciones}}</h5>
                                    </div>
                                </div>
                                <div class="row d-none d-md-flex">
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-7 pr-0 text-right">
                                                <h5>Total percepciones:</h5>
                                            </div>
                                            <div class="col-5 text-left">
                                                <h5 class="money-format">{{$nomina->monto_percepciones}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-7 pr-0 text-right">
                                                <h5>Total deducciones:</h5>
                                            </div>
                                            <div class="col-5 text-left">
                                                <h5 class="money-format">{{$nomina->monto_deducciones}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr/>
                                <div class="row justify-content-center">
                                    <div class="col-6">
                                        <h4 class="text-right">Neto pagado:</h4>
                                    </div>
                                    <div class="col-6">
                                        <h4 class="money-format text-left">{{$nomina->monto_totalpago}}</h4>
                                    </div>
                                </div>
                                <hr/>
                                <div class="row">
                                    <div class="col-4 justify-content-start">
                                        <div class="text-center">
                                            <p>Autorizado por</p>
                                            <img src="{{asset('images/shane-signature.jpg')}}" alt="firma-rh" height="100" class="height-100">
                                            <h6>Shane Gibson</h6>
                                            <p class="text-muted">Jefe de recursos humanos</p>
                                        </div>
                                    </div>
                                    <div class="offset-4 col-4 justify-content-end">
                                        <div class="text-center">
                                            <p>Firma del empleado</p>
                                            <div id="employeer-signature"></div>
                                            <hr/>
                                            <h6>{{$nomina->empleado->nombres.' '.$nomina->empleado->apellidos}}</h6>
                                            <p class="text-muted">Empleado de Shane Corp &copy</p>
                                        </div>
                                    </div>
                                </div>

                                <div id="nomina-footer">
                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <h6>Terminos &amp; condiciones</h6>
                                            <p>Este recibó no es válido si no contiene la respectiva firma de autorización y/o el sello correspondiente al area de recursos humanos.</p>
                                        </div>
                                    </div>
                                </div>

                        </div>
                        </section>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
@endsection @section('extra-scripts')
<script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
<script>
    $(document).ready(function() {
        $('.money-format').each(function() {
            let value = parseFloat($(this).html());
            if (value < 0) {
                $(this).addClass('text-danger');
            }
            $(this).html(toMoney(value));
        });
        $('.fix-name').each(function() {
            let value = $(this).html();
            switch (value) {
                case 'monto_sueldo':
                    $(this).html('Sueldo');
                    break;
                case 'monto_isr':
                    $(this).html('I.S.R');
                    break;
                case 'monto_imss':
                    $(this).html('IMSS');
                    break;
                case 'monto_cuotasindical':
                    $(this).html('Cuota sindical');
                    break;
                case 'monto_faltas':
                    $(this).html('Faltas');
                    break;
                case 'monto_vacaciones':
                    $(this).html('Vacaciones');
                    break;
                case 'monto_primavacacional':
                    $(this).html('Prima vacacional');
                    break;
                case 'monto_aguinaldo':
                    $(this).html('Aguinaldo');
                    break;
                case 'monto_utilidades':
                    $(this).html('Reparto de utilidades');
                    break;
                default:
                    break;
            }
        });
    });
    $('#btn-genImg').on('click', function() {
        html2canvas(document.querySelector("#nomina")).then(canvas => {
            a = document.createElement('a'); 
            document.body.appendChild(a); 
            a.download = "nomina #" + "{{$nomina->id}}" + ".png"; 
            a.href =  canvas.toDataURL();
            a.click();
        });
    });

    $('#btn-print').on('click', function () {
        var win = window.open('','printwindow');
        win.document.write('<html><head><title>Nomina #{{$nomina->id}}</title><link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.min.css') }}"><link href="{{asset('css/nomina.css')}}" rel="stylesheet" type="text/css" /><link href="{{ asset('css/style.css') }}" rel="stylesheet"></head><body>');
        win.document.write($("#nomina").html());
        win.document.write('</body></html>');
        $('#hidden-msg').html('Recuerda cerrar la pestaña de impresión para continuar')
        $('#hidden-alert').slideDown('slow').removeClass('display-none');
        $(win).ready(function()
        {
            sleep(1000).then(() => {
                win.print();
                win.close();
            });
        });
        let timer = setInterval(function() { 
            if(win.closed) {
                clearInterval(timer);
                $('#hidden-alert').slideUp('slow');
            }
        }, 1000);
        
    });
</script>
@endsection