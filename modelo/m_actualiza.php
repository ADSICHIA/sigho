<?php
	include("../controlador/conexion.php");
	function editarFicha($cod_titulacion, $cod_programa, $fecha_ini, $fecha_final, $cod_jornada, $cod_ubicacion,$di){
		$conexionDB = new conexion();
		$conexionDB->conectarDB();
		$result=false;
		if($cod_titulacion){
			$query="UPDATE titulacion SET cod_programa='$cod_programa',fecha_ini='$fecha_ini', fecha_fin='$fecha_final',
					cod_jornada='$cod_jornada', cod_ubicacion='$cod_ubicacion' where cod_titulacion='$cod_titulacion'";
					echo $query;
			$result = mysql_query($query) or die("La consulta fall&oacute".mysql_error());
		}
		for($i=0;$i<7;$i++){
			if ($di[$i]){
				$query1="UPDATE dias_titulacion SET cod_titulacion='$cod_titulacion', cod_dia='$di[$i]'";	
				$result1 = mysql_query($query) or die("La consulta fall&oacute".mysql_error());
			}
		}
		return $result;
	}
	function seleccionaDatos($pr){
		$conexionDB = new conexion();
		$conexionDB->conectarDB();
		$result=null;
		if($pr){
		$query= "SELECT cod_titulacion, cod_programa, cod_jornada, cod_ubicacion, fecha_ini, fecha_fin FROM titulacion
				 WHERE cod_titulacion='".$pr."'";
	    $result = mysql_query($query) or die("La consulta fall&oacute");
		
		}
		return $result;
	}
	function listarProgramas(){
		$conexionDB = new conexion();
		$conexionDB->conectarDB();
		$result=false;
		$query="SELECT cod_programa, nom_programa FROM programas order by nom_programa";
		$result=mysql_query($query) or die("La consulta fall&oacute;: ".mysql_error());
		return $result;
	}
	function listaJornada(){
		$conexionDB = new conexion();
		$conexionDB->conectarDB();
		$result=false;
		$query="SELECT cod_jornada, descripcion FROM jornada order by descripcion";
		$result=mysql_query($query) or die("La consulta fall&oacute;: ".mysql_error());
		return $result;
	}
	function listaUbicacion(){
		$conexionDB = new conexion();
		$conexionDB->conectarDB();
		$result=false;
		$query="SELECT cod_ubicacion, nom_ubicacion FROM ubicacion order by nom_ubicacion";
		$result=mysql_query($query) or die("La consulta fall&oacute;: ".mysql_error());
		return $result;
	}
?>