<?php
include ("modelo/mficha.php");
	$ins = new mficha();
	
	$delete = isset($_GET["del"]) ? $_GET["del"]:NULL;
    if ($delete){
      $ins->delete($delete);
    }

    $mensaje="";
    $mensajeF="";
    $pac = isset ($_GET["pac"]) ? $_GET["pac"]:NULL;
    $pr = isset($_GET['pr']) ? $_GET['pr']:NULL;
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
	$editar = $ins ->selEditar($pr);
	$selOferta = $ins ->selOferta();
	
	

	if ($idficha && $actu){
		if ($fecha_inicio >= $fecha_fin){
			$mensajeF = "La Fecha de Inicio no puede ser menor a la Fecha de Fin"; 
		}else{
			$ins->update($idficha ,  $fecha_inicio ,  $fecha_fin , $oferta ,  $programaid ,  $jornadaid , $cant_aprendices);
		}
	}
	
	if ($idficha && $fecha_inicio && $fecha_fin && $oferta && !$actu){
		if ($fecha_inicio >= $fecha_fin){
			$mensajeF = "La Fecha de Inicio no puede ser menor a la Fecha de Fin"; 
		}else{
			$resultado = $ins->validaFicha($idficha);
				if ($resultado){
					$mensaje = "La Ficha que intenta crear ya existe";
				}else{
			 		$ins->insert($idficha ,  $fecha_inicio ,  $fecha_fin , $oferta ,  $programaid ,  $jornadaid , $cant_aprendices);
				}
		}
	   
		
	}

	$tabla = $ins->select();

?>