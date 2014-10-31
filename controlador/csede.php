<?php
	include ("modelo/msede.php");
	include ("modelo/mpagina.php");
	$ins = new msede();

	$pr=isset($_GET["pr"]) ? $_GET["pr"]:NULL;
	$filtro=isset($_GET["filtro"]) ? $_GET["filtro"]:NULL;
	$in=isset($_GET["in"]) ? $_GET["in"]:NULL;


	$act= isset($_GET["act"]) ? $_GET["act"]:NULL;
	if($act=="1"){
		$ins->mantenimiento(2,$pr);
	}else{
		$ins->mantenimiento(1,$pr);
	}
	//capturar variables
	$nomsede = isset($_POST["nomsede"]) ? $_POST["nomsede"]:NULL;
	$direccion = isset($_POST["direccion"]) ? $_POST["direccion"]:NULL;
	$telefono = isset($_POST["telefono"]) ? $_POST["telefono"]:NULL;
	$municipio = isset($_POST["municipio"]) ? $_POST["municipio"]:NULL;
	$actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;
	$pr = isset($_GET["pr"]) ? $_GET["pr"]:NULL;
	//eliminar

	$del=isset($_GET["del"]) ? $_GET["del"]:NULL;
	if($del){
		$am = $ins->selambiente($del);
		if(!$am){
			$ins->delsede($del);
			echo "<script type='text/Javascript'> window.location='home.php?pac=114';</script>";
		}else{
			echo "<script language='Javascript'>  alert ('La sede no se puede eliminar porque le pertenecen ambientes.');</script>";
			echo "<script type='text/Javascript'> window.location='home.php?pac=114';</script>";
		}
		
	}
	//Actualizar
	if ($nomsede&& $direccion && $telefono &&$municipio && $pr && $actu){
		$ins->upsede($nomsede, $direccion , $telefono,$municipio,$pr);
		echo "<script language='Javascript'>  alert ('La sede se actualizo correctamente.');</script>";
		echo "<script type='text/Javascript'> window.location='home.php?pac=114';</script>";
	}
	
	//Insertar

	if ($nomsede&& $direccion && $telefono &&$municipio &&!$actu){
		$ins->insede($nomsede, $direccion , $telefono,$municipio);
		echo "<script language='Javascript'>  alert ('La sede se creo correctamente...');</script>";
		echo "<script type='text/Javascript'> window.location='home.php?pac=114';</script>";
	}
	$mu=$ins->selmuni();
	$sedes=$ins->selesedes();
	//selecionar sede
	
	$selupd=$ins->selsedeupd($pr);
	//Paginar
	$bo = "";
	$nreg = 10;//numero de registros a mostrar
	$pag = new mpagina($nreg);
	$conp ="SELECT count(id_estacion) as Npe FROM estacion";
	if($filtro) $conp.= " WHERE nombre LIKE '%".$filtro."%'";


?>


