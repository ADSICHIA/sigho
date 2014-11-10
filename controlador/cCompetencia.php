<?php
include ("modelo/mCompetencia.php");
//include ("modelo/mpagina.php");	

$ins = new mCompetencia();

$delete = isset($_GET["del"]) ? $_GET["del"]:NULL;

$programa = $ins -> SelPrograma();


?>