@extends('layouts.app') @section('title', 'Nómina') @section('extra-css')
<link href="{{asset('css/nomina.css')}}" rel="stylesheet" type="text/css" /> @endsection @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
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
                                <span style="font-size: 20px;" class="text-left">Viendo nómina #{{$nomina->id}}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">

                    <div class="content-body">
                        <div class="row mb-4">
                            <div class="col-12">
                                <button id="btn-pdf" class="btn btn-primary" role="button">Generar PDF</button>
                            </div>
                        </div>
                        <div id="nomina">
                        <section class="card">
                            <div id="nomina-template" class="card-body">
                                <!-- nomina Company Details -->
                                <div class="row justify-content-start">
                                    <div class="col-4 mb-3">
                                        <img src="{{asset('images/logo.png')}}" width="120%" alt="company logo" class="">
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
                                                <div style="background: #ef1e1e;" class="col-12 border border-danger rounded-left">
                                                    <div class="d-flex align-items-center justify-content-center h-100">
                                                        <div class="d-flex flex-column">
                                                            <h2 style="color: #FFF;" class="text align-self-center p-2">Recibo de nómina</h2>
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
                                <!--/ nomina Company Details -->

                                <!-- nomina Customer Details -->
                                <div id="nomina-customer-details" class="row pt-2">
                                    <div class="col-md-7 col-sm-12 text-center text-md-left">
                                        <span class="text-muted">Datos del empleado</span>
                                        
                                        <ul class="px-0 list-unstyled">
                                            <li>No. de empleado: {{$nomina->empleado->id}}</li>
                                            <li>Nombre: {{$nomina->empleado->nombres.' '.$nomina->empleado->apellidos}}</li>
                                            <li>CURP: {{$nomina->empleado->curp}}</li>
                                            <li>RFC: {{$nomina->empleado->rfc}}</li>
                                            <li>Tipo de contrato: {{ucfirst(strtolower($nomina->empleado->tipo_contrato))}}</li>
                                            <li>Area: {{$nomina->empleado->area->nombre}}</li>
                                        </ul>
                                    </div>
                                    <div class="pt-4 col-md-5 col-sm-12 text-center text-md-left">
                                        <ul class="px-0 list-unstyled">
                                            <li>Puesto: {{$nomina->empleado->puesto->nombre}}</li>
                                            <li>Sueldo diario: <span class="money-format">{{$nomina->empleado->salario_diario}}</span></li>
                                            <li>Tipo de nómina: {{$nomina->empleado->tiponomina->nombre}}</li>
                                            <li>Dias trabajados: {{($nomina->dias_trabajados)-($nomina->dias_faltas)}}</li>
                                            <li>Faltas: {{$nomina->dias_faltas}}</li>
                                        </ul>
                                    </div>
                                </div>
                                
                                <div style="background: #e8e9ea;" class="row text-center d-none d-md-flex">
                                    <div class="pt-2 col-6">
                                        <h4 class="text-dark">Percepciones</h3>
                                    </div>
                                    <div class="pt-2 col-6">
                                        <h4 class="text-dark">Deducciones</h3>
                                    </div>
                                </div>

                                <div style="background: #e8e9ea;" class="row text-center d-flex d-md-none">
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
                    $suma_percepciones = 0;
                    $deducciones = array();
                    $suma_deducciones = 0;

                    foreach($vars as $var) {
                        if (strpos($var, 'monto_') !== false) {
                            if($var == 'monto_totalpago' || $nomina->$var == 0) continue;

                            if($nomina->$var > 0) {
                                $percepciones[$var] = $nomina->$var;
                                $suma_percepciones += $nomina->$var;
                            } else {
                                $deducciones[$var] = $nomina->$var;
                                $suma_deducciones += $nomina->$var;
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
                                                <h5 class="money-format">{{$suma_percepciones}}</h5>
                                            </div>
                                        </div>
                                        <div style="background: #e8e9ea;" class="col-12 d-flex d-md-none">
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
                                                <h5 class="money-format">{{$suma_deducciones}}</h5>
                                            </div>
                                    </div>
                                    <div class="row d-none d-md-flex">
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-7 pr-0 text-right">
                                                    <h5>Total percepciones:</h5>
                                                </div>
                                                <div class="col-5 text-left">
                                                    <h5 class="money-format">{{$suma_percepciones}}</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-7 pr-0 text-right">
                                                    <h5>Total deducciones:</h5>
                                                </div>
                                                <div class="col-5 text-left">
                                                    <h5 class="money-format">{{$suma_deducciones}}</h5>
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
                                                <img src="https://cdn.pixabay.com/photo/2014/11/09/08/06/signature-523237__340.jpg" alt="firma-rh" height="100" class="height-100">
                                                <h6>Shane Gibson</h6>
                                                <p class="text-muted">Jefe de recursos humanos</p>
                                        </div>
                                    </div>
                                    <div class="offset-4 col-4 justify-content-end">
                                        <div class="text-center">
                                                <p>Firma del empleado</p>
                                                <div style="height: 66px;"></div>
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
@endsection 
@section('extra-scripts')
<script>
$(document).ready(function () {
    $('.money-format').each(function () {
        let value = parseFloat($(this).html());
        if(value < 0) {
            $(this).addClass('text-danger');
        }
        $(this).html(toMoney(value));
    });
    $('.fix-name').each(function () {
        let value = $(this).html();
        switch(value) {
            case 'monto_sueldo':            $(this).html('Sueldo'); break;
            case 'monto_isr':               $(this).html('I.S.R'); break;
            case 'monto_imss':              $(this).html('IMSS'); break;
            case 'monto_cuotasindical':     $(this).html('Cuota sindical'); break;
            case 'monto_faltas':            $(this).html('Faltas'); break;
            case 'monto_vacaciones':        $(this).html('Vacaciones'); break;
            case 'monto_primavacacional':   $(this).html('Prima vacacional'); break;
            case 'monto_aguinaldo':         $(this).html('Aguinaldo'); break;
            case 'monto_utilidades':        $(this).html('Reparto de utilidades'); break;
            default: break;
        }
    });
});
</script>
@endsection