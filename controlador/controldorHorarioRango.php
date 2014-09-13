<?php
include_once("../modelo/gestorConsultaRangoFecha.php");
class controldorHorarioRango{
	
	function controldorHorarioRango(){

		

	}
	//---------recibe el numero de documento enviado por la vista y llama al controlador(puente entre vista y controlador).
	//---------retorna los resultados de la consulta.
	//elaborado por:Mayra Alejandra Durango.
	function horario($doc,$fechaactual,$fechafinal){
		
		$consulta=new gestorConsultaRangoFecha();
		$res=$consulta->consultaHorario($doc,$fechaactual,$fechafinal);
		
		return $res;
		
	}
	


}

include_once("../vista/horario_rango_fecha.php");
?>