<?php 
    include("conexion.php");
    
    //SQL para conocer los ultimos 3 registros modificados de las noticias en la base de datos
    $numevento ="SELECT COUNT(*) as 'total' FROM `eventos`";
    $numevento = mysqli_query($mysqli,$numevento); 
    $row=$numevento->fetch_assoc();
    $num_total_rows=$row['total'];
    $redes = "SELECT * FROM `socials` WHERE Activo = 1 ;";
    

    

    define('NUM_ITEMS',10);

  
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


<section>


<header class="header"> 


  <div class="logo" ><img alt="" src="../public/storage/web/escudo.png">
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


<section>
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
<a  style="cursor:pointer;color:white" onclick="opensubmenu2()"> ADMISIONES & MATRICULAS </a>

    
    <a href="eventos.php">EVENTOS</a>
    <a href="exalumnos.php">EXALUMNOS</a>
  <a href="contacto.php">CONTACTANOS</a> 
  </div>
</div>


<span class="click" style="font-size:30px;cursor:pointer;color:white" onclick="openNav()">&#9776; Menú principal</span>


</section>

<section>
<div >
      <img class="img-fluid" src="../public/storage/uploads/WBVuvVTvAABKwWBmwRm3l3lACK4VJII46gXJglcE.jpg" alt="" width="2000" height="1500">
    </div>
</section>

<section>
  <div class="title">EVENTOS</div>
  </section>

  <!-- Section para la paginacion de eventos -->
  <section>
  <?php
    $resultados_por_pagina=10;
    
    
    $evento ="SELECT * FROM eventos WHERE Activo = 1";
    $evento = mysqli_query($mysqli,$evento); 
    $numbero_registros= mysqli_num_rows($evento);
    ?>
    <br>
    <?php
    // while($row= mysqli_fetch_array($evento)){
    //   echo $row['id'].' '. $row['Titulo'] . '<br>';
    // }

    //determinar numero de paginas habilitadas
    $numero_paginas = ceil($numbero_registros/$resultados_por_pagina);
    ?>
    <br>
    <?php

    //determinar en que pagina se encuentra el visitante
    if(!isset($_GET['page'])){
      $page=1;
    }else{
      $page = $_GET['page'];
    }

    $this_page_first_result = ($page-1)*$resultados_por_pagina;

    


    $sql = "SELECT * FROM eventos WHERE Activo = 1 LIMIT $this_page_first_result,$resultados_por_pagina";
    $result = mysqli_query($mysqli, $sql);
?>

<table class="eventos" >
    <tr>
      <th>Fecha</th>
      <th>Titulo</th>
      <th>Descripcion</th>
      <th>Imagen</th>
      <th>Link</th>
    </tr>


<?php


    while($row= mysqli_fetch_array($result)){
      ?>

      <tr>
        <td style="vertical-align:top;width:6%"> <?php echo $row['Fecha'] ?></td>
        <td style="vertical-align:top;width:6%"> <?php echo utf8_encode($row['Titulo']) ?></td>
        <td style="width:50%"> <?php
                    $info= $row["Descripcion"];
                    $separador= "\n";
                    $des = explode($separador, $info);
                    for ($i=0; $i <= count($des)-1 ; $i++) { 
                    echo utf8_encode($des[$i]);?>
                    <br>
                    <?php } ?></td>
        <td style="width:30%; text-align:center"> <img class="img-fluid" src="../storage/app/public/<?php echo $row["Imagen"]?>" style="width:275px;height:222px;">
           </td>
           <td>
           <?php if($row["Link"]!=null){?>
    <a  href="<?php echo $row["Link"]?>" target="_blank" rel="noopener noreferrer" style="border-radius:50px;background-color:  #41a0d6;padding:15px;">VISITAR</a>

<?php
  }?>
      </td>
      </tr>

      <?php
      // echo $row['Fecha'].' '. $row['Titulo'] .' '. $row['Descripcion'] . ' '. $row['Link'] . '<br>';
    }
    ?>
    </table>
    <?php

    //visualizar los links de las paginas

    ?>
    <div class="pagination">

    <?php
    for($page=1; $page<=$numero_paginas;$page++){

      ?>
      <a href="eventos.php?page= <?php echo $page ?> "> <?php echo $page ?></a>
      

      <?php
      
       
    }?>
    </div>

    <?php


?>
<div style="padding:10px"></div>
</section>

<iframe src="footer.php" Style="width:100%; height:600px"></iframe>

</body>


</html>
