@extends('layouts.app')

@section('title', 'Gestión de tipos de nómina')

@section('content')

<div class="container">

  <div style="margin-left: 140px;" width="33" height="33" class="fadeimg">
        <a href="{{url('/admin')}}">
            <img width="33" height="33" class="mt-2 bottom" src="{{asset('images/back-hover.png')}}" />
            <img width="33" height="33" class="mt-2 top" src="{{asset('images/back.png')}}" />
        </a>
  </div>

  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">

        <div class="card-header">Gestión de tipos de nómina</div>

        <div class="card-body">


          <a class="mb-3 btn btn-success" href="{{ \Request::url().'/create'}}" role="button">Agregar nuevo tipo de nómina</a>


            <table class="table table-hover text-center">

              <thead>

                <th>No. tipo</th>

                <th>Nombre del tipo de nómina</th>

              </thead>

              <tbody>
                @foreach($tiposnomina as $tiponomina)

                <tr onclick="window.location='{{ url('tiposnomina').'/'.$tiponomina->id.'/edit' }}';" style="cursor: pointer;">

                  <td>{{$tiponomina->id}}</td>

                  <td>{{$tiponomina->nombre}}</td>

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
