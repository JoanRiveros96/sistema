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
<a  style="cursor:pointer;color:#818181" onclick="opensubmenu()"> DIVINO AMORE </a>

<div id="Submenu2" class="overlay2" >
  <a href="javascript:void(0)" class="closebtn" onclick="closesubmenu2()">&times;</a>
  <div class="overlay-content">
    
  <a href="admisiones.php">Admisiones</a>
        <a href="matriculas.php">Matriculas</a>

    </div>
</div>
<a  style="cursor:pointer;color:#818181" onclick="opensubmenu2()"> ADMISIONES & MATRICULAS </a>

    
    <a href="eventos.php">EVENTOS</a>
    <a href="exalumnos.php">EXALUMNOS</a>
  <a href="contacto.php">CONTACTANOS</a> 
  </div>
</div>


<span class="click" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Menú principal</span>


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
    <div class="rowinfo">
      <div class="info1" > <img class="img-fluid" src="../storage/app/public/<?php echo $rowNot["Foto"]?>"  ></div>
    <div class="info2">
      <h2 class ="wrapper dep"><?php echo utf8_encode($rowNot["Nombre"])?></h2>
      <h5 class="wrapper">AÑO DE GRADUACION</h5>
      <div style="padding:2px"></div>
  <p class ="wrapper">
  <?php echo utf8_encode($rowNot["AñoGrado"])?>
  </p><div style="padding:2px"></div>
  <h5 class="wrapper">AFINIDAD</h5>
  <div style="padding:2px"></div>
  <p class ="wrapper">
  <?php
                    $info= $rowNot["Afinidad"];
                    $separador= "\n";
                    $des = explode($separador, $info);
                    for ($n=0; $n <= count($des)-1 ; $n++) { 
                    echo utf8_encode($des[$n]);?>
                    <br>
                    <?php } ?>
  </p><div style="padding:2px"></div>
  <h5 class="wrapper">EXPERIENCIA</h5>
  <div style="padding:2px"></div>
  <p class ="wrapper">
  <?php
                    $info= $rowNot["Descripcion"];
                    $separador= "\n";
                    $des = explode($separador, $info);
                    for ($m=0; $m <= count($des)-1 ; $m++) { 
                    echo utf8_encode($des[$m]);?>
                    <br>
                    <?php } ?>
  </p><div style="padding:2px"></div>
  
  

</div>

  </div>
    
<?php $i=$i+1;
    }
    else{?>
    <div class="rowinfo">
      
    <div class="info2">
      <h2 class ="wrapper dep"><?php echo utf8_encode($rowNot["Nombre"])?></h2>
      <p class ="wrapper"> 
      <h5 class="wrapper">AÑO DE GRADUACION</h5>
      <div style="padding:2px"></div>
  <p class ="wrapper">
  <?php echo utf8_encode($rowNot["AñoGrado"])?>
  </p><div style="padding:2px"></div>
  <h5 class="wrapper">AFINIDAD</h5>
  <div style="padding:2px"></div>
  <p class ="wrapper">
  <?php
                    $info= $rowNot["Afinidad"];
                    $separador= "\n";
                    $des = explode($separador, $info);
                    for ($l=0; $l <= count($des)-1 ; $l++) { 
                    echo utf8_encode($des[$l]);?>
                    <br>
                    <?php } ?>
  </p><div style="padding:2px"></div>
  <h5 class="wrapper">EXPERIENCIA</h5>
  <div style="padding:2px"></div>
  <p class ="wrapper">
  <?php
                    $info= $rowNot["Descripcion"];
                    $separador= "\n";
                    $des = explode($separador, $info);
                    for ($k=0; $k <= count($des)-1 ; $k++) { 
                    echo utf8_encode($des[$k]);?>
                    <br>
                    <?php } ?>
  </p><div style="padding:2px"></div>
</div>
  <div class="info1" > <img class="img-fluid" src="../storage/app/public/<?php echo $rowNot["Foto"]?>"  ></div>

  </div>
<?php $i=$i+1;
    }
    
   }?>
</div>
  
</section>

<section class=""style="background:rgb(0, 142, 204);text-align:center;" >
<h2 style="color:black;">¿Hiciste parte de nosotros?, Cuentanos tu experiencia</h2>
<div style="text-align:center;">


    <form class="formex" action="enviar.php" id="formulario" method="post" enctype="multipart/form-data">
  <label for="AñoGrado">¿en qué año te graduaste?</label><br>
  <select Name="AñoGrado" id="AñoGrado">
  <?php 
  
    $date= date("Y");
    for ($i=$date-1 ; $i >= 1980 ; $i--) {?>
    <option value="<?php echo $i ?>"><?php echo $i?></option>
      
   <?php
    }
    ?>
</select ><br>
  
  <label for="Nombre">¿Cúal es tu nombre?</label><br>
  <input type="text" id="Nombre" name="Nombre"><br><br>
  <label for="Afinidad">¿Cúal es tu afinidad?</label><br>
  <input type="text" id="Afinidad" name="Afinidad" ><br><br>
  <label for="Descripcion">Cuentanos sobre ti y tu experiencia</label><br>
  <input type="text" id="Descripcion" name="Descripcion"><br><br>
  <label for="Foto">¿Deseas subir alguna foto?</label><br>
  <input type="file" id="Foto" name="Foto"  onchange="ValidarTamaño(this);"><br><br>
  <!-- Image preview -->
<div id="imagePreview" style="width:150px; height:183px"></div><br><br>
  <button type="submit" onclick=" return confirm('¿Deseas enviarnos tu información?')">Enviar</button>
</form>

<script>



  var patron = /^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙñ\s/,/]+$/;
  // var experiencia = /^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙñ\s/,//./]+$/;
  document.addEventListener("DOMContentLoaded", function() {
  document.getElementById("formulario").addEventListener('submit', validarFormulario); 
});

function validarFormulario(evento) {
  evento.preventDefault();
  var nombre = document.getElementById('Nombre').value;
  if(nombre.length == 0) {
    alert('El campo nombre no puede estar vacio');
    return;
  }
  if(!patron.test(nombre)){
    alert("Solo puede ingresas letras y espacios en el campo nombre");
    return;
  }
  

  var afinidad = document.getElementById('Afinidad').value;
  if (afinidad.length == 0) {
    alert('el campo afinidad no puede ser vacio');
    return;
  }
  if(!patron.test(afinidad)){
    alert("Solo puede ingresas letras y espacios en el campo afinidad");
    return;
  }

  var descripcion = document.getElementById('Descripcion').value;
  if (descripcion.length == 0) {
    alert('el campo experiencia no puede ser vacio');
    return;
  }
  
  


  this.submit();
}


</script>
<script>

function ValidarTamaño(obj)
{
  var fileInput = document.getElementById('Foto');
  var uploadFile = obj.files[0];
  var img = new Image();
  img.onload = function () 
  {
    var allowedExtensions = /(.jpg)$/i;
     if(!allowedExtensions.exec(fileInput.value)){
         alert('Por favor solo cargue imagenes jpg ');
         $('#Foto').val("");
         document.getElementById('imagePreview').innerHTML = '<img class="img-fluid" src=""/>';
         
     }else{
     var h = this.width.toFixed(0);
     var w = this.height.toFixed(0);
    if (this.width.toFixed(0) > 150 && this.height.toFixed(0) > 183) 
    {
      
      alert("El tamaño de tu imagen es " + w +"px por "+h+"px");
      alert("La imagen debe ser de tamaño maximo 150px por 183px.");
      $('#Foto').val("");
      document.getElementById('imagePreview').innerHTML = '<img class="img-fluid" src=""/>';
      
    }else{document.getElementById('imagePreview').innerHTML = '<img class="img-fluid" src="'+img.src+'"/>';}
  }
   
  };
   img.src = URL.createObjectURL(uploadFile); 
  

}

 </script>



</div>
</div>

</section>

<iframe src="footer.php" Style="width:100%; height:600px"></iframe>

</body>


</html>
