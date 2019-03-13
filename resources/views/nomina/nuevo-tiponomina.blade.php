@extends('layouts.app')

@section('title', 'Nuevo tipo de nómina')


@section('content')
<div class="container">
    <div style="margin-left: 140px;" width="33" height="33" id="" class="fadeimg">
        <a href="{{url('/tiposnomina')}}">
            <img width="33" height="33" class="mt-2 bottom" src="{{asset('images/back-hover.png')}}" />
            <img width="33" height="33" class="mt-2 top" src="{{asset('images/back.png')}}" />
        </a>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registrar nuevo tipo de nómina</div>

                <div class="card-body">

                    <form id="main-form" method="POST" action="{{ route('tiposnomina.store') }}">
                        @csrf

                    <div class="form-group row">
                        <label for="id" class="col-md-4 col-form-label text-md-right">No. de tipo</label>

                        <div class="col-md-6">
                            <input id="id" type="text" class="form-control" name="id" value="Se generará automáticamente" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Nombre del tipo de nómina</label>

                        <div class="col-md-6">
                            <input id="nombre" type="text" class="form-control" name="nombre" requiered autofocus>
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