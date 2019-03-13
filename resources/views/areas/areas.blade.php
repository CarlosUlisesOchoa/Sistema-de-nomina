@extends('layouts.app')

@section('title', 'Gestión de areas')

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
                  <a href="{{url('/admin')}}">
                    <img width="33" height="33" class="bottom" src="{{asset('images/back-hover.png')}}">
                    <img width="33" height="33" class="top" src="{{asset('images/back.png')}}">
                  </a>
                </div>
              </div>
              <div class="col pl-0">
                <span style="font-size: 20px;" class="text-left">Gestionar areas</span>
              </div>
            </div>
          </div>
        </div>

        <div class="card-body">


          <a class="mb-3 btn btn-success" href="{{ \Request::url().'/create'}}" role="button">Agregar nueva area</a>


          <table class="table table-hover text-center">

            <thead>

              <th>No. area</th>

              <th>Nombre de area</th>

            </thead>

            <tbody>
              @foreach($areas as $area)

              <tr onclick="window.location='{{ url('areas').'/'.$area->id.'/edit' }}';" style="cursor: pointer;">

                <td>{{$area->id}}</td>

                <td>{{$area->nombre}}</td>

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
