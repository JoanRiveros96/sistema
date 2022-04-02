<?php 
    include("conexion.php");
    
    //SQL para conocer los ultimos 3 registros modificados de las noticias en la base de datos
    $exalumno ="SELECT * FROM `egresados` WHERE Activo = 1 ORDER by updated_at desc";
  
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

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>


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
      <div class="w3-third" style="height:300px; width:300px"> <img class="img-fluid" src="../storage/app/public/<?php echo $rowNot["Foto"]?>"  ></div>
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
  <div class="w3-third"  style="height:300px; width:300px" > <img class="img-fluid" src="../storage/app/public/<?php echo $rowNot["Foto"]?>"  ></div>

  </div>
<?php $i=$i+1;
    }
    
   }?>
</div>
  
</section>

<section class=""style="background:rgb(0, 142, 204);text-align:center;" >
<h2 style="color:black;">¿Hiciste parte de nosotros?, Cuentanos tu experiencia</h2>
<div style="text-align:center;">


    <form class="formex" action="enviar.php" method="post" enctype="multipart/form-data">
  <label for="AñoGrado">¿en qué año te graduaste?</label><br>
  <input type="text" id="AñoGrado" name="AñoGrado"><br>
  <label for="Nombre">¿Cúal es tu nombre?</label><br>
  <input type="text" id="Nombre" name="Nombre"><br><br>
  <label for="Afinidad">¿Cúal es tu afinidad?</label><br>
  <input type="text" id="Afinidad" name="Afinidad"><br><br>
  <label for="Descripcion">Cuentanos sobre ti y tu experiencia</label><br>
  <input type="text" id="Descripcion" name="Descripcion"><br><br>
  <label for="Foto">¿Deseas subir alguna foto?</label><br>
  <input type="file" id="Foto" name="Foto"><br><br>
  <button type="submit">Enviar</button>
</form>

</div>
</div>

</section>

<iframe src="footer.php" Style="width:100%; height:900px"></iframe>

</body>


</html>
