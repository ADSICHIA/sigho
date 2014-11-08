<?php
include ("modelo/mficha.php");
include ("modelo/mpagina.php");	
	$ins = new mficha();
	
	$delete = isset($_GET["del"]) ? $_GET["del"]:NULL;
    if ($delete){
    	$validaGrupo = $ins -> validaFichaGrupo($delete);
    	if (!is_null($validaGrupo) || count($validaGrupo) != 0){
    		echo "<script>alert('No es posible eliminar la ficha ya que tiene un grupo relacionado'); window.location='home.php?pac=112';</script>";
    	}else
    		$ins->delete($delete);
    }

    $filtro=isset($_GET["filtro"]) ? $_GET["filtro"]:NULL;
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
		$ins->update($idficha ,  $fecha_inicio ,  $fecha_fin , $oferta ,  $programaid ,  $jornadaid , $cant_aprendices);
	}
	
	if ($idficha && $fecha_inicio && $fecha_fin && $oferta && !$actu){
 		$ins->insert($idficha ,  $fecha_inicio ,  $fecha_fin , $oferta ,  $programaid ,  $jornadaid , $cant_aprendices);
	}
	   

	//Paginar
	$bo = "";
	$nreg = 10;//numero de registros a mostrar
	$pag = new mpagina($nreg);
	$conp ="SELECT count(idficha)as Npe FROM ficha";  
	if($filtro) $conp.= " WHERE ficha.idficha LIKE '%".$filtro."%'";

	$tabla = $ins->select();

?>