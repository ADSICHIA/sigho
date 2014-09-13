<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin t�tulo</title>
</head>

<body background="vista/imagenes/fondotrabajo1.jpg">


<?php

if(isset($_POST['email'])) {

// Debes editar las próximas dos líneas de código de acuerdo con tus preferencias
$email_to = "destinatario@sudominio.com";
$email_subject = "Contacto desde el sitio web";

// Aquí se deberían validar los datos ingresados por el usuario
if(!isset($_POST['email']) ||
!isset($_POST['documento'])) {

echo "<b>Ocurrió un error y el formulario no ha sido enviado. </b><br />";
echo "Por favor, vuelva atrás y verifique la información ingresada<br />";
die();
}

$email_message = "Detalles del formulario de contacto:\n\n";
$email_message .= "Email: " . $_POST['email'] . "\n";
$email_message .= "documento: " . $_POST['documento'] . "\n";


// Ahora se envía el e-mail usando la función mail() de PHP
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);

echo "¡El formulario se ha enviado con éxito!";
}


?>
<form method="post" action="">
<br><br>
<table align="center">
<tr>
<td><label> Email</label></td>
<td><input type="email" name="email" id=""  /></td>
</tr>
<tr>
<td><label>Numero de documento</label></td>
<td><input type="text" name="documento" id=""  /></td>
</tr>
<tr>
<td><input type="submit" name="enviar" value="enviar"  /></td>
</tr>

</table>
</form>

</body>
</html>
