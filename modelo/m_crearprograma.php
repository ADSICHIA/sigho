<?php
	include("../controlador/conexion.php");
	function insertarPrograma($codpro, $nom, $niv){
		$conexionDB = new conexion();
		$conexionDB->conectarDB();
		if ( $nom && $niv && $codpro ){
		$sql="INSERT INTO programas (cod_programa, nom_programa, cod_nivel)
							 VALUES	('".$codpro."','".$nom."','".$niv."')";
		$dato = $conexionDB->insertar($sql);
		}
	}
	function listaNivel(){
		$conexionDB = new conexion();
		$conexionDB->conectarDB();
		$result=false;
		$query="SELECT cod_nivel, nom_nivel FROM nivel order by nom_nivel";
		$result=mysql_query($query) or die("La consulta fall&oacute;: ".mysql_error());
		return $result;
	}
?>