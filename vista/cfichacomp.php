<?php
	include ("modelo/mfichacomp.php");
	//include ("modelo/mpagina.php");	
	$ins = new mfichacomp();

	$sp = isset($_GET["pr"]) ? $_GET["pr"]:NULL;/*
	*/$horario1 = $ins->selhorario($sp);
	$comp = $ins->selcomp();/*

*/
	

$actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;
$dat = $ins->selpara();

//captura de variables para insertar las estaciones de la ruta

if($actu){
	for($i = 0; $i<count($dat); $i++) {
			$fichacomp = isset($_POST['compete'.$dat[$i]['id_competencia']]) ? $_POST['compete'.$dat[$i]['id_competencia']]:NULL;  

			 if(isset($_POST['compete'.$dat[$i]['id_competencia']])){ 
					$ins->inscofi($fichacomp,$sp);
				
			}
	}
	echo "<script type='text/Javascript'>alert('Las competencias se agregaron correctamente...'); window.location='home.php?pac=112';</script>";
}

?>

