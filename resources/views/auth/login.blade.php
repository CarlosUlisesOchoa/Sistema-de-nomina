@extends('layouts.app')

@section('title', 'Iniciar sesión')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Inicio de sesión') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div id="form-userdata" class="form-group row">
                            <label for="id" class="col-md-4 col-form-label text-md-right">No. de empleado</label>

                            <div class="col-md-6">
                                <input id="id" type="text" class="form-control{{ $errors->has('empleado') ? ' is-invalid' : '' }}" name="id" value="{{ old('empleado') }}" autofocus required>

                                @if ($errors->has('empleado'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('empleado') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>

                            <div class="col-md-6 input-group">
                              <input type="password" name="password" id="password" class="form-control" data-toggle="password" required autofocus>
                              <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-eye"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Recordarme') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Iniciar sesión') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

@endsection

@section('extra-scripts')
<script>
    // $( "#id" ).on("paste", function() {  
    //     setTimeout(function(){
    //         if ($('#id').val() != $('#id').val().replace(/\D/g,"")) 
    //         { 
    //           $('#id').val($('#id').val().replace(/\D/g,""));
    //       }
    //   },10)
    // });

    // $('#form-reg').on('keydown', '#id', function(e){
    //     -1!==$.inArray(e.keyCode,[46,8,9,27,13]) || /65|67|86|88/.test(e.keyCode) && (!0===e.ctrlKey || !0===e.metaKey) || 35<=e.keyCode&& 40 >= e.keyCode || (e.shiftKey || 48 > e.keyCode || 57 < e.keyCode) && (96 > e.keyCode || 105 < e.keyCode) && e.preventDefault()
    // });
</script>
@endsection
