@extends('layouts.app')

@section('title', 'Modificar area')

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
                  <a href="{{url('/areas')}}">
                    <img width="33" height="33" class="bottom" src="{{asset('images/back-hover.png')}}">
                    <img width="33" height="33" class="top" src="{{asset('images/back.png')}}">
                  </a>
                </div>
              </div>
              <div class="col-auto pr-0 pl-4 pl-md-3 pl-lg-2 pl-xl-1">
            <span class="text-left font-size-20">Modificar area - {{$area->nombre}}</span>
        </div>
    </div>
</div>
</div>

<div class="card-body">

    {!! Form::model($area, ['method' => 'PATCH', 'enctype' => 'multipart/form-data', 'route' => ['areas.update', $area->id] ]) !!}

    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">No. de area</label>

        <div class="col-md-6">
            <input id="id" type="text" class="digits-only form-control" name="id" value="{{$area->id}}" requiered>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">Nombre</label>

        <div class="col-md-6">
            <input id="nombre" name="nombre" type="text" class="form-control" value="{{$area->nombre}}" requiered>
        </div>
    </div>

    <a class="mt-3 mr-3 btn btn-secondary" href="{{ url('areas') }}" role="button">Regresar</a>
    <a id="btn-eliminar" class="mt-3 mr-3 btn btn-danger" href="#!" role="button">Eliminar area</a>
    {!! Form::submit('Guardar area', ['class' => 'mt-3 btn btn-primary']) !!}

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
              text: "El area {{$area->nombre}} será eliminada",
              icon: "warning",
              buttons: true,
              buttons: ["Cancelar", "Eliminar"],
              dangerMode: true,
          })
            .then((willDelete) => {
              if (willDelete) {
                window.location.replace("{{ url('areas').'/'.$area->id.'/borrar' }}");
            }
        });
        });

    });

</script>
@endsection
