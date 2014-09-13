<?php
	include("./conexion.php");
	function editarFicha($cod_titulacion, $cod_programa, $fecha_ini, $fecha_final, $cod_jornada, $cod_ubicacion, $dia){
		$conexionDB = new conexion();
		$conexionDB->conectarDB();
		$result=false;
		if($cod_titulacion){
			$query="UPDATE titulacion SET cod_programa='$cod_programa',fecha_ini='$fecha_ini', fecha_fin='$fecha_final',
					cod_jornada='$cod_jornada', cod_ubicacion='$cod_ubicacion' where cod_titulacion='$cod_titulacion'";
			$result = mysql_query($query) or die("La consulta fall&oacute".mysql_error());
		}
		$query1="DELETE FROM dia_titulacion WHERE cod_titulacion='$cod_titulacion'";	
		$result1 = mysql_query($query1) or die("La consulta fall&oacute".mysql_error());
		for($i=0;$i<7;$i++){
			if ($dia[$i]){
				//echo "Inserto el ".$dia[$i];
				$query2="INSERT INTO dia_titulacion(cod_titulacion, cod_dia) VALUES	('$cod_titulacion','$dia[$i]')";
				//echo $query2;
				$result2 = mysql_query($query2) or die("La consulta fall&oacute".mysql_error());
			}
		}
		return $result;
	}
	function eliminarFicha($cod_titulacion){
		$conexionDB = new conexion();
		$conexionDB->conectarDB();
		$result=false;
		if($cod_titulacion){
			$query="DELETE FROM titulacion WHERE cod_titulacion='$cod_titulacion'";
			$result = mysql_query($query) or die("La consulta fall&oacute");
		}
		return $result;
	}
	
	function insertarFicha($cod_programa,$fecha_ini,$fecha_final,$cod_jornada,$cod_ubicacion,$cod_titulacion){
		$conexionDB = new conexion();
		$conexionDB->conectarDB();
		$result=false;
		if($cod_titulacion){
			$query="INSERT INTO titulacion(cod_titulacion, cod_programa, cod_jornada, fecha_ini, fecha_fin, cod_ubicacion)
					VALUES ($cod_titulacion,$cod_programa,$cod_jornada,$fecha_ini,$fecha_final,$cod_ubicacion)";
			$result = mysql_query($query) or die("La consulta fall&oacute".mysql_error());
		}
		$result=$result==""?"Se ingreso la ficha de manera exitosa":$result;
		return $result;
	}
	function listarFichas($cod_programa){
		$conexionDB = new conexion();
		$conexionDB->conectarDB();
		$result=false;
		$query="SELECT titulacion.cod_titulacion, programas.nom_programa,
					   jornada.descripcion, titulacion.fecha_ini,
					   titulacion.fecha_fin, ubicacion.nom_ubicacion
				FROM titulacion
				INNER JOIN programas ON titulacion.cod_programa = programas.cod_programa
				INNER JOIN jornada ON titulacion.cod_jornada = jornada.cod_jornada
				INNER JOIN ubicacion ON titulacion.cod_ubicacion = ubicacion.cod_ubicacion";
		if($cod_programa){
			$query.=" where titulacion.cod_programa=$cod_programa";
		}
		$result=mysql_query($query) or die("La consulta fall&oacute;: ".mysql_error());
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

?>