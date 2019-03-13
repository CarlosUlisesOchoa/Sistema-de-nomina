@extends('layouts.app')

@section('title', 'Bienvenida')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mensaje de bienvenida</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    ¡ Bienvenido {{ (Auth::user()->isAdmin() == true ? 'administrador ' : '').Auth::user()->nombres }} !
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('extra-scripts')
<script>

sleep(3000).then(() => {
    var newUrl = "{{url('/')}}";
    if({{Auth::user()->isAdmin()}} == true) {
        newUrl = "{{url('/admin')}}";
    }
    window.location.href = newUrl;
});

</script>
@endsection
