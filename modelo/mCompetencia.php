<?php

class mCompetencia{

	function mCompetencia(){}

	function insert(){}

	function update(){}

	function delete(){}

	function SelPrograma(){
		$sql = "SELECT idprograma, programa from programa";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}


}
?>