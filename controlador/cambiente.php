<?php
include ("modelo/mambiente.php");
	$ins = new modeloAmbiente();

	$delete = isset($_GET["del"]) ? $_GET["del"]:NULL;
    if ($delete){
      $ins->delete($delete);
    }

	$mensaje="";

    $pac = 116;
    $pr = isset($_GET['pr']) ? $_GET['pr']:NULL;
	$strAmbiente = isset($_POST["ambiente"]) ? $_POST["ambiente"]:NULL;
	$boolEspecializado = isset($_POST["especializado"]) ? 1 : 0;
	$strObservacion = isset($_POST["observacion"]) ? $_POST["observacion"]:NULL;
	$intIdSede = isset($_POST["sedeid"]) ? $_POST["sedeid"]:NULL;
	$update = isset($_POST["update"]) ? $_POST["update"]:NULL;
	$arraySede = $ins->selSede();
	
	if ($strAmbiente && $strObservacion && $intIdSede){
		$resultado = $ins->validateAmbiente($strAmbiente);
		if (!$resultado){
			$ins->insert($strAmbiente,$boolEspecializado,$strObservacion,$intIdSede);
		}else {
			$mensaje = "El Ambiente ingresado ya existe";
		}
	} 

	if ($strAmbiente && $boolEspecializado && $strObservacion && $intIdSede && $update){
		$ins->update($intIdAmbiente,$strAmbiente,$boolEspecializado,$strObservacion,$intIdSede);
	}

	$tabla = $ins->select();

?>