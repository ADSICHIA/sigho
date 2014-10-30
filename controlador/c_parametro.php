<?php
	include ("modelo/m_parametro.php");
	
	$ins = new mparametro();
	
	//Eliminar
	$del = isset($_GET["del"]) ? $_GET["del"]:NULL;
	$del2 = isset($_GET["del2"]) ? $_GET["del2"]:NULL;

	if ($del)
	{
		$ins->delpar($del);
	}
	
	if ($del2)
	{
		$ins->delval($del2);
	}
	
	$ed 		= isset($_GET["ed"]) ? $_GET["ed"]:NULL;
	$pr 		= isset($_GET["pr"]) ? $_GET["pr"]:NULL;
	$prr 		= isset($_GET["prr"]) ? $_GET["prr"]:NULL;
	$codpar 	= isset($_POST["codpar"]) ? $_POST["codpar"]:NULL;
	$nompar 	= isset($_POST["nompar"]) ? $_POST["nompar"]:NULL;
	$editpar 	= isset($_POST["editpar"]) ? $_POST["editpar"]:NULL;
	$codval 	= isset($_POST["codval"]) ? $_POST["codval"]:NULL;
	$nomval 	= isset($_POST["nomval"]) ? $_POST["nomval"]:NULL;
	$editval 	= isset($_POST["editval"]) ? $_POST["editval"]:NULL;
	$actu 		= isset($_POST["actu"]) ? $_POST["actu"]:NULL;
	
	$dat5 = $ins->selpar1($pr);	#Seleccionar parametro
	$dat3 = $ins->selpar1($prr);
	$dat4 = $ins->selval2($pr);	#Seleccionar valor	
	

	//Actualizar parametro
	if ($codpar && $nompar && $editpar && $actu)
	{
		$ins->updpar($codpar,$nompar,$editpar);
	}
	
	//Insertar parametro
	if ($nompar && $editpar  && !$actu)
	{
		$ins->inspar($nompar,$editpar);
	}
	
	//Actualizar Valor
	if($codval && $nomval && $editval && $codpar && $actu)
	{
		$ins->updval($codval, $nomval, $editval, $codpar);
	}
	
	//Insertar Valor
	if ($nomval && $codpar && $editval && !$actu)
	{
		$ins->insval($nomval, $editval, $codpar);
	}
?>