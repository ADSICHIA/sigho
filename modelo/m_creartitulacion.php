<?php
include("../controlador/conexion.php");
function insertarTitulacion($ficha, $pro, $jor, $ubi, $fini, $ffin, $di){
	$conexionDB = new conexion();
	$conexionDB->conectarDB();
	$result=false;
	if ($ficha && $pro && $ffin && $fini && $ubi && $jor){
	$query="INSERT INTO titulacion(cod_titulacion, cod_programa, cod_jornada, cod_ubicacion, fecha_ini, fecha_fin) 
			VALUES	('$ficha','$pro','$jor','$ubi','$fini','$ffin')";
	//echo $query;
	$result = $conexionDB->insertar($query);
	echo $result;
	for($i=0;$i<7;$i++){
		if ($di[$i]){
			$query1="INSERT INTO dias_titulacion(cod_titulacion, cod_dia)
	VALUES	('$ficha','$di[$i]')";
	$result1 = $conexionDB->insertar($query1);
		}
	}
	return $result;
	}
}
function listaProgramas(){
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
$query="SELECT cod_jornada, descripcion FROM jornada order by cod_jornada";
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