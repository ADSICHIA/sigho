<?php
	include("modelo/mhorario.php");
	$ins = new mhorario();
	$idGrupo=isset($_REQUEST["idGrupo"]) ? $_REQUEST["idGrupo"]:NULL;
	$day = date('w');
	$arestar=$ins->getDiaSuma(7);
	$week_lunes = date('Y-m-d', strtotime('-'.(3-$day).' days'));
	$week_domingo = date('Y-m-d', strtotime('+'.(7-$day).' days'));
	$horario_grupo=$ins->getHorarioGrupo(5);

?>