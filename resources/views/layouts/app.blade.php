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
      <a href="{{ route('empleado.index') }}" class="w3-bar-item w3-button ">Empleados</a>
      <a href="{{ route('banner.index') }}" class="w3-bar-item w3-button ">Banners</a>
      <a href="{{ route('noticia.index') }}" class="w3-bar-item w3-button">Noticias</a>
      <a href="{{ route('comunicado.index') }}" class="w3-bar-item w3-button">Comunicados</a>
      <a href="{{ route('social.index') }}" class="w3-bar-item w3-button">Redes Sociales</a>
      <a href="{{ route('footer.index') }}" class="w3-bar-item w3-button">Footer</a>
      <a href="{{ route('historia.index') }}" class="w3-bar-item w3-button">Trayectoria</a>
      <a href="{{ route('colegio.index') }}" class="w3-bar-item w3-button">Informacion Colegio</a>
      <a href="{{ route('plataforma.index') }}" class="w3-bar-item w3-button">Plataformas</a>
      <a href="{{ route('cuenta.index') }}" class="w3-bar-item w3-button">Rendicion de Cuentas</a>
      <a href="{{ route('egresado.index') }}" class="w3-bar-item w3-button">Egresados</a>
      <a href="{{ route('evento.index') }}" class="w3-bar-item w3-button">Eventos</a>
      <a href="{{ route('admision.index') }}" class="w3-bar-item w3-button">Admisiones</a>
      <a href="{{ route('matricula.index') }}" class="w3-bar-item w3-button">Matriculas</a>
      <a href="{{ route('programador.index') }}" class="w3-bar-item w3-button">programador</a>
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
        
        <footer class="w3-padding-64 w3-light-grey w3-small w3-center" id="footer">
    <div class="w3-row-padding">

      <div class="w3-col s4 w3-justify w3-left"   style="margin-left:30%">
        <h3>COINSDA</h3>
        <p><i class="fa fa-fw fa-map-marker"></i> Colegio Integrado Nuestra Señora del Divino Amor</p>
        <p><i class="fa fa-fw fa-phone"></i> Tel 644 9178 </p>
        <p><i class="fa fa-fw fa-envelope"></i> email: divinoamore@hotmail.com</p>
        <p><i class="fa fa-fw fa-map-marker"></i>Ubicación</p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7693.068112303386!2d-73.13495684229709!3d7.097460624438503!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb4f1d77e53b5aba!2sColegio+Integrado+Nuestra+Se%C3%B1ora+del+Divino+Amor!5e0!3m2!1ses!2sco!4v1537757348958" width="800" height="350" frameborder="0" style="border:0" allowfullscreen></iframe><br><br>
        <h4><i class="fa fa-fw fa-user" style="margin-left:10%"></i>Desarrollado por: Joan Sebastian Riveros Lozada</h4>
      </div>
    </div>
  </footer>
        
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

