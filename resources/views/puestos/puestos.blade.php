@extends('layouts.app')

@section('title', 'Gestión de puestos')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
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
                <span class="text-left font-size-20">Gestionar puestos</span>
              </div>
            </div>
          </div>
        </div>

        <div class="card-body">


          <a class="mb-3 btn btn-success" href="{{ \Request::url().'/create'}}" role="button">Agregar nueva puesto</a>


          <table class="table table-hover text-center">

            <thead>

              <th>No. puesto</th>

              <th>Nombre de puesto</th>

            </thead>

            <tbody>
              @foreach($puestos as $puesto)

              <tr class="cursor-pointer" onclick="window.location='{{ url('puestos').'/'.$puesto->id.'/edit' }}';">

                <td>{{$puesto->id}}</td>

                <td>{{$puesto->nombre}}</td>

              </tr>

              @endforeach

            </tbody>

          </table>

        </div>
      </div>
    </div>
  </div>
</div>

@endsection
