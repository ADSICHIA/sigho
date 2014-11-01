<?php
include("../controlador/conexion.php");
class modeloAmbiente{
	function modeloAmbiente(){
	}
	
	function insert ($intIdAmbiente,$strAmbiente,$boolEspecializado,$strObservacion,$intIdSede){
		$sql = "INSERT INTO programa(idambiente, ambiente, especializado, observacion, areaid) VALUES ('".$intIdAmbiente."', '".$strAmbiente."', '".$boolEspecializado."', '".$strObservacion."','".$intIdSede."');";
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

	function selArea(){
		$sql = "SELECT idarea, area FROM area;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	
	function validaPrograma($intIdAmbiente){
		$valida = "SELECT idambiente from ambiente where idambiente = '".$intIdAmbiente."'";
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
}