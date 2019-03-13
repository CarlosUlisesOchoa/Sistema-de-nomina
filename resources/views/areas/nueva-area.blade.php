@extends('layouts.app')

@section('title', 'Nueva area')


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
                  <a href="{{url('/areas')}}">
                    <img width="33" height="33" class="bottom" src="{{asset('images/back-hover.png')}}">
                    <img width="33" height="33" class="top" src="{{asset('images/back.png')}}">
                </a>
            </div>
        </div>
        <div class="col pl-0">
            <span style="font-size: 20px;" class="text-left">Registrar nueva area</span>
        </div>
    </div>
</div>
</div>

<div class="card-body">

    <form id="main-form" method="POST" action="{{ route('areas.store') }}">
        @csrf

        <div class="form-group row">
            <label for="id" class="col-md-4 col-form-label text-md-right">No. de area</label>

            <div class="col-md-6">
                <input id="id" type="text" class="form-control" name="id" value="Se generará automáticamente" disabled>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">Nombre del area</label>

            <div class="col-md-6">
                <input id="nombre" type="text" class="form-control" name="nombre" requiered autofocus>
            </div>
        </div>

        <a class="mt-3 mr-3 btn btn-secondary" href="{{ url('areas') }}" role="button">Regresar</a>
        {!! Form::submit('Registrar', ['class' => 'mt-3 btn btn-primary']) !!}

        {!! Form::close() !!}

    </div>
</div>
</div>
</div>
</div>
@endsection