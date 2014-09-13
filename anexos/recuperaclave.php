<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin t�tulo</title>
</head>

<body>
<form method="get" action="">
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

<?php

include ("controlador/conexion.php");
$conexionBD =new conexion();
$conexionBD -> conectarDB();




// recogemos las variables enviadas por el formulario 
$documento=$_GET["doc_usuario"]; 
$email=$_GET["email"]; 



// Consultamos si existe $nombreusuario + $emailusuario 
$res=mysql_query("SELECT COUNT(*) FROM usuario WHERE doc_usuario='$documento' AND email='$email'"); 

if (mysql_num_rows($res)==0) { 
// Si no existe, datos incorrectos y fin del proceso y volvemos al formulario de recuperacion 
header("Location:formulario.php"); 
} 
else { 
// Si existe, buscamos en la bd 
$res=mysql_query("SELECT * FROM usuario WHERE doc_usuario='$doc_usuario' AND email='$email'"); 
$row=mysql_fetch_assoc($res); 
$clave=$row['clave']; 

// enviamos el email de recuperacion 
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
@mail($email, "Recuperacion", "Sus datos en nuestra web son $doc_usuario, $clave", $headers); 
} 
?>
</html>
</body>
