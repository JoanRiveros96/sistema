<?php 
   $aErrores = array();
   $aMensajes = array();

   $patron_texto = "/^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙ\s]+$/";

   if( !empty($_POST) )
   {
       echo "FORMULARIO RECIBIDO:<br/>";
       echo "====================<p/>";
       // Mostrar la información recibida del formulario:
       print_r( $_POST );
       echo "<hr/>";
       // Comprobar si llegaron los campos requeridos:
        if( isset($_POST['Nombre']) && isset($_POST['Afinidad']) && isset($_POST['Descripcion']))
       {
           // Nombre:
            if( empty($_POST['Nombre']) )
               $aErrores[] = "Debe especificar el nombre";
           else
           {
               // Comprobar mediante una expresión regular, que sólo contiene letras y espacios:
                if( preg_match($patron_texto, $_POST['Nombre']) )
                   $aMensajes[] = "Nombre: [".$_POST['Nombre']."]";
               else
                   $aErrores[] = "El nombre sólo puede contener letras y espacios";
           }
           // Afinidad:
           if( empty($_POST['Afinidad']) )
               $aErrores[] = "Debe especificar la afinidad";
           else
           {
               
               if( preg_match($patron_texto, $_POST['Afinidad']) )
                   $aMensajes[] = "Afinidad: [".$_POST['Afinidad']."]";
               else
                   $aErrores[] = "La afinidad sólo puede contener letras y espacios";
           }
           // Experiencia:
           if( empty($_POST['Descripcion']) )
               $aErrores[] = "Debe especificar su experiencia";
           else
           {
              
               if( preg_match($patron_texto, $_POST['Descripcion']) )
                   $aMensajes[] = "Descripcion: [".$_POST['Descripcion']."]";
               else
                   $aErrores[] = "La experiencia sólo puede contener letras y espacios";
           }
           
           
       }
       else
       {
           echo "<p>No se han especificado todos los datos requeridos.</p>";
       }
        if( count($aErrores) > 0 )
       {
           echo "<p>ERRORES ENCONTRADOS:</p>";
           
           for( $contador=0; $contador < count($aErrores); $contador++ )
               echo $aErrores[$contador]."<br/>";
       }
       else
       {
          
           for( $contador=0; $contador < count($aMensajes); $contador++ )
               echo $aMensajes[$contador]."<br/>";
       }
   }
   else
   {
       echo "<p>No se ha enviado el formulario.</p>";
   }
   echo "<p><a href='enviar.php'>Haz clic aquí para volver al formulario</a></p>";
?>
