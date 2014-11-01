<?php

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

	function select(){
		$sql = "SELECT  p.idprograma, p.programa, p.version, p.areaid, a.area FROM programa AS p LEFT JOIN area AS a ON a.idarea = p.areaid;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	
	function validaPrograma($idprograma){
		$valida = "SELECT idprograma from programa where idprograma = '".$idprograma."'";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($valida, 0);
		return $data;
	}

	function selEditar($idprograma){
		$sql = "SELECT  idprograma, programa, version, areaid FROM programa WHERE idprograma = '".$idprograma."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
}