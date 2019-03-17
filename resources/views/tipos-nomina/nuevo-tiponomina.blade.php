@extends('layouts.app')

@section('title', 'Nuevo tipo de nómina')


@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header pb-3 pt-2">
          <div class="container">
            <div class="row justify-content-start">
              <div class="col-1 pl-0">
                <div width="33" height="33" id="" class="fadeimg">
                  <a href="{{url('/tipos-nomina')}}">
                    <img width="33" height="33" class="bottom" src="{{asset('images/back-hover.png')}}">
                    <img width="33" height="33" class="top" src="{{asset('images/back.png')}}">
                </a>
            </div>
        </div>
        <div class="col pl-0">
            <span style="font-size: 20px;" class="text-left">Registrar nuevo tipo de nómina</span>
        </div>
    </div>
</div>
</div>

<div class="card-body">

    <form id="main-form" method="POST" action="{{ route('tipos-nomina.store') }}">
        @csrf

        <div class="form-group row">
            <label for="id" class="col-md-4 col-form-label text-md-right">No. de tipo de nómina</label>

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

        <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">Número de días</label>

        <div class="col-md-6">
            <input type="text" class="digits-only form-control" name="num_dias" value="" requiered>
        </div>
    </div>

        <a class="mt-3 mr-3 btn btn-secondary" href="{{ url('tipos-nomina') }}" role="button">Regresar</a>
        {!! Form::submit('Registrar', ['class' => 'mt-3 btn btn-primary']) !!}

        {!! Form::close() !!}

    </div>
</div>
</div>
</div>
</div>
@endsection