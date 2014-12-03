<?php
	include("modelo/mhorario.php");
	$ins = new mhorario();
	$idGrupo=isset($_REQUEST["idGrupo"]) ? $_REQUEST["idGrupo"]:NULL;
	$pr=isset($_REQUEST["pr"]) ? $_REQUEST["pr"]:NULL;
	$day = date('w');
	$arestar=$ins->getDiaSuma(7);
	$grupo=$ins->selgrupo();
	$week_lunes = date('Y-m-d', strtotime('-'.(5-$day).' days'));
	$week_domingo = date('Y-m-d', strtotime('+'.(7-$day).' days'));
	if($pr){
		$horario_grupo=$ins->getHorarioGrupo($pr);
	}
	

?>