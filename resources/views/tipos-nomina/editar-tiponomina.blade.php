@extends('layouts.app')

@section('title', 'Modificar tipo de nómina')

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
            <span style="font-size: 20px;" class="text-left">Modificar tipo de nómina - {{$tipo_nomina->nombre}}</span>
        </div>
    </div>
</div>
</div>

<div class="card-body">

    {!! Form::model($tipo_nomina, ['method' => 'PATCH', 'enctype' => 'multipart/form-data', 'route' => ['tipos-nomina.update', $tipo_nomina->id] ]) !!}

    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">No</label>

        <div class="col-md-6">
            <input id="id" type="text" class="digits-only form-control" name="id" value="{{$tipo_nomina->id}}" requiered>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">Nombre</label>

        <div class="col-md-6">
            <input id="nombre" name="nombre" type="text" class="form-control" value="{{$tipo_nomina->nombre}}" requiered>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">Número de días</label>

        <div class="col-md-6">
            <input type="text" class="digits-only form-control" name="num_dias" value="{{$tipo_nomina->num_dias}}" requiered>
        </div>
    </div>

    <a class="mt-3 mr-3 btn btn-secondary" href="{{ url('tipos-nomina') }}" role="button">Regresar</a>
    <a id="btn-eliminar" class="mt-3 mr-3 btn btn-danger" href="#!" role="button">Eliminar tipo de nómina</a>
    {!! Form::submit('Guardar', ['class' => 'mt-3 btn btn-primary']) !!}

    {!! Form::close() !!}

</div>
</div>
</div>
</div>
</div>

@endsection

@section('extra-scripts')
<script type="text/javascript">
    $(document).ready(function() {

        $('#btn-eliminar').click(function(){
            swal({
              title: "¿Estás seguro?",
              text: "El tipo de nómina {{$tipo_nomina->nombre}} será eliminado",
              icon: "warning",
              buttons: true,
              buttons: ["Cancelar", "Eliminar"],
              dangerMode: true,
          })
            .then((willDelete) => {
              if (willDelete) {
                window.location.replace("{{ url('tipos-nomina').'/'.$tipo_nomina->id.'/borrar' }}");
            }
        });
        });

    });

</script>
@endsection
