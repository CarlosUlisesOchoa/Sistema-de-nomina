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

                            <div class="col-xs-12 pb-2 col-md-6 pr-md-2 col-lg-4 col-xl-3 pb-xl-0"> <a class="btn btn-primary inside-col" href="{{ url('empleados') }}" role="button">Administrar empleados</a></div>
                            <div class="col-xs-12 pb-2 col-md-6 pr-md-2 col-lg-4 col-xl-3 pb-xl-0"> <a class="btn btn-primary inside-col" href="{{ url('areas') }}" role="button">Administrar areas</a></div>
                            <div class="col-xs-12 pb-2 col-md-6 pr-md-2 col-lg-4 col-xl-3 pb-xl-0"> <a class="btn btn-primary inside-col" href="{{ url('puestos') }}" role="button">Administrar puestos</a></div>
                            <div class="col-xs-12 col-md-6 pr-md-2 col-lg-4 col-xl-3"> <a class="btn btn-primary inside-col" href="{{ url('tipos-nomina') }}" role="button">Administrar tipos de nómina</a></div>
                        </div>

                    <hr/>

                    <div class="row">
                        <div class="mt-3 col"><hr></div>
                        <div class="mt-3 col-auto">Nóminas</div>
                        <div class="mt-3 col"><hr></div>
                    </div>

                    <div class="row no-gutters justify-content-center">

                        <div class="col-xs-12 pb-2 col-md-6 pr-md-2 col-lg-4 col-xl-3 pb-xl-0"><a class="btn btn-secondary inside-col" href="{{ url('empleados') }}" role="button">Generar una nómina</a></div>
                        <div class="col-xs-12 col-md-6 pr-md-2 col-lg-4 col-xl-3"><a class="btn btn-secondary inside-col" href="{{ url('areas') }}" role="button">Gestionar nóminas creadas</a></div>
                    
                    </div>

                    <hr/>

                </div>

            </div>
        </div>
    </div>
</div>
</div>

@endsection
