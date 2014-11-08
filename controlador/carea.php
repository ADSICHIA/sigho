<?php
include ("modelo/marea.php");
	$ins = new marea();
	$delete = isset($_GET["del"]) ? $_GET["del"]:NULL;

    if ($delete){
    	$validaPrograma = $ins -> validaPrograma($delete);
    	if(!is_null($validaPrograma) && count($validaPrograma) != 0){
    		echo "<script>alert('No es posible eliminar el Área ya que tiene programas relacionados'); window.location='home.php?pac=104';</script>";
    	}else{
      		$ins->delete($delete);
      	}
    }

    $mensaje="";
    $pac = isset ($_GET["pac"]) ? $_GET["pac"]:NULL;
    $pr = isset($_GET['pr']) ? $_GET['pr']:NULL;
	$area = isset ($_POST["area"]) ? $_POST["area"]:NULL;
	$usuarioid = isset($_POST["usuarioid"]) ? $_POST["usuarioid"]:NULL;
	$actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;
	$idarea = isset($_POST["idarea"]) ? $_POST["idarea"]:NULL;

	$area = strtoupper($area);
	$usuario = $ins->selUsuario();
	$resultado = $ins ->validaArea($area);
	$editar = $ins->selEditar($pr);

	if ($resultado){
					$mensaje = "El &Aacute;rea que intenta crear ya existe";
	}else{

		if ($area && $usuarioid && $actu){
			$ins->update($idarea, $area ,  $usuarioid);
		}
		
		if ( $area && $usuarioid && !$actu){
		    $ins->insert( $area , $usuarioid );
			
		}
	}

$area =  $ins->selArea();

?>