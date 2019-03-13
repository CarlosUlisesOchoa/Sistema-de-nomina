@extends('layouts.app')

@section('title', 'Modificar tipo de nómina')

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
                <div class="card-header">Modificar tipo de nómina - {{$tiponomina->nombre}}</div>

                <div class="card-body">

                    {!! Form::model($tiponomina, ['method' => 'PATCH', 'enctype' => 'multipart/form-data', 'route' => ['tiposnomina.update', $tiponomina->id] ]) !!}

                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">No. de tipo</label>

                        <div class="col-md-6">
                            <input id="id" type="text" class="digits-only form-control" name="id" value="{{$tiponomina->id}}" requiered>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Nombre</label>

                        <div class="col-md-6">
                            <input id="nombre" name="nombre" type="text" class="form-control" value="{{$tiponomina->nombre}}" requiered>
                        </div>
                    </div>

                    <a class="mt-3 mr-3 btn btn-secondary" href="{{ url('tiposnomina') }}" role="button">Regresar</a>
                    <a id="btn-eliminar" class="mt-3 mr-3 btn btn-danger" href="#!" role="button">Eliminar</a>
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
              text: "El tipo de nómina {{$tiponomina->nombre}} será eliminado",
              icon: "warning",
              buttons: true,
              buttons: ["Cancelar", "Eliminar"],
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                window.location.replace("{{ url('tiposnomina').'/'.$tiponomina->id.'/borrar' }}");
              }
            });
        });

    });

</script>
@endsection
