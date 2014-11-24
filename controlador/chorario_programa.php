<?php
	include("modelo/mhorario.php");
	$ins = new mhorario();
	$idGrupo=isset($_REQUEST["idGrupo"]) ? $_REQUEST["idGrupo"]:NULL;
	$day = date('w');
	$week_lunes = date('Y-m-d', strtotime('-'.(1-$day).' days'));
	$week_domingo = date('Y-m-d', strtotime('+'.(7-$day).' days'));
	$horario_grupo=$ins->getHorarioGrupo(1);

?>