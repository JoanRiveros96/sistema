<?php
header ('Content-type: text/html; charset=utf-8');
    include("conexion.php");
    //SQL seleccionando todos los registros en la base de datos
    $banners = "SELECT * from  banners WHERE Activo = 1";
    //SQL para conocer el numero de registros almacenados
    $cantidad = "SELECT COUNT(*) from banners WHERE Activo = 1";

    //SQL para conocer los ultimos 3 registros modificados de las noticias en la base de datos
    $noticias ="SELECT * FROM `noticias` WHERE Activo = 1 ORDER by updated_at desc LIMIT 3";

      //SQL para conocer los ultimos 3 registros modificados de los comunicados  en la base de datos
      $comunicados ="SELECT * FROM `comunicados` WHERE Activo = 1 ORDER by updated_at desc LIMIT 3";

      $redes = "SELECT * FROM `socials` WHERE Activo = 1 ;";
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
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
  <script src ="../public/js/submenu.js"></script>
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
  
<section class="Menu">


<header class="header"> 
  <div class="logo" ><img class="img-fluid" alt="" src="../public/storage/web/escudo.png" >
 </div>
 <div class="redes"><ul>
 <?php $redes = mysqli_query($mysqli,$redes);

    while($rowRedes=mysqli_fetch_assoc($redes)){ 
      if( $rowRedes["TipoRed"] == "Facebook"){ ?> <a href=" <?php echo $rowRedes["Link"] ?>" target="_blank" class="fa fa-facebook"></a> <?php }
      if( $rowRedes["TipoRed"] == "Twitter"){ ?> <a href=" <?php echo $rowRedes["Link"] ?>" target="_blank" class="fa fa-twitter"></a> <?php }
      if( $rowRedes["TipoRed"] == "Instagram"){ ?> <a href=" <?php echo $rowRedes["Link"] ?>" target="_blank" class="fa fa-instagram"></a> <?php }
      if( $rowRedes["TipoRed"] == "Youtube"){ ?> <a href=" <?php echo $rowRedes["Link"] ?>" target="_blank" class="fa fa-youtube"></a> <?php }
    } 
  ?>
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

<section class="Menu">
<div id="myNavDes" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="overlay-content">
    <a href="index.php">INICIO</a>

    <div id="Submenu" class="overlay2" >
  <a href="javascript:void(0)" class="closebtn" onclick="closesubmenu()">&times;</a>
  <div class="overlay-content">
    
        <a href="trayectoria.php">Trayectoria institucional</a>
        <a href="mision.php">Colegio</a>
        <a href="dependencias.php">Dependencias</a>
        <a href="noticias.php">Noticias</a>
        <a href="comunicado.php">Comunicados</a>
        <a href="plataformas.php">Plataformas</a>
        <a href="rendicion.php">Rendicion de cuentas</a>
        <a href="programador.php">Programador</a>

    </div>
</div>
<a  style="cursor:pointer;color:white" onclick="opensubmenu()"> DIVINO AMORE </a>

<div id="Submenu2" class="overlay2" >
  <a href="javascript:void(0)" class="closebtn" onclick="closesubmenu2()">&times;</a>
  <div class="overlay-content">
    
  <a href="admisiones.php">Admisiones</a>
        <a href="matriculas.php">Matriculas</a>

    </div>
</div>
<a  style="cursor:pointer;color:white;" onclick="opensubmenu2()"> ADMISIONES & MATRICULAS </a>

    
    <a href="eventos.php">EVENTOS</a>
    <a href="exalumnos.php">EXALUMNOS</a>
  <a href="contacto.php">CONTACTANOS</a> 
  </div>
</div>


<span class="click" style="font-size:30px;cursor:pointer;color:white" onclick="openNav()">&#9776; Menú principal</span>


</section>

<section>
<div id="demo" class="carousel slide" data-ride="carousel" >
  <!-- Indicators -->
  <ul class="carousel-indicators">
    <!-- For para conocer cuantos archivos se encuentran almacenados en la base de datos -->
    <?php
    
    $num = mysqli_query($mysqli,$cantidad);
    
    $row=mysqli_fetch_array($num);
  
    for($i = 0; $i <= $row[0]; $i++){?>
      <li data-target="#demo" data-slide-to=$i></li>
    <?php } ?>
    
  </ul>

    <!-- slider de imagenes -->
  <div class="carousel-inner" >
  <div class="w3-container w3-teal">
  
</div>
  <div class="carousel-item active">
      <img src="../public/storage/uploads/WBVuvVTvAABKwWBmwRm3l3lACK4VJII46gXJglcE.jpg" alt="" width="1100" height="500">
    </div>
<!-- Ciclo while para pasar por  cada uno de los registros y mostrar las imagenes contenidas en ellos -->
<?php $resultado = mysqli_query($mysqli,$banners);  
  while($row=mysqli_fetch_assoc($resultado)){?>
   <div class="carousel-item">    
     <img src="../storage/app/public/<?php echo $row["Imagen"]?>" alt="" width="1100" height="500">
    </div>
  <?php }?>
    
  </div>
  
  <!-- controles de izquierda y derecha del banner -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
</div>
</section>
<section>
  <div  class="title" >N O V E D A D E S</div>
</section>
<!-- Seccion de noticias en incio -->
<section>
  
  <div class="w3-container">
    
    <?php $noticias = mysqli_query($mysqli,$noticias); 
  $i=0; 
  while($rowNot=mysqli_fetch_assoc($noticias)){
    if($i%2==0){?>
    <div class="rowinfo">
      <div class="info1"> <img class="img-fluid" src="../storage/app/public/<?php echo $rowNot["Imagen"]?>"  ></div>
    <div class="info2">
      <h2 class ="wrapper"><?php echo $rowNot["Titulo"]?></h2>
  <p class ="wrapper">
  <?php  
  $info= $rowNot["Contenido"];
    $separador= "\n";
    $des = explode($separador, $info);
    for ($n=0; $n <= count($des)-1 ; $n++) { 
      echo utf8_encode($des[$n]);
      ?>
      <br>
      <?php
    }?> 
  </p>
  <?php if($rowNot["Link"]!=null){?>
    <a href=<?php echo $rowNot["Link"]?> class="wrapper">Conoce más</a>

<?php
  }?>
  

</div>

  </div>
    
<?php $i=$i+1;
    }
    else{?>
    <div class="rowinfo">
      
    <div class="info2">
      <h2 class ="wrapper"><?php echo $rowNot["Titulo"]?></h2>
  <p class ="wrapper">  <?php  
  $info= $rowNot["Contenido"];
    $separador= "\n";
    $des = explode($separador, $info);
    for ($m=0; $m <= count($des)-1 ; $m++) { 
      echo utf8_encode($des[$m]);
      ?>
      <br>
      <?php
    }?>  </p>
  <?php if($rowNot["Link"]!=null){?>
    <a  href=<?php echo $rowNot["Link"]?> class="wrapper">Conoce más</a>

<?php
  }?>
  
  


</div>
  <div class="info1"   > <img class="img-fluid" src="../storage/app/public/<?php echo $rowNot["Imagen"]?>"  ></div>

  </div>
<?php $i=$i+1;
    }
    
   }?>
</div>
  
</section>

<section>
  <div  class="title" >C O M U N I C A D O S</div>
</section>

<!-- Seccion de comunicados en incio -->
<section>
  
  <div class="w3-container">
    
    <?php $comunicados = mysqli_query($mysqli,$comunicados); 
  $c=0; 
  while($rowNot=mysqli_fetch_assoc($comunicados)){
    if($c%2==0){?>
    <div class="rowinfo">
      
      <div  class="info1" > <img class="img-fluid" src="../storage/app/public/<?php echo $rowNot["Imagen"]?>" ></div>
    <div class="info2">
      <h2 class ="wrapper"><?php echo utf8_encode($rowNot["Titulo"])?></h2>
  <p class ="wrapper">
  <?php  
  $info= $rowNot["Contenido"];
    $separador= "\n";
    $des = explode($separador, $info);
    for ($n=0; $n <= count($des)-1 ; $n++) { 
      echo utf8_encode($des[$n]);
      ?>
      <br>
      <?php
    }?> 
  </p>
  
  

</div>

  </div>
    
<?php $c=$c+1;
    }
    else{?>
    <div class="rowinfo">
      
    <div class="info2" >
      <h2 class ="wrapper"><?php echo utf8_encode($rowNot["Titulo"])?></h2>
  <p class ="wrapper">
  <?php  
  $info= $rowNot["Contenido"];
    $separador= "\n";
    $des = explode($separador, $info);
    for ($m=0; $m <= count($des)-1 ; $m++) { 
      echo utf8_encode($des[$m]);
      ?>
      <br>
      <?php
    }?> 
  </p>
  
  

</div>
    
  <div class="info1"  > <img class="img-fluid" src="../storage/app/public/<?php echo $rowNot["Imagen"]?>" ></div>

  </div>
<?php $c=$c+1;
    }
    
   }?>
</div>


  
</section>

<iframe  src="footer.php" Style="width:100%; height:600px"></iframe>

 
</body>
</html>