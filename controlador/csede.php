<?php
	include ("modelo/msede.php");
	include ("modelo/mpagina.php");
	$ins = new msede();

	
	$filtro=isset($_GET["filtro"]) ? $_GET["filtro"]:NULL;
	//capturar variables
	$nomsede = isset($_POST["nomsede"]) ? $_POST["nomsede"]:NULL;
	$direccion = isset($_POST["direccion"]) ? $_POST["direccion"]:NULL;
	$telefono = isset($_POST["telefono"]) ? $_POST["telefono"]:NULL;
	$municipio = isset($_POST["municipio"]) ? $_POST["municipio"]:NULL;
	$actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;
	$pr = isset($_GET["pr"]) ? $_GET["pr"]:NULL;

	//Actualizar
	if ($nomsede&& $direccion && $telefono &&$municipio && $actu){
		$ins->upsede($nomsede, $direccion , $telefono,$municipio);
		echo "<script language='Javascript'>  alert ('La estacion se actualizo correctamente.');</script>";
	}
	
	//Insertar
	if ($nomsede&& $direccion && $telefono &&$municipio && !$actu){
		$ins->insede($nomsede, $direccion , $telefono,$municipio);
		echo "<script language='Javascript'>  alert ('La sede se creo correctamente...');</script>";
	}
	$mu=$ins->selmuni();
	
	//Paginar
	$bo = "";
	$nreg = 10;//numero de registros a mostrar
	$pag = new mpagina($nreg);
	$conp ="SELECT count(id_estacion) as Npe FROM estacion";
	if($filtro) $conp.= " WHERE nombre LIKE '%".$filtro."%'";


?>


