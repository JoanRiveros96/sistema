<?php
$mysqli = new mysqli("coldivinoamor.com.co", "coldivin", "7)p-z6J4V6hGeG", "coldivin_sistema");
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$direccion ="SELECT * FROM `footers` WHERE Activo = 1 AND TipoFoot = 'Dirección'";
$escudo ="SELECT * FROM `footers` WHERE Activo = 1 AND TipoFoot = 'Escudo'";
$lema ="SELECT * FROM `footers` WHERE Activo = 1 AND TipoFoot = 'Lema'";
$email ="SELECT * FROM `footers` WHERE Activo = 1 AND TipoFoot = 'Email'";
$telefono ="SELECT * FROM `footers` WHERE Activo = 1 AND TipoFoot = 'Teléfono'";
?>



<!DOCTYPE html>

<html >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>COINSDA USER</title>
   
    <link rel="stylesheet" href="../../public/css/estilos.css" />
    <link rel="stylesheet" href="../../public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-highway.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://code.jquery.com/jquery-latest.js"></script>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  

  


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



<footer class="w3-padding-64 w3-light-grey w3-small w3-center" id="footer">
    <div class="w3-row-padding">

      <div class="w3-col s4 w3-justify w3-left"   style="margin-left:30%">
        <h3>COINSDA</h3>
        <?php $direccion = mysqli_query($mysqli,$direccion); 

        
  $rowDir = mysqli_fetch_array($direccion);
  ?>
        <p><i class="fa fa-fw fa-map-marker"></i> <?php echo $rowDir["Contenido"] ?></p>
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