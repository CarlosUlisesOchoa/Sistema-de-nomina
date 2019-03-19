<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  @yield('extra-css')

  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon-32x32.png') }}">

  <title>{{ config('app.name', 'Laravel') }} @if(Route::currentRouteName() != '') - @yield('title') @endif</title>

</head>

<body>
  <header> <a href="{{ url('/') }}"><img id="logo-main" src="{{ asset('images/logo.png') }} " width="50%" alt="Logo"> 

    <!-- ===================================== NAVBAR ==================================== -->

    <nav class="navbar navbar-expand-md navbar-dark bg-dark"> <a class="navbar-brand" href="{{ url('/') }}">Shane Corp &copy;</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>

      <div class="collapse navbar-collapse" id="navbarsExample04">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item @if(Route::currentRouteName() == '') active @endif"> <a class="nav-link" href="{{ url('/') }}">Inicio</a> </li>
        </ul>
        <ul class="navbar-nav">
          @auth 
          <span class="navbar-text text-white">
            {{ Auth::user()->nombres }} 
            @if (Auth::user()->isAdmin()) 
            <span class="text-danger"><b>(Admin)</b></span> 
            @endif
          </span>
          <li class="nav-item dropdown"> 
            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Opciones</a>
            <div class="dropdown-menu" aria-labelledby="dropdown04"> 
             @if (Auth::user()->isAdmin()) 
             <a class="dropdown-item" href="{{ route('admin') }}">Panel admin</a> 
             @endif 
             <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar sesión</a>
             <form id="logout-form" class="d-none" action="{{ route('logout') }}" method="POST">
               @csrf
             </form>
           </div>
         </li>
         @else
         <li class="nav-item @if(Route::currentRouteName() == 'login') active @endif"><a class="nav-link" href="{{ route('login') }}">Iniciar sesión</a></li>
         @endif
       </ul>
     </div>
   </nav>

   <!-- ======================================================================================= --> 

 </header>

 <main class="py-4">


@if(!empty($Msg))
<div class="row justify-content-center">
<div id="alert-msg" class="ml-3 alert alert-{{$MsgType}} alert-dismissible fadex" role="alert">
  {{ $Msg }}
  <button id="btn-msg" type="button" class="close" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
</div>
@endif

  @yield('content')

</main>

<footer>
  <p></p>
</footer>
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script> 
<script src="{{ asset('js/app.js') }}"></script> 
<script src="{{ asset('js/jquery-3.3.1.js') }}"></script> 
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
<script src="{{ asset('js/personal.js') }}"></script>

@yield('extra-scripts')
@include('sweet::alert')
</body>
</html>
