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
	
	function insfic($idficha, $fecha_inicio, $fecha_fin, $oferta, $programaid, $jornadaid, $cant_aprendices){
		$sql = "INSERT INTO ficha(idficha, fecha_inicio, fecha_fin, oferta, programaid, jornadaid, cant_aprendices) VALUES ('$idficha', '$fecha_inicio', '$fecha_fin', '$oferta', '$programaid', '$jornadaid', '$cant_aprendices');";
		$this->cons($sql);
	}
	
	function updpro($idprograma, $programa, $version, $areaid){
		$sql = "UPDATE programa SET programa='$programa',version='$version',areaid='$areaid' WHERE idprograma='$idprograma';";
		$this->cons($sql);
	}
	
	function updfic($idficha, $fecha_inicio, $fecha_fin, $oferta, $programaid, $jornadaid, $cant_aprendices){
		$sql = "UPDATE ficha SET fecha_inicio='$fecha_inicio',fecha_fin='$fecha_fin',oferta='$oferta', programaid='$programaid',jornadaid='$jornadaid',cant_aprendices='$cant_aprendices' WHERE idficha='$idficha';";
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

	function selfic($idficha){
		$sql = "SELECT count(idficha) AS cp FROM ficha WHERE idficha='$idficha'";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
}
?>