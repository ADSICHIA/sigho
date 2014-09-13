<?php
include_once("../modelo/gestorConsultaHorario.php");
class mvc{
	
	function mvc(){

		

	}
	//---------recibe el numero de documento enviado por la vista y llama al controlador(puente entre vista y controlador).
	//---------retorna los resultados de la consulta.
	//elaborado por:Mayra Alejandra Durango.
	function horario($doc,$fechaactual){
		
		$consulta=new gestorConsultaHorario();
		$res=$consulta->consultaHorario($doc,$fechaactual);
		
		return $res;
		
	}
	//---------recibe el numero de documento enviado por la vista y llama al controlador(puente entre vista y controlador).
	//---------retorna los resultados de la consulta.
	//elaborado por:Mayra Alejandra Durango.
	function horarioActual($doc){
	
		$consulta=new gestorConsultaHorario();
		$res=$consulta->consultaHorarioActual($doc);
		
		return $res;
	}
	//---------recibe los registros devueltos por la consulta y los ubica en el vector que se asocia a los dias de la semana.(puente vista controlador)
	//---------retorna el vector.
	//elaborado por:Mayra Alejandra Durango.
	function datosHorario($res){
	
		$vector=new gestorConsultaHorario();
		$vec=$vector->consultarDatosHorario($res);
	
		return $vec;
	}


}
include_once("../vista/horario_semana1.php");

?>