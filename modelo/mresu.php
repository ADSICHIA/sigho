<?php

class mresu{
	function mresu(){}
	
	function insres($cod , $res , $compe){
		$sql = "INSERT INTO resultados(id_resultado,resultado,idcompetencia) VALUES ('".$cod."','".$res."','".$compe."');";
		$this->cons($sql);
	}
	
	function updres($cod , $res , $compe){
		$sql = "UPDATE resultados SET resultado='".$res."',idcompetencia='".$compe."' WHERE id_resultado='".$cod."'";
		$this->cons($sql);
	}
	
	function delresultado($del){
		$sql = "DELETE FROM resultados WHERE id_resultado='".$del."';";
		$this->cons($sql);
	}
		

	function selcom($pr){
		$sql = "SELECT  * FROM resultados WHERE id_resultado='".$pr."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	function selexi($cod){
		$sql = "SELECT  * FROM resultados WHERE id_resultado='".$cod."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	function selresultado(){
		$sql = "SELECT  * 
FROM resultados as re inner join competencia_programa as com
on re.idcompetencia=com.id_competencia";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	function selcompetencia(){
		$sql = "SELECT  * FROM competencia_programa;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	function cons($c){
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	}
	
}