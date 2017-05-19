<?php 
$nombrecontacto = $_POST['nombrecontacto'];
$email = $_POST['email'];
$mensaje = $_POST['mensaje'];
$contenidoform="De: $nombrecontacto \n Mensaje: $mensaje";
$recipient = "piergotta@gmail.com";
$subject = "Formulario de contacto";
$mailheader = "De: $email \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
echo "Thank You!";
?>