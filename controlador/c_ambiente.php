<?php
include ("modelo/m_Ambiente.php");
	$ins = new modeloAmbiente();

	$delete = isset($_GET["del"]) ? $_GET["del"]:NULL;
    if ($delete){
      $ins->delete($delete);
    }

	$mensaje="";

    $pac = 115;
    $pr = isset($_GET['pr']) ? $_GET['pr']:NULL;
	$intIdAmbiente = isset ($_POST["idambiente"]) ? $_POST["idambiente"]:NULL;
	$strAmbiente = isset($_POST["ambiente"]) ? $_POST["ambiente"]:NULL;
	$boolEspecializado = isset($_POST["especializado"]) ? $_POST["especializado"]:NULL;
	$strObservacion = isset($_POST["observacion"]) ? $_POST["observacion"]:NULL;
	$intIdSede = isset($_POST["sedeid"]) ? $_POST["sedeid"]:NULL;
	$update = isset($_POST["update"]) ? $_POST["update"]:NULL;
	$area =  $ins->selArea();
	$editar = $ins->selEditar($pr);
	
	if ($intIdAmbiente && $strAmbiente && $boolEspecializado && $strObservacion && $intIdSede && $update){
		$resultado = $ins->validateAmbiente($intIdAmbiente);
		if ($resultado){
			$mensaje = "El Ambiente ingresado ya existe";
		}else{
			$ins->insert($intIdAmbiente,$strAmbiente,$boolEspecializado,$strObservacion,$intIdSede);
		}
	}


	if ($intIdAmbiente && $strAmbiente && $boolEspecializado && $strObservacion && $intIdSede && $update){
		$ins->update($intIdAmbiente,$strAmbiente,$boolEspecializado,$strObservacion,$intIdSede);
	}

	$tabla = $ins->select();
?>