<?php 
    include("conexion.php");
    $programa ="SELECT * FROM `programadors` WHERE Activo = 1 AND Imagen ='programa/03.jpg';";
?>

<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>COINSDA USER</title>
    <link rel="icon" href="../public/storage/web/escudo.png" type="image/x-icon" />
    <link rel="stylesheet" href="../public/css/estilos.css" />
    <link rel="stylesheet" href="../public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-highway.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://code.jquery.com/jquery-latest.js"></script>
  <script src ="../public/js/header.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="../public/js/app.js" defer></script>

  


  <style>
  /* Make the image fully responsive */
  .carousel-inner img {
    width: 100%;
    height: 100%;
  }
  a{
    color:white;
  }
  
 
  </style>
</head>
<body>


<section>


<header class="header"> 


  <div class="logo" ><img alt="" src="../public/storage/web/escudo.png">
 </div>
 <div class="redes"><ul>
 <a href="https://www.facebook.com/coinsda?_rdc=2&_rdr" class="fa fa-facebook"></a>
 <a href="https://twitter.com/coinsda" class="fa fa-twitter"></a>
 <a href="https://www.instagram.com/coinsda/" class="fa fa-instagram"></a>
 <a href="https://www.instagram.com/coinsda/" class="fa fa-youtube"></a>
</ul></div>
 
<div class="navbar">

  <a href="index.php">INICIO</a>
  <div class="subnav">
  
    <button class="subnavbtn">DIVINO AMORE <i class="fa fa-caret-down"></i></button>
    <div class="subnav-content">
    <ul>
        <li><a href="trayectoria.php">Trayectoria institucional</a></li>
        <li><a href="mision.php">Colegio</a></li>
        <li><a href="dependencias.php">Dependencias</a></li>
        <li><a href="noticias.php">Noticias</a></li>
        <li><a href="comunicado.php">Comunicados</a></li>
        <li><a href="plataformas.php">Plataformas</a></li>
        <li><a href="rendicion.php">Rendicion de cuentas</a></li>
        <li><a href="programador.php">Programador</a></li>
      </ul>
      <!-- <a href="#company">Comunidad (HISTORIA)</a>
      <a href="#team">Colegio</a> -->
      
    </div>
  </div> 
  <a href="eventos.php">EVENTOS</a>
  <div class="subnav">
    <button class="subnavbtn">ADMISIONES & MATRICULAS <i class="fa fa-caret-down"></i></button>
    <div class="subnav-content">
      <ul>
        <li><a href="admisiones.php">Admisiones</a></li>
        <li><a href="matriculas.php">Matriculas</a></li>
      </ul>
      </div> 
    
  </div> 
  
  <a href="exalumnos.php">EXALUMNOS</a>
  <a href="contacto.php">CONTACTANOS</a> 
</div>


</header>

</section>

<section>
<div >
      <img class="img-fluid" src="../public/storage/uploads/WBVuvVTvAABKwWBmwRm3l3lACK4VJII46gXJglcE.jpg" alt="" width="2000" height="1500">
    </div>
</section>

<nav class="navbar navbar-expand-sm bg-light justify-content-center navcol"style="display: grid; place-content:center;">
  <ul class="navbar-nav navcol"   >
    <li class="nav-item itemcol" ">
      <a class="nav-link linkcol" href="programador.php">FEBRERO</a>
    </li>
    <li class="nav-item itemcol">
      <a class="nav-link linkcol" href="marzo.php">MARZO</a>
    </li>
    <li class="nav-item itemcol">
      <a class="nav-link linkcol" href="abril.php">ABRIL</a>
    </li>
    <li class="nav-item itemcol">
      <a class="nav-link linkcol" href="mayo.php">MAYO</a>
    </li>
    <li class="nav-item itemcol">
      <a class="nav-link linkcol" href="junio.php">JUNIO</a>
    </li>
    <li class="nav-item itemcol">
      <a class="nav-link linkcol" href="julio.php">JULIO</a>
    </li>
    <li class="nav-item itemcol">
      <a class="nav-link linkcol" href="agosto.php">AGOSTO</a>
    </li>
    <li class="nav-item itemcol">
      <a class="nav-link linkcol" href="septiembre.php">SEPTIEMBRE</a>
    </li>
    <li class="nav-item itemcol">
      <a class="nav-link linkcol" href="octubre.php">OCTUBRE</a>
    </li>
    <li class="nav-item itemcol">
      <a class="nav-link linkcol" href="noviembre.php">NOVIEMBRE</a>
    </li>

  </ul>
</nav>

<section>
<?php $programa = mysqli_query($mysqli,$programa); 

  while($rowNot=mysqli_fetch_assoc($programa)){?>


  <div class="title">MARZO</div>
  <div style="padding-left:70px;padding-right:70px;background:#00477e;">
  <div style="height:100%; width:100%;background:#00477e;">
  </div></div>
  <div class="imgCol"> <img class="img-fluid imgCol" src="../storage/app/public/<?php echo $rowNot["Imagen"]?>" style="  width:1700px; height:950px; "></div>
  <?php 
  }?>
  </section>

  <iframe src="footer.php" Style="width:100%; height:900px"></iframe>

</body>


</html>