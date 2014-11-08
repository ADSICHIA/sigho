<?php
include ("modelo/marea.php");
	$ins = new marea();
	$delete = isset($_GET["del"]) ? $_GET["del"]:NULL;
    if ($delete){
      $ins->delete($delete);
    }

    $mensaje="";
    $pac = isset ($_GET["pac"]) ? $_GET["pac"]:NULL;
    $pr = isset($_GET['pr']) ? $_GET['pr']:NULL;
	$area = isset ($_POST["area"]) ? $_POST["area"]:NULL;
	$usuarioid = isset($_POST["usuarioid"]) ? $_POST["usuarioid"]:NULL;
	$actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;

	$area = strtoupper($area);
	$usuario = $ins->selUsuario();
	$resultado = $ins ->validaArea($area);

	if ($resultado){
					$mensaje = "El &Aacute;rea que intenta crear ya existe";
	}else{

		if ($area && $usuarioid && $actu){
			$ins->update($idficha ,  $fecha_inicio ,  $fecha_fin , $oferta ,  $programaid ,  $jornadaid , $cant_aprendices);
		}
		
		if ( $area && $usuarioid && !$actu){
		    $ins->insert( $area , $usuarioid );
			
		}
	}

$area =  $ins->selArea();

?>