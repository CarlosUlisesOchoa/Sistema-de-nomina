@extends('layouts.app')

@section('title', 'Nómina')

@section('extra-css')
<link href="{{asset('css/nomina.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
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

<div class="content-body"><section class="card">
    <div id="invoice-template" class="card-body">
        <!-- Invoice Company Details -->
        <div class="row justify-content-start">
            <div class="col-4 mb-3">
                <img src="{{asset('images/logo.png')}}" width="120%" alt="company logo" class="">
            </div>
        </div>
        <div id="invoice-company-details" class="row">
            <div class="col-md-8 col-sm-12 text-center text-md-left">
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
            
            <div style="background: #ef1e1e;" class="col-md-4 col-sm-12 text-center text-md-left">
                <div class="d-flex align-items-center justify-content-center h-100">
                  <div class="d-flex flex-column">
                    <h2 style="color: #FFF;" class="text align-self-center p-2">Recibo de nómina</h2>
                </div>
            </div>
        </div>
    </div>
        <!--/ Invoice Company Details -->

        <!-- Invoice Customer Details -->
        <div id="invoice-customer-details" class="row pt-2">
            <div class="col-md-8 col-sm-12 text-center text-md-left">
                <span class="text-muted">Datos del empleado</span>
                <ul class="px-0 list-unstyled">
                    <li>No. de empleado: 1</li>
                    <li>Nombre: Shane Gibson</li>
                    <li>CURP: OOVC961111CURP</li>
                    <li>RFC: OOVC961111RFC</li>
                </ul>
            </div>
            <div class="pl-0 col-md-4 col-sm-12 text-center text-md-left">
                <p><span class="text-muted">Folio:</span> #85362</p>
                <p><span class="text-muted">Periodo:</span> 01/05/2016 - 15/05/2016</p>
                <p><span class="text-muted">Terms :</span> Due on Receipt</p>
                <p><span class="text-muted">Due Date :</span> 10/05/2016</p>
            </div>
        </div>
        <!--/ Invoice Customer Details -->

        <!-- Invoice Items Details -->
        <div id="invoice-items-details" class="pt-2">
            <div class="row">
                <div class="table-responsive col-sm-12">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Item &amp; Description</th>
                          <th class="text-right">Rate</th>
                          <th class="text-right">Hours</th>
                          <th class="text-right">Amount</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>
                            <p>Create PSD for mobile APP</p>
                            <p class="text-muted">Simply dummy text of the printing and typesetting industry.</p>
                          </td>
                          <td class="text-right">$ 20.00/hr</td>
                          <td class="text-right">120</td>
                          <td class="text-right">$ 2400.00</td>
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                          <td>
                            <p>iOS Application Development</p>
                            <p class="text-muted">Pellentesque maximus feugiat lorem at cursus.</p>
                          </td>
                          <td class="text-right">$ 25.00/hr</td>
                          <td class="text-right">260</td>
                          <td class="text-right">$ 6500.00</td>
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                          <td>
                            <p>WordPress Template Development</p>
                            <p class="text-muted">Vestibulum euismod est eu elit convallis.</p>
                          </td>
                          <td class="text-right">$ 20.00/hr</td>
                          <td class="text-right">300</td>
                          <td class="text-right">$ 6000.00</td>
                        </tr>
                      </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7 col-sm-12 text-center text-md-left">
                    <p class="lead">Payment Methods:</p>
                    <div class="row">
                        <div class="col-md-8">
                        <table class="table table-borderless table-sm">
                            <tbody>
                                <tr>
                                    <td>Bank name:</td>
                                    <td class="text-right">ABC Bank, USA</td>
                                </tr>
                                <tr>
                                    <td>Acc name:</td>
                                    <td class="text-right">Amanda Orton</td>
                                </tr>
                                <tr>
                                    <td>IBAN:</td>
                                    <td class="text-right">FGS165461646546AA</td>
                                </tr>
                                <tr>
                                    <td>SWIFT code:</td>
                                    <td class="text-right">BTNPP34</td>
                                </tr>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-sm-12">
                    <p class="lead">Total due</p>
                    <div class="table-responsive">
                        <table class="table">
                          <tbody>
                            <tr>
                                <td>Sub Total</td>
                                <td class="text-right">$ 14,900.00</td>
                            </tr>
                            <tr>
                                <td>TAX (12%)</td>
                                <td class="text-right">$ 1,788.00</td>
                            </tr>
                            <tr>
                                <td class="text-bold-800">Total</td>
                                <td class="text-bold-800 text-right"> $ 16,688.00</td>
                            </tr>
                            <tr>
                                <td>Payment Made</td>
                                <td class="pink text-right">(-) $ 4,688.00</td>
                            </tr>
                            <tr class="bg-grey bg-lighten-4">
                                <td class="text-bold-800">Balance Due</td>
                                <td class="text-bold-800 text-right">$ 12,000.00</td>
                            </tr>
                          </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                        <p>Authorized person</p>
                        <img src="../../../app-assets/images/pages/signature-scan.png" alt="signature" class="height-100">
                        <h6>Amanda Orton</h6>
                        <p class="text-muted">Managing Director</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Invoice Footer -->
        <div id="invoice-footer">
            <div class="row">
                <div class="col-md-7 col-sm-12">
                    <h6>Terms &amp; Condition</h6>
                    <p>You know, being a test pilot isn't always the healthiest business in the world. We predict too much for the next year and yet far too little for the next 10.</p>
                </div>
                <div class="col-md-5 col-sm-12 text-center">
                    <button type="button" class="btn btn-primary btn-lg my-1"><i class="fa fa-paper-plane-o"></i> Send Invoice</button>
                </div>
            </div>
        </div>
        <!--/ Invoice Footer -->

    </div>
</section>
        </div>  

    </div>
</div>
</div>
</div>
</div>
@endsection

@section('extra-scripts')
<script>

</script>
@endsection