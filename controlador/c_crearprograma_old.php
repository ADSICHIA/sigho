<?php
	include_once("../modelo/m_crearprograma.php");
	$codpro= isset ($_POST["codpro"]) ?$_POST["codpro"]:NULL;
	$nom= isset ($_POST["nombre"]) ?$_POST["nombre"]:NULL;
	$niv= isset ($_POST["nivel"]) ?$_POST["nivel"]:NULL;
	$niveles=listaNivel();
	$insertaPrograma=insertarPrograma($codpro,$nom,$niv);
	include_once("../vista/v_crearprograma.php");
?>	