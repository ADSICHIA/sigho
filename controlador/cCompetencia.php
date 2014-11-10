<?php
include ("modelo/mCompetencia.php");
include ("modelo/mpagina.php");	

$ins = new mCompetencia();

$delete = isset($_GET["del"]) ? $_GET["del"]:NULL;

$programa = $ins -> SelPrograma();
$usuario = isset($_POST["usuario"]) ? $_POST["usuario"]:NULL;
$idprograma = isset($_POST["programaid"]) ? $_POST["programaid"]: NULL;
$calificado = isset($_POST["calificado"]) ? $_POST["calificado"]: NULL;
$filtro=isset($_GET["filtro"]) ? $_GET["filtro"]:NULL;
$pr = isset($_GET['pr']) ? $_GET['pr']:NULL;
$actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;

if ($usuario && $idprograma && !is_null($calificado) && !$actu){
	$dat = $ins->insert($usuario, $idprograma, $calificado);
}


$bo = "";
	$nreg = 10;//numero de registros a mostrar
	$pag = new mpagina($nreg);
	$conp ="SELECT count(idcompetencia)as Npe FROM competencia";  
	if($filtro) $conp.= " WHERE competencia.idcompetencia LIKE '%".$filtro."%'";

?>