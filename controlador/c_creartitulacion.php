<?php
	include_once("../modelo/m_creartitulacion.php");
	if(isset($_POST["EditarFicha"])){
		var_dump($_POST);
	}
	$ficha= isset ($_POST["nficha"]) ?$_POST["nficha"]:NULL;
	$pro= isset ($_POST["programa"]) ?$_POST["programa"]:NULL;
	$ubi= isset ($_POST["ubicacion"]) ?$_POST["ubicacion"]:NULL;
	$jor= isset ($_POST["jornada"]) ?$_POST["jornada"]:NULL;
	$fini= isset ($_POST["fini"]) ?$_POST["fini"]:NULL;
	$ffin= isset ($_POST["ffin"]) ?$_POST["ffin"]:NULL;
	$dia=array(0,0,0,0,0,0,0);
	for($i=0;$i<7;$i++){
		$dia[$i]= isset ($_POST["dia".($i+1)]) ?$_POST["dia".($i+1)]:NULL;
	}
	
	$listaProgramas=listaProgramas();
	$listaJornada=listaJornada();
	$listaUbicacion=listaUbicacion();
	//var_dump($dia);
	if($ficha && $pro && $jor && $ubi && $fini && $ffin && $dia && !isset($_POST["EditarFicha"])){
		//echo "Inserta titulacion";
		$insertaTitulacion=insertarTitulacion($ficha, $pro, $jor, $ubi, $fini, $ffin, $dia);
	}
	
	include_once("../vista/v_creartitulacion.php");
?>	


