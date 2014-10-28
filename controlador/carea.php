<?php
include ("modelo/marea.php");
	$ins = new mPrograma();
	$delete = isset($_GET["del"]) ? $_GET["del"]:NULL;
    if ($delete){
      $ins->delete($del);
    }

    
	$area = isset ($_POST["area"]) ? $_POST["area"]:NULL;
	$usuarioid = isset($_POST["usuarioid"]) ? $_POST["usuarioid"]:NULL;
	$actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;

	$area =  $ins->selArea();
	$usuario = $ins->selUsuario();
	$tabla = $ins->select();
	
	


	if ($area && $usuarioid && $actu){
		$ins->update($idficha ,  $fecha_inicio ,  $fecha_fin , $oferta ,  $programaid ,  $jornadaid , $cant_aprendices);
	}
	
	if ( $area && $usuarioid && !$actu){
	    $ins->insert( $area , $usuarioid );
		
	}


?>