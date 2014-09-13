<?php
include_once("../modelo/gestorResumenHoras.php");
class controladorResumenHoras{
	
	function controladorResumenHoras(){

		

	}
	//---------recibe el numero de documento enviado por la vista y llama al controlador(puente entre vista y controlador).
	//---------retorna los resultados de la consulta.
	//elaborado por:Mayra Alejandra Durango.
	function horario($doc,$fechaactual){
		
		$consulta=new gestorResumenHoras();
		$res=$consulta->consultaHorario($doc,$fechaactual);
		
		return $res;
		
	}
	//---------recibe el numero de documento enviado por la vista y llama al controlador(puente entre vista y controlador).
	//---------retorna los resultados de la consulta.
	//elaborado por:Mayra Alejandra Durango.
	function horarioActual($doc){
	
		$consulta=new gestorResumenHoras();
		$res=$consulta->consultaHorarioActual($doc);
		
		return $res;
	}
	//---------recibe los registros devueltos por la consulta y los ubica en el vector que se asocia a los dias de la semana.(puente vista controlador)
	//---------retorna el vector.
	//elaborado por:Mayra Alejandra Durango.
	function ResumenHoras($res){
	
		$resu=new gestorResumenHoras();
		$resumen=$resu->ResumenHoras($res);
	
		return $resumen;
	}


}
include_once("../vista/Resumen_horas_inst.php");

?>