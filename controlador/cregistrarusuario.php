<?php
include ("../modelo/mregistrarusuario.php");
	$ins = new mregistrarusuario();
	
		$dat = $ins->parametro();
	$dat1 = $ins->genero();
	$dat2 = $ins->perfil();
	$dat3 = $ins->departamento();
	
	
	
		
	
?>