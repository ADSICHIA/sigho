<?php 

include_once("../modelo/gestorRango.php");
 	class controladorFicha {
 	function controladorFicha(){
		
	}
	function Ran($ficha,$fechaactual,$fechafinal){
		$consulta=new gestorRango();
		$res=$consulta->consultarficha($ficha,$fechaactual,$fechafinal);
		
		return $res;
	}
	}
	include_once("../vista/ficha_rango_fecha.php");
 ?>
 