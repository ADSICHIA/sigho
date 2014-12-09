<?php
//include("/controlador/conexion.php");
class mprocompetencia{
	var $arr;
	
	function mprocompetencia(){}

	function inscom($idcompetencia, $denominacion, $cantidad, $programaid){
		//INSERT INTO programa(idprograma, programa, version, areaid) VALUES ([value-1],[value-2],[value-3],[value-4])
		$sql = "INSERT INTO competencia_programa(id_competencia, denominacion, cantidad_horas, programaid) VALUES ('$idcompetencia', '$denominacion', '$cantidad', '$programaid');";
		$this->cons($sql);
	}
	
	function insres($idresultado, $resultado, $id_competencia){
		$sql = "INSERT INTO resultados(id_resultado,resultado,idcompetencia) VALUES ('$idresultado', '$resultado', '$id_competencia');";
		$this->cons($sql);
	}
	
	function updcom($idcompetencia, $denominacion, $cantidad, $programaid){
		$sql = "UPDATE competencia_programa SET denominacion='$denominacion',cantidad_horas='$cantidad',programaid='$programaid' WHERE 	id_competencia='$idcompetencia';";
		$this->cons($sql);
	}
	
	function updres($idresultado, $resultado, $id_competencia){
		$sql = "UPDATE resultados SET resultado='$resultado',idcompetencia='$id_competencia' WHERE id_resultado='$idresultado';";
		$this->cons($sql);
	}

	function cons($c){
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	}
	function selcompe($idcompetencia){
		$sql = "SELECT count(id_competencia) AS cp FROM competencia_programa WHERE id_competencia='$idcompetencia'";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	function selres($idresul){
		$sql = "SELECT count(id_resultado) AS cp FROM resultados WHERE id_resultado='$idresul'";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
}
?>