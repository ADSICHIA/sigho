<?php
include ("modelo/mCompetencia.php");
include ("modelo/mpagina.php");	

$ins = new mCompetencia();

$delete = isset($_GET["del"]) ? $_GET["del"]:NULL;
if ($delete){
	$ins->delete($delete);
}

$pac = isset ($_GET["pac"]) ? $_GET["pac"]:NULL;
$programa = $ins -> SelPrograma();
$pr = isset($_GET['pr']) ? $_GET['pr']:NULL;
$usuario = isset($_POST["usuario"]) ? $_POST["usuario"]:NULL;
$idprograma = isset($_POST["programaid"]) ? $_POST["programaid"]: NULL;
$calificado = isset($_POST["calificado"]) ? $_POST["calificado"]: NULL;
$filtro=isset($_GET["filtro"]) ? $_GET["filtro"]:NULL;
$pr = isset($_GET['pr']) ? $_GET['pr']:NULL;
$actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;
$editar = $ins -> selEditar($pr);

if ($usuario && $idprograma && !is_null($calificado) && !$actu){
	$ins->insert($usuario, $idprograma, $calificado);
}


	$bo = "";
	$nreg = 10;//numero de registros a mostrar
	$pag = new mpagina($nreg);
	$conp ="SELECT count(c.idcompetencia) as Npe, p.programa FROM competencia as c inner join programa as p on p.idprograma = c.programaid";  
	if($filtro) $conp.= " WHERE p.programa LIKE '%".$filtro."%'";

?>