<?php
//include ("controlador/conexion.php");
class mcontra{
	var $arr;
	
	function mcontra(){}

	function cons($c){
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	}

	function Duplicidad($ndocumento){
		$sql = "SELECT count(ndocapre) as total FROM aprendiz WHERE ndocapre='".$ndocumento."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data[0]["total"];
	}

	function UpDate($clave, $identificacion){
		$sql = "UPDATE usuario SET clave='".$clave."' WHERE identificacion='".$identificacion."';";
		// echo $sql;
		$this->cons($sql);
	}


	function selContra($identificacion){
	$sql = "SELECT clave, identificacion FROM usuario WHERE identificacion='".$identificacion."';";
	$conexionBD = new conexion();
	$conexionBD->conectarBD();
	$data = $conexionBD->ejeCon($sql,0);
	return $data;
	}
}



?>