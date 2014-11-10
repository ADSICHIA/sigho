<?php

class mCompetencia{

	function mCompetencia(){}

	function insert($usuarioid, $programaid, $calificado){
		$sql = "INSERT INTO competencia(usuarioid, programaid, calificado) VALUES ('".$usuarioid."', '".$programaid."', '".$calificado."');";
		$this->cons($sql);
	}

	function update(){}

	function delete(){}

	function SelPrograma(){
		$sql = "SELECT idprograma, programa from programa";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	function select(){
		$sql = "SELECT c.idcompetencia, c.usuarioid, c.programaid, c.calificado, u.nombres, u.apellidos, p.programa from competencia as c ";
		$sql .="inner join usuario as u on c.usuarioid = u.idusuario";
		$sql .= "inner join programa as p on c.programaid = p.programaid";
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
?>

