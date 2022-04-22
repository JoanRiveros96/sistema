<?php
include("src/PHPMailer.php");
include("src/SMTP.php");
include("src/Exception.php");


try{

    
    $Nombre=$_POST["Nombre"];
    $Asunto=$_POST["Asunto"];
    $Email=$_POST["Email"];
    $Mensaje=$_POST["Mensaje"];
    $archivo= $_FILES["Foto"];


    $desde="coldivinamore@gmail.com";
    $desdename="coldivin divinoamore";
    $host="smtp.gmail.com";
    $port="465";
    $SMTPAuth ="login";
    $_SMTPSecure="ssl";
    $password="Semestre22022";

    $message = '
<h3 align="center">Detalles del informe</h3>
<table border="1" width="100%" cellpadding="5" cellspacing="5">

<tr>
<td width="30%">Nombre</td>
<td width="70%">'.$Nombre.'</td>
</tr>
<tr>
<td width="30%">Asunto</td>
<td width="70%">'.$Asunto.'</td>
</tr>
<tr>
<td width="30%">Email de contacto</td>
<td width="70%">'.$Email.'</td>
</tr>
<tr>
<td width="30%">Solicitud</td>
<td width="70%">'.$Mensaje.'</td>
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
    $mail->addAddress("coldivinamore@gmail.com");
    $mail->Subject="Solicitud Nueva";
    $mail->isHTML(true);
    $mail->Body = $message;
    $mail->AddAttachment($archivo['tmp_name'],$archivo['name']);


    if(!$mail->send()){
        error_log("No se envio el correo");die();

    }
    // echo "Correo enviado con exito!!";
    header("Location:contacto.php"); die();

}catch(Exception $e){}

?>