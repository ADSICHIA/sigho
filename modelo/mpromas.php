<?php
//include("/controlador/conexion.php");
class mpromas{
	var $arr;
	
	function mpromas(){}
	function inspro($idprograma, $programa, $version, $areaid){
		//INSERT INTO programa(idprograma, programa, version, areaid) VALUES ([value-1],[value-2],[value-3],[value-4])
		$sql = "INSERT INTO programa(idprograma, programa, version, areaid) VALUES ('$idprograma', '$programa', '$version', '$areaid');";
		$this->cons($sql);
	}
	
	function updpro($idprograma, $programa, $version, $areaid){
		$sql = "UPDATE programa SET programa='$programa',version='$version',areaid='$areaid' WHERE idprograma='$idprograma';";
		$this->cons($sql);
	}
	function cons($c){
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	}
	function selpro($idprograma){
		$sql = "SELECT count(idprograma) AS cp FROM programa WHERE idprograma='$idprograma'";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
}
?>