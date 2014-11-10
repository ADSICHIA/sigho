<?php
//include("../controlador/conexion.php");
class modeloAmbiente{
	function modeloAmbiente(){
	}
	
	function insert ($strAmbiente,$boolEspecializado,$strObservacion,$intIdSede){
		$sql = "INSERT INTO ambiente(ambiente, especializado, observacion, sedeid) VALUES ('".$strAmbiente."', '".$boolEspecializado."', '".$strObservacion."','".$intIdSede."');";
		$this->cons($sql);
	}
	
	function update ($intIdAmbiente,$strAmbiente,$boolEspecializado,$strObservacion,$intIdSede){
		$sql = "UPDATE ambiente SET idambiente = '".$intIdAmbiente."', ambiente = '".$strAmbiente."', especializado = '".$boolEspecializado."', observacion = '".$strObservacion."', sedeid = ".$intIdSede."'";
		$sql .= " WHERE idambiente = '".$intIdAmbiente."';";
		$this->cons($sql);
	}
	
	function delete ($intIdAmbiente){
		$sql = "DELETE FROM ambiente WHERE idambiente = '".$intIdAmbiente."'";
		$this->cons($sql);
	}
	
	function cons($c){
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	}

	function selSede(){
		$sql = "SELECT idsede, sede FROM sede;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	
	function validateAmbiente($strAmbiente){
		$valida = "SELECT * from ambiente where ambiente = '".$strAmbiente."'";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($valida, 0);
		return $data;
	}

	function selEditar($intIdAmbiente){
		$sql = "SELECT idambiente, ambiente, especializado, observacion, sedeid FROM ambiente WHERE idambiente = '".$intIdAmbiente."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	function select(){
		$sql = "SELECT ambiente.idambiente, ambiente.ambiente, CASE WHEN ambiente.especializado = 1 THEN 'SI' ELSE 'NO' END AS especializado, ambiente.observacion, sede.sede FROM ambiente INNER JOIN sede ON ambiente.sedeid = sede.idsede ORDER BY idambiente";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
}