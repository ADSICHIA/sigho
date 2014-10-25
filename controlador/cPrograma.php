<?php
include ("../modelo/mPrograma.php");
	$ins = new mPrograma();
	
	$delete = isset($_GET["del"]) ? $_GET["del"]:NULL;
    if ($delete){
      $ins->delete($del);
    }
	$idprograma = isset ($_POST["idprograma"]) ? $_POST["idprograma"]:NULL;
	$programa = isset($_POST["programa"]) ? $_POST["programa"]:NULL;
	$version = isset($_POST["version"]) ? $_POST["version"]:NULL;
	$areaid = isset($_POST["areaid"]) ? $_POST["areaid"]:NULL;
	$actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;


	if ($idprograma && $programa && $version && $areaid && $actu){
		$ins->update($idprograma,$programa,$version,$areaid);
	}

	if ($idprograma && $programa && $version && $areaid && !$actu){
		$ins->insert($idprograma,$programa,$version,$areaid);
	}

	$area =  $ins->selArea();
	$tabla = $ins->select();
?>