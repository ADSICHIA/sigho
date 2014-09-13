<?php
	include_once("../modelo/m_actualiza.php");
	$titulacion=seleccionaDatos(isset($_GET["pr"])?$_GET["pr"]:NULL);
	$programas=listarProgramas();
	$jorna=listaJornada();
	$ubica=listaUbicacion();
	$cod_titulacion= isset($_POST["cod_titulacion"])?$_POST["cod_titulacion"]:NULL;
	$cod_programa= isset($_POST["programa"])?$_POST["programa"]:NULL;
	$fecha_ini= isset($_POST["fini"])?$_POST["fini"]:NULL;
	$fecha_final=isset($_POST["ffin"])?$_POST["ffin"]:NULL;
	$cod_jornada= isset($_POST["jornada"])?$_POST["jornada"]:NULL;
	$cod_ubicacion= isset($_POST["ubicacion"])?$_POST["ubicacion"]:NULL;
	$dia=array(0,0,0,0,0,0,0);
	for($i=0;$i<7;$i++){
		$dia[$i]= isset ($_POST["dia".($i+1)]) ?$_POST["dia".($i+1)]:NULL;
	}
	$actu=isset($_POST["actu"]) ? $_POST["actu"]:NULL;
	$actu=editarFicha($cod_titulacion,$cod_programa,$fecha_ini,$fecha_final,$cod_jornada,$cod_ubicacion,$dia);
	include_once("../vista/v_actualiza.php");
?>