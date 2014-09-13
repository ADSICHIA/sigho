<?php
//Inicio la sesión
session_start();
$autenti = isset($_SESSION["autenticado"]) ? $_SESSION["autenticado"]:NULL;
//COMPRUEBA QUE EL USUARIO ESTA AUTENTIFICADO
if ($autenti != 430025) {
	//si no existe, envio a la página de autentificacion
	session_destroy();
	header("Location:index.php");
	exit();
}
	
?>