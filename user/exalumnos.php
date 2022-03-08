<?php 
    include("conexion.php");
    
    //SQL para conocer los ultimos 3 registros modificados de las noticias en la base de datos
    $exalumno ="SELECT * FROM `egresados` ORDER by updated_at desc";
    




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

  <script src="http://code.jquery.com/jquery-latest.js"></script>
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

  <a href="http://localhost/sistema/user/">INICIO</a>
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
      </ul>
      <!-- <a href="#company">Comunidad (HISTORIA)</a>
      <a href="#team">Colegio</a> -->
      
    </div>
  </div> 
  <a href="#contact">EVENTOS</a>
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

<section>
  <div class="title">EGRESADOS</div>
  </section>
<section>
  
  <div class="w3-container">
    
    <?php $exalumno = mysqli_query($mysqli,$exalumno); 
  $i=0; 
  while($rowNot=mysqli_fetch_assoc($exalumno)){
    if($i%2==0){?>
    <div class="w3-row w3-margin">
      <div class="w3-third" style="height:300px; width:300px"> <img class="img-fluid" src="../public/storage/<?php echo $rowNot["Foto"]?>"  ></div>
    <div class="w3-twothird w3-container w3-light-gray" style="height:300px; width:83%">
      <h2 class ="wrapper dep"><?php echo $rowNot["Nombre"]?></h2>
      <h5 class="wrapper">AÑO DE GRADUACION</h5>
      <div style="padding:2px"></div>
  <p class ="wrapper">
  <?php echo $rowNot["AñoGrado"]?>
  </p><div style="padding:2px"></div>
  <h5 class="wrapper">AFINIDAD</h5>
  <div style="padding:2px"></div>
  <p class ="wrapper">
  <?php echo $rowNot["Afinidad"]?>
  </p><div style="padding:2px"></div>
  <h5 class="wrapper">EXPERIENCIA</h5>
  <div style="padding:2px"></div>
  <p class ="wrapper">
  <?php echo $rowNot["Descripcion"]?>
  </p><div style="padding:2px"></div>
  
  

</div>

  </div>
    
<?php $i=$i+1;
    }
    else{?>
    <div class="w3-row w3-margin">
      
    <div class="w3-twothird w3-container w3-light-gray" style="height:300px; width:83%">
      <h2 class ="wrapper dep"><?php echo $rowNot["Nombre"]?></h2>
      <p class ="wrapper"> 
      <h5 class="wrapper">AÑO DE GRADUACION</h5>
      <div style="padding:2px"></div>
  <p class ="wrapper">
  <?php echo $rowNot["AñoGrado"]?>
  </p><div style="padding:2px"></div>
  <h5 class="wrapper">AFINIDAD</h5>
  <div style="padding:2px"></div>
  <p class ="wrapper">
  <?php echo $rowNot["Afinidad"]?>
  </p><div style="padding:2px"></div>
  <h5 class="wrapper">EXPERIENCIA</h5>
  <div style="padding:2px"></div>
  <p class ="wrapper">
  <?php echo $rowNot["Descripcion"]?>
  </p><div style="padding:2px"></div>
</div>
  <div class="w3-third"  style="height:300px; width:300px" > <img class="img-fluid" src="../public/storage/<?php echo $rowNot["Foto"]?>"  ></div>

  </div>
<?php $i=$i+1;
    }
    
   }?>
</div>
  
</section>

<section class=""style="background:rgb(100, 200, 255);text-align:center;" >
<h2 style="color:black;">¿Hiciste parte de nosotros?, Cuentanos tu experiencia</h2>
<div style="text-align:center;">

<form class="formex" action="/action_page.php">
  <label for="fname">¿en qué año te graduaste?</label><br>
  <input type="text" id="fname" name="fname"><br>
  <label for="lname">¿Cúal es tu nombre?</label><br>
  <input type="text" id="lname" name="lname"><br><br>
  <label for="lname">¿Cúal es tu afinidad?</label><br>
  <input type="text" id="lname" name="lname"><br><br>
  <label for="lname">Cuentanos sobre ti y tu experiencia</label><br>
  <input type="text" id="lname" name="lname"><br><br>
  <label for="lname">¿Deseas subir alguna foto?</label><br>
  <input type="file" id="lname" name="lname"><br><br>
  <button type="submit">Enviar</button>
</form>
</div>

</section>

  <footer  id="footer">
    <div class="w3-row-padding">

      <div class="w3-col s4 w3-justify w3-left"   style="margin-left:30%">
        <h3 class="w3-cursive " style="color:white">COINSDA</h3>
        <p><i class="fa fa-fw fa-map-marker" ></i> Colegio Integrado Nuestra Señora del Divino Amor</p>
        <p><i class="fa fa-fw fa-phone"></i> Tel 644 9178 </p>
        <p><i class="fa fa-fw fa-envelope"></i> email: divinoamore@hotmail.com</p>
        <p><i class="fa fa-fw fa-map-marker"></i>Ubicación</p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7693.068112303386!2d-73.13495684229709!3d7.097460624438503!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb4f1d77e53b5aba!2sColegio+Integrado+Nuestra+Se%C3%B1ora+del+Divino+Amor!5e0!3m2!1ses!2sco!4v1537757348958" width="800" height="350" frameborder="0" style="border:0" allowfullscreen></iframe><br><br>
        <h4><i class="fa fa-fw fa-user" style="margin-left:10%"></i>Desarrollado por: Joan Sebastian Riveros Lozada</h4>
      </div>
    </div>
  </footer>


</body>


</html>
