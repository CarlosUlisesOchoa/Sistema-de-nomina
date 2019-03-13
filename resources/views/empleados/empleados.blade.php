@extends('layouts.app')

@section('title', 'Gestión de empleados')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
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
                <span style="font-size: 20px;" class="text-left">Gestionar empleados</span>
              </div>
            </div>
          </div>
        </div>

        <div class="card-body">


          <a class="mb-3 btn btn-success" href="{{ \Request::url().'/create'}}" role="button">Agregar nuevo empleado</a>

          <div class="table-responsive">

            <table class="table table-hover text-center">

              <thead>

                <th>No. empleado</th>

                <th>Nombres</th>

                <th>Apellidos</th>

                <th>Puesto</th>

                <th>Area</th>

                <th>Tipo de cuenta</th>

                <th>Estado de la cuenta</th>

              </thead>

              <tbody>
                @foreach($users as $user)

                <tr onclick="window.location='{{ url('empleados').'/'.$user->id.'/edit' }}';" style="cursor: pointer;" @if($user->cuenta_activa == false) class="table-secondary" @endif >

                  <td>{{$user->id}}</td>

                  <td>{{$user->nombres}}</td>

                  <td>{{$user->apellidos}}</td>

                  <td>{{$user->puesto->nombre}}</td>

                  <td>{{$user->area->nombre}}</td>

                  @if($user->tipo_cuenta == 'ADMIN')
                  <td><b><p class="text-danger">Administrador</p></b></td>
                  @else
                  <td>Usuario</td>
                  @endif

                  <td width="230"><img id="estado-cuenta" src="{{ asset('images').($user->cuenta_activa ? '/check.png' : '/wrong.png') }} " width="30" class="img" style="display: inline-block;" alt="status"></td>

                </tr>

                @endforeach

              </tbody>

            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
