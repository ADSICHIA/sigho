
<?php
    require_once("/modelo/m_modificacion.php");	
	 $nom= isset ($_POST["nombre"])?$_POST["nombre"]:NULL;
		$ape= isset ($_POST["apellido"])?$_POST["apellido"]:NULL;
		$email= isset ($_POST["email"])?$_POST["email"]:NULL;
		$con= isset ($_POST["contrasena"])?$_POST["contrasena"]:NULL;
		
		$modif=seleccionar();
		$actu=actualizar($nom,$ape,$email,$con);
		include_once ("/vista/v_modificacion.php");
?>
