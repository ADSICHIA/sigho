<?php
	include ("modelo/mSeguridad.php");
	session_start();
	$objSeguridad=new mSeguridad();
	$identificacion = isset($_POST["identificacion"]) ? $_POST["identificacion"] : NULL;
	
	$clave = isset($_POST["password"]) ? $_POST["password"] : NULL;
	$datosUsuario=$objSeguridad->validarUsuario($identificacion);
	$msg=null;
	//var_dump($datosUsuario);
	if(!is_null($datosUsuario) && count($datosUsuario)==1){
		$datetime1=$datosUsuario[0]["fecha_expiracion"];
		$datetime2=new DateTime("now");
		$validar_fecha=($datetime1<=$datetime2);
		if($datosUsuario[0]["clave"]==$clave && $validar_fecha){
			$_SESSION["user"] = $datosUsuario[0]['nombres']." ".$datosUsuario[0]['apellidos'];
			$_SESSION["idUser"] = $datosUsuario[0]['idusuario'];
			$_SESSION["documento"] = isset($datosUsuario[0]['identificacion']) ? $datosUsuario[0]['identificacion']:NULL;
			$_SESSION["perfil"] = isset($datosUsuario[0]['perfilid']) ? $datosUsuario[0]['perfilid']:NULL;
			$_SESSION["autentificado"]= 10;
			//var_dump("Si entro");
			echo "<script type='text/javascript'>window.location='home.php';</script>";
		}else{
			session_destroy();
			$msg="Identificacion ó contraseña invalidos!";
		}
	}else{
		session_destroy();
		$msg=is_null($identificacion)?null:"Identificacion ó contraseña invalidos!";
	}


?>