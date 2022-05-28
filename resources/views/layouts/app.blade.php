<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ADMIN COINSDA</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="{{asset('storage/web/escudo.png')}}" type="image/x-icon" />
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-highway.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.w3-sidebar a {font-family: "Roboto", sans-serif}
body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}
img{
		width: 200px
		
	}
</style>
<body class="w3-content" style="max-width:2500px">

<div class="w3-sidebar w3-light-blue w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
  <button class="w3-bar-item w3-button w3-large w3-highway-blue"
  onclick="w3_close()">Close &times;</button>
  <div class="w3-container w3-display-container w3-padding-16 w3-light-white">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
    <h3 class="w3-wide w3-white w3-center" ><b> DIVINO AMORE ADMIN</b></h3>
    
    
            
  </div>
  <div class="w3-padding-64 w3-large w3-text-black " style="font-weight:normal">
      <a href="{{ route('admision.index') }}" class="w3-bar-item w3-button">Admisiones</a>
      <a href="{{ route('auditoria.index') }}" class="w3-bar-item w3-button">Auditorias</a>
      <a href="{{ route('banner.index') }}" class="w3-bar-item w3-button ">Banners</a>
      <a href="{{ route('colegio.index') }}" class="w3-bar-item w3-button">Colegio</a>
      <a href="{{ route('comunicado.index') }}" class="w3-bar-item w3-button">Comunicados</a>
      <a href="{{ route('egresado.index') }}" class="w3-bar-item w3-button">Egresados</a>
      <a href="{{ route('empleado.index') }}" class="w3-bar-item w3-button ">Empleados</a>
      <a href="{{ route('evento.index') }}" class="w3-bar-item w3-button">Eventos</a>
      <a href="{{ route('footer.index') }}" class="w3-bar-item w3-button">Footer</a>
      <a href="{{ route('matricula.index') }}" class="w3-bar-item w3-button">Matriculas</a>
      <a href="{{ route('noticia.index') }}" class="w3-bar-item w3-button">Noticias</a>
      <a href="{{ route('plataforma.index') }}" class="w3-bar-item w3-button">Plataformas</a>
      <a href="{{ route('programador.index') }}" class="w3-bar-item w3-button">programador</a>
      <a href="{{ route('social.index') }}" class="w3-bar-item w3-button">Redes Sociales</a>
      <a href="{{ route('cuenta.index') }}" class="w3-bar-item w3-button">Rendicion de Cuentas</a>
      <a href="{{ route('historia.index') }}" class="w3-bar-item w3-button">Trayectoria</a>
  </div>
  <ul class="navbar-nav ml-auto w3-center">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
</div> 

<div class="general" id="general">
  <header class="w3-container w3-xlarge w3-highway-blue" ><br>

  <div class="w3-display-container w3-highway-blue" style="height:300px;">
  <div class="w3-display-topleft"><button id="openNav" class="w3-button w3-highway-blue w3-xlarge" onclick="w3_open()">&#9776;</button></div>
      <div class="w3-display-left" style="margin-left:10%"><img class="img-thumbnail img-fluid w3-highway-blue w3-border-0" alt="" src="{{asset('storage/web/escudo.png')}}"></div>
      <div class="w3-display-middle"><h1 class="w3-center " style="font:bold">Colegio Integrado Nuestra Señora del Divino Amor </h1></div>
  </div> 

  </header>
  
  <main class="py-4">
            @yield('content')
        </main>

<iframe src="https://coldivinoamor.com.co/sistema/user/footer.php" style ="width:100%; height:600px"></iframe>
        

        
</div>

<script>
function w3_open() {
    
  document.getElementById("general").style.marginLeft = "25%";
  document.getElementById("mySidebar").style.width = "25%";
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("openNav").style.display = 'none';
}
function w3_close() {
    
  document.getElementById("general").style.marginLeft = "0%";
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("openNav").style.display = "inline-block";
}
</script>
</body>

</html>

