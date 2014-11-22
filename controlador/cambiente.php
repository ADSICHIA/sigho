<?php
include ("modelo/mambiente.php");
	$ins = new modeloAmbiente();

	$delete = isset($_GET["del"]) ? $_GET["del"]:NULL;
    if ($delete){
      $ins->delete($delete);
    }

	$mensaje="";

    $pac = 115;
    $pr = isset($_GET['pr']) ? $_GET['pr']:NULL;
	$strAmbiente = isset($_POST["ambiente"]) ? $_POST["ambiente"]:NULL;
	$boolEspecializado = isset($_POST["especializado"]) ? 1 : 0;
	$strObservacion = isset($_POST["observacion"]) ? $_POST["observacion"]:NULL;
	$intIdSede = isset($_POST["sedeid"]) ? $_POST["sedeid"]:NULL;
	$intIdAmbiente = isset($_POST["idambiente"]) ? $_POST["idambiente"]:NULL;
	$actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;
	$arraySede = $ins->selSede();
	$editar = $ins->selEditar($pr);

	if ($strAmbiente && $strObservacion && $intIdSede && !$actu){
		$resultado = $ins->validateAmbiente($strAmbiente);
		if (!$resultado){
			$ins->insert($strAmbiente,$boolEspecializado,$strObservacion,$intIdSede);
		}else{
			$mensaje = "El Ambiente ingresado ya existe";
		}
	} else if ($strAmbiente && $strObservacion && $intIdSede && $actu){
		$ins->update($intIdAmbiente,$strAmbiente,$boolEspecializado,$strObservacion,$intIdSede);
	}

	$tabla = $ins->select();

?>