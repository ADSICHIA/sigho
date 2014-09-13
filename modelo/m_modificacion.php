<?php include_once("modelo/conexion.php");
$conexion = new conexion();
 $conexion->conectarDB();
 
 	  
	   function seleccionar(){
	$doc=$_SESSION["user"]["documento"];
		$sql2= "SELECT * FROM usuario WHERE doc_usuario='$doc'";
		//echo $sql2;
		//$dato= $conexion->SelectDato($sql2);
      	$res1 = mysql_query($sql2) or die("La consulta fall&oacute");
		return $res1;
	   }
		
		function actualizar($nom, $ape, $email, $con){
			if($nom && $ape && $email && $con){
		$doc=$_SESSION["user"]["documento"];
		$sql3 ="UPDATE usuario SET nom_usuario='".$nom."', ape_usuario='".$ape."', clave='".$con."', email='".$email."' WHERE 		doc_usuario='".$doc."'";
        $res3 = mysql_query($sql3) or die("2.La consulta fall&oacute;: ".mysql_error());
		echo "<script languaje='javascript'>alert('Datos Actualizados')</script>";
	echo "<script type='text/javascript'>window.location='home.php';</script>";
		
	   }
		}
?>
