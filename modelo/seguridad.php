<?php
//Inicio la sesi�n
session_start();
$autenti = isset($_SESSION["autenticado"]) ? $_SESSION["autenticado"]:NULL;
//COMPRUEBA QUE EL USUARIO ESTA AUTENTIFICADO
if ($autenti != 430025) {
	//si no existe, envio a la p�gina de autentificacion
	session_destroy();
	header("Location:index.php");
	exit();
}
	
?>