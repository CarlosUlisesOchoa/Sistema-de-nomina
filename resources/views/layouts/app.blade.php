<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"> 
    @yield('extra-css')

    <!-- Sidebar -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/sidebar.css')}}">

    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon-32x32.png') }}">

    <title>{{ config('app.name', 'Laravel') }} @if (trim($__env->yieldContent('title'))) - @yield('title') @endif</title>

</head>

<body>

<div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar" class="sb-sticky">
            <div class="sidebar-header">
                <h3 class="row justify-content-center">
                    {{Auth::check() ? Auth::user()->nombres : 'Invitado'}}
                </h3>
                <div class="row justify-content-center">
  
                    <div class="img">
                        <img class="profile-photo" 
                        src="{{asset('storage/images/avatars').'/'.(Auth::check() ? Auth::user()->avatar : 'default_avatar.png')}}">
                    </div>

                </div>
                <span class="h4 row justify-content-center mt-2 mb-0">
                    {{Auth::check() ? Auth::user()->puesto->nombre : ''}}
                </span>
            </div>

            <div class="sidebar-separator"></div>

            <ul class="list-unstyled CTAs">
                <li>
                    <a href="javascript:;" onclick="delayGo('{{route('main-page')}}',1500)">Página principal</a>
                </li>
                @auth
                    <li>
                        <a href="javascript:;" onclick="delayGo('{{route('profile')}}',1500)">Mi perfil</a>
                    </li>
                    <li>
                        <a href="javascript:;" onclick="delayGo('{{route('my-paysheets')}}',1500)">Ver mis nóminas</a>
                    </li>
                @else
                    <li class="pb-3">
                        <span class="text-justify">Inicia sesión si deseas acceder al contenido completo</span>
                    </li>
                    <li>
                        <a href="javascript:;" onclick="delayGo('{{route('login')}}',1500)">Ver mis nóminas</a>
                    </li>
                @endif
                
                @if(Auth::check() && Auth::user()->isAdmin())
                <li>
                    <a href="javascript:;" onclick="delayGo('{{route('admin')}}',1500)" role="button" class="btn btn-red">Ir al panel admin</a>
                </li>
                @endif
            </ul>
        </nav>


        <!-- Page Content  -->
        <div id="content">

            <header>
            <div>
                <a href="{{ url('/') }}">
                    <img id="logo-main" src="{{ asset('images/logo.svg') }} " alt="Logo Shane Corp">

                </a> 
            </div> 



            <nav id="main-navbar" class="navbar navbar-expand-sm navbar-dark bg-dark rounded border sticky-top">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-custom">
                        <i class="fas fa-align-left"></i>
                        <span>{{Auth::check() ? Auth::user()->nombres : 'Invitado'}}</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-sm-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            @auth
                            <li class="nav-item">
                          <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar sesión</a>
                          <form id="logout-form" class="d-none" action="{{ route('logout') }}" method="POST">
                            @csrf
                          </form>
                        </li>
                            @else
                            <li class="nav-item @if(Route::currentRouteName() == 'login') active @endif">
                            <a class="nav-link" href="{{ route('login') }}">Iniciar sesión</a>
                          </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>
            </header>

            <div class="main-content">
                @if(!empty($Msg))
                <div class="row justify-content-center text-center">
                    <div id="alert-msg" class="col-11 ml-3 alert alert-{{$MsgType}} alert-dismissible fadex" role="alert">
                        {{ $Msg }}
                        <button id="btn-msg" type="button" class="close" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                @endif

                @if(\Session::has('msgData'))
                    @if(empty($Msg)) 
                        <div class="row justify-content-center text-center">
                            <div id="alert-msg" class="col-11 ml-3 alert alert-{{session()->get('msgData')['type']}} alert-dismissible fadex" role="alert">
                                {{session()->get('msgData')['msg']}}
                                <button id="btn-msg" type="button" class="close" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    @endif
                @endif
                @yield('content')
                <button id="btn-scrollTop" class="scroll-top btn" data-scroll="up" type="button">
                <i class="fa fa-chevron-up"></i>
                </button>
            </div>

            <!-- Footer -->
            <footer class="pt-5 page-footer font-small unique-color-dark">

                <!-- Footer Links -->
                <div class="text-center text-md-left mt-5">

                  <!-- Grid row -->
                  <div class="row mt-3 justify-content-around">

                    <!-- Grid column -->
                    <div class="mb-4 col-md-3 col-lg-5 [ col-xl-4 ] ">

                      <!-- Content -->
                      <h6 class="text-uppercase text-center font-weight-bold">Acerca de Shane Corp ©</h6>
                      <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 100%;">
                      <p class="text-justify">Somos una empresa farmaceútica dedicada principalmente a la investigación y creación de sustancias capaces de mejorar las habilidades humanas mediante el uso de química aplicada</p>

                    </div>
                    
                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-4 mb-md-0 mb-4 text-left justify-content-center">

                      <!-- Links -->
                      <h6 class="text-uppercase text-center font-weight-bold">Contacto</h6>
                      <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 100%;">
                      <div class="pl-5">
                      <p>
                        <i class="fas fa-home mr-3"></i> Uruapan, Mich 60050, MX</p>
                      <p>
                        <i class="fas fa-envelope mr-3"></i> info@shane-corp.com</p>
                      <p>
                        <i class="fas fa-phone mr-3"></i> + 52 452 150 8571</p>
                      </div>
                    </div>
                    <!-- Grid column -->

                  </div>
                  <!-- Grid row -->

                </div>
                <!-- Footer Links -->

                <!-- Copyright -->
                <div class="footer-copyright text-center py-3">Copyright © 2019 by <a href="#" class="text-muted"> Shane</a>
                </div>
                <!-- Copyright -->

              </footer>
              <!-- Footer -->
        </div>
    </div>

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