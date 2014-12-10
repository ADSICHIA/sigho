<?php
include_once ("controlador/conexion.php");
class mfichacomp{
	
	function mfichacomp(){}

	function inscofi($fichacomp,$sp){
		$sql="INSERT INTO ficha_competencia(fichaid,competenciaid) VALUES ('".$sp."','".$fichacomp."');";
		$this->cons($sql);
	}
		
	function selpara(){
		$sql = "SELECT * FROM competencia_programa ORDER BY denominacion ;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	function selcomp(){
		$sql = "SELECT denominacion, id_competencia FROM competencia_programa ORDER BY id_competencia DESC;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	function selficha(){
		$sql = "SELECT * FROM ficha;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	

	function selhorario($sp){
		$sql = "SELECT * FROM competencia ;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}


	function actuorden($orde,$id_es,$r){
		$sql = "UPDATE estacion_ruta SET orden='".$orde."' WHERE id_ruta='".$r."' AND id_estacion='".$id_es."';";
		$this->cons($sql);
	}

	
	function cons($c){
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	}

}
?>