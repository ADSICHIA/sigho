 <?php
  include_once("modelo/m_registrar.php");
 		 $nom= isset ($_POST["nombre"])?$_POST["nombre"]:NULL;
		$ape= isset ($_POST["apellido"])?$_POST["apellido"]:NULL;
		$doc= isset ($_POST["documento"])?$_POST["documento"]:NULL;
		$email= isset ($_POST["email"])?$_POST["email"]:NULL;
		$con= isset ($_POST["contrasena"])?$_POST["contrasena"]:NULL;
		$btn= isset ($_POST["btn"])?$_POST["btn"]:NULL;
		$regist=registrar($nom ,$ape ,$doc ,$email ,$con ,$btn);
 include_once("vista/v_registrar.php");
 ?>