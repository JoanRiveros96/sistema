<?php
include("src/PHPMailer.php");
include("src/SMTP.php");
include("src/Exception.php");


try{

    $AñoGrado=$_POST["AñoGrado"];
    $Nombre=$_POST["Nombre"];
    $Afinidad=$_POST["Afinidad"];
    $Descripcion=$_POST["Descripcion"];
    // $Foto=$_POST["Foto"];
    $archivo= $_FILES["Foto"];


    $desde="joanriveros96@gmail.com";
    $desdename="joan Sebastian Riveros Lozada";
    $host="smtp.gmail.com";
    $port="465";
    $SMTPAuth ="login";
    $_SMTPSecure="ssl";
    $password="SeRi2020@";

    $message = '
<h3 align="center">Detalles del informe</h3>
<table border="1" width="100%" cellpadding="5" cellspacing="5">
<tr>
<td width="30%">AñoGrado</td>
<td width="70%">'.$AñoGrado.'</td>
</tr>
<tr>
<td width="30%">Nombre</td>
<td width="70%">'.$Nombre.'</td>
</tr>
<tr>
<td width="30%">Afinidad</td>
<td width="70%">'.$Afinidad.'</td>
</tr>
<tr>
<td width="30%">Descripcion</td>
<td width="70%">'.$Descripcion.'</td>
</tr>
</table>
';



$mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail ->isSMTP();

    
    $mail->SMTPDebug=0;
    $mail->Host= $host;
    $mail->Port = $port;
    $mail->SMTPAuth=$SMTPAuth;
    $mail->SMTPSecure=$_SMTPSecure;
    
    $mail->Username= $desde;
    $mail->Password=$password;
    $mail->setFrom($desde,$desdename);
    $mail->addAddress("joanriveros96@gmail.com");
    $mail->Subject="Envio Exalumno";
    $mail->isHTML(true);
    $mail->Body = $message;
    $mail->AddAttachment($archivo['tmp_name'],$archivo['name']);


    if(!$mail->send()){
        error_log("No se envio el correo");die();

    }
    // echo "Correo enviado con exito!!";
    header("Location:exalumnos.php"); die();

}catch(Exception $e){}

?>