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
                                <span style="font-size: 20px;" class="text-left">Viendo nómina</span>
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
                                                    <p><span class="text-muted">Folio:</span> #85362</p>
                                                </div>
                                                <div class="pr-1 col-8 text-left text-lg-right">
                                                    <p><span class="text-muted">Periodo:</span> 01/05/2016 - 15/05/2016</p>
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
                                            <li>No. de empleado: 1</li>
                                            <li>Nombre: Shane Gibson</li>
                                            <li>CURP: OOVC961111CURP</li>
                                            <li>RFC: OOVC961111RFC</li>
                                            <li>RFC: OOVC961111RFC</li>
                                        </ul>
                                    </div>
                                    <div class="pt-4 col-md-5 col-sm-12 text-center text-md-left">
                                        <ul class="px-0 list-unstyled">
                                            <li>Area: Sistemas</li>
                                            <li>Puesto: Jefe de area</li>
                                            <li>Sueldo diario: $ 511.30</li>
                                            <li>Dias trabajados: 4</li>
                                            <li>Faltas: 1</li>
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
                                                        <tr>
                                                            <th scope="row">1</th>
                                                            <td>
                                                                <p>Create PSD for mobile APP</p>
                                                            </td>
                                                            <td class="text-right">$ 2400.00</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">2</th>
                                                            <td>
                                                                <p>Create PSD for mobile APP</p>
                                                            </td>
                                                            <td class="text-right">$ 2400.00</td>
                                                        </tr>
                                                        
                                                        <tr class="bg-light">
                                                            <th scope="row"></th>
                                                            <td>
                                                                <h5>Total percepciones</h5>
                                                            </td>
                                                            <td class="text-right"><h5>$ 2400.00</h5></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div style="background: #e8e9ea;" class="col-12 d-flex d-md-none">
                                            <div class="pt-2 col-12 text-center">
                                                <h4 class="text-dark">Deducciones</h3>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 pr-0">
                                            <div class="table-responsive table-borderless">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">1</th>
                                                            <td>
                                                                <p>Create PSD for mobile APP</p>
                                                            </td>
                                                            <td class="text-right">$ 2400.00</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">2</th>
                                                            <td>
                                                                <p>Create PSD for mobile APP</p>
                                                            </td>
                                                            <td class="text-right">$ 2400.00</td>
                                                        </tr>
                                                        <tr class="bg-light">
                                                            <th scope="row"></th>
                                                            <td>
                                                                <h5>Total deducciones</h5>
                                                            </td>
                                                            <td class="text-right"><h5>$ 2400.00</h5></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="row justify-content-center">
                                        <div class="col-6">
                                            <h4 class="text-right">Neto pagado:</h4>
                                        </div>
                                        <div class="col-6">
                                            <h4 class="text-left">$ 5,321.00</h4>
                                        </div>
                                </div>
                                <hr/>
                                <div class="row">
                                    <div class="col-4 justify-content-start">
                                        <div class="text-center">
                                                <p>Autorizado por</p>
                                                <img src="https://cdn.pixabay.com/photo/2014/11/09/08/06/signature-523237__340.jpg" alt="firma-rh" height="100" class="height-100">
                                                <h6>Shane</h6>
                                                <p class="text-muted">Jefe de recursos humanos</p>
                                        </div>
                                    </div>
                                    <div class="offset-4 col-4 justify-content-end">
                                        <div class="text-center">
                                                <p>Firma del empleado</p>
                                                <div style="height: 66px;"></div>
                                                <hr/>
                                                <h6>Henry</h6>
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
<script src="../assets/jsPDF/jspdf.debug.js"></script>
            <script src="../assets/jsPDF/examples/js/html2canvas.js"></script>

            <script>

                var doc = new jsPDF();

                var specialElementHandlers = {
                    '#header': function(element, renderer){
                        return true;
                    }
                };


                $('#btn-pdf').click(function(){
                    var html=$("#nomina").html();
                    doc.fromHTML(html,0,0, {
                        'width': 500,
                        'elementHandlers': specialElementHandlers
                    });
                    doc.save("Test.pdf");
                });

            </script>
@endsection