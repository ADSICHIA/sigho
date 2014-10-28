<?php
include ("modelo/mficha.php");
	$ins = new mPrograma();
	$delete = isset($_GET["del"]) ? $_GET["del"]:NULL;
    if ($delete){
      $ins->delete($del);
    }

    
	$idficha = isset ($_POST["idficha"]) ? $_POST["idficha"]:NULL;
	$fecha_inicio = isset($_POST["fecha_inicio"]) ? $_POST["fecha_inicio"]:NULL;
	$fecha_fin = isset($_POST["fecha_fin"]) ? $_POST["fecha_fin"]:NULL;
	$oferta = isset($_POST["oferta"]) ? $_POST["oferta"]:NULL;
	$programaid = isset($_POST["programaid"]) ? $_POST["programaid"]:NULL;
	$jornadaid = isset($_POST["jornadaid"]) ? $_POST["jornadaid"]:NULL;
	$cant_aprendices = isset($_POST["cant_aprendices"]) ? $_POST["cant_aprendices"]:NULL;
	$actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;

	$programa =  $ins->selPrograma();
	$jornada = $ins->selJornada();
	$tabla = $ins->select();
	$tabla1 = $ins->selJornadaid();
	


	if ($idficha && $actu){
		$ins->update($idficha ,  $fecha_inicio ,  $fecha_fin , $oferta ,  $programaid ,  $jornadaid , $cant_aprendices);
	}
	
	if ($idficha && $fecha_inicio && $fecha_fin && $oferta && !$actu){
	    $ins->insert($idficha ,  $fecha_inicio ,  $fecha_fin , $oferta ,  $programaid ,  $jornadaid , $cant_aprendices);
		
	}


?>