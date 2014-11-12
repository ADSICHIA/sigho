<?php
include_once("conexion.php");
$datos=$_POST["datos"];
$funcion = $_POST['funcion'];

if ($funcion == "programa"){
	$validar=validaPrograma($datos);
	if(!is_null($validar) && count($validar)!=0)
		echo "El programa con n&uacute;mero ".$datos." ya existe";
		//echo json_encode($result);
}

if ($funcion == "ficha"){
	$validar=validaFicha($datos);
	if(!is_null($validar) && count($validar)!=0)
		echo "La ficha con n&uacute;mero ".$datos." ya existe";
}
if ($funcion == "area"){
	$validar=validaArea($datos);
	if(!is_null($validar) && count($validar)!=0)
		echo "El &Aacute;rea ".$datos." ya existe";
}
if ($funcion == "competencia"){
	$validar = validaCompetencia($datos);
	if(!is_null($validar) && count($validar)!=0)
		echo "El Programa seleccionado (".$datos.") ya fue agregado a sus competencias";
}

function validaPrograma($idprograma){
	$valida = "SELECT idprograma from programa where idprograma = '".$idprograma."'";
	$conexionBD = new conexion();
	$conexionBD->conectarBD();
	$data = $conexionBD->ejeCon($valida, 0);
	return $data;
}	

function validaFicha($idficha){
	$valida = "SELECT idficha from ficha where idficha = '".$idficha."'";
	$conexionBD = new conexion();
	$conexionBD->conectarBD();
	$data = $conexionBD->ejeCon($valida, 0);
	return $data;
}

function validaArea($area){
	$valida = "SELECT area from area where area = '".$area."'";
	$conexionBD = new conexion();
	$conexionBD->conectarBD();
	$data = $conexionBD->ejeCon($valida, 0);
	return $data;
}

function validaCompetencia($idprograma){
	$valida = "SELECT idcompetencia from competencia WHERE programaid = '".$idprograma."'";
	$conexionBD = new conexion();
	$conexionBD->conectarBD();
	$data = $conexionBD->ejeCon($valida, 0);
	return $data;
}
function cons($c){
	$conexionBD = new conexion();
	$conexionBD->conectarBD();
	$this->result=$conexionBD->ejeCon($c,0);
}

?>

