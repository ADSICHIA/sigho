<?php

class mCompetencia{

	function mCompetencia(){}

	function insert($usuarioid, $programaid, $calificado){
		$sql = "INSERT INTO competencia(usuarioid, programaid, calificado) VALUES ('".$usuarioid."', '".$programaid."', '".$calificado."');";
		$this->cons($sql);
	}
        function insert1($usuarioid, $programaid, $calificado,$competencia,$resultado){
		$sql = "INSERT INTO competencia(usuarioid, programaid, calificado,competenciaid,resultadoid) VALUES ('".$usuarioid."', '".$programaid."', '".$calificado."', '".$competencia."','".$resultado."');";
		$this->cons($sql);
	}

	function update($idcompetencia, $calificado){
		$sql = "UPDATE competencia SET calificado = '".$calificado."' WHERE idcompetencia = '".$idcompetencia."';";
		$this->cons($sql);
	}

	function delete($idcompetencia){
		$sql = "DELETE FROM competencia WHERE idcompetencia = '".$idcompetencia."';";
		$this->cons($sql);
	}

	function SelPrograma(){
		$sql = "SELECT p.idprograma, p.programa from programa as p left join competencia as c on p.idprograma = c.programaid  order by p.programa ASC";
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

	function selCom($filtro,$rvalini,$rvalfin){
			$sql = "SELECT c.idcompetencia, c.usuarioid, c.programaid, c.calificado, u.nombres, u.apellidos, p.programa from competencia as c ";
			$sql .="inner join usuario as u on c.usuarioid = u.idusuario ";
			$sql .= "inner join programa as p on c.programaid = p.idprograma ";
			$sql .= "where c.usuarioid=".$_SESSION["idUser"];
			if($filtro)
					$sql .= " and programa LIKE '%".$filtro."%'";
			$sql.= " ORDER BY idcompetencia LIMIT ".$rvalini.", ".$rvalfin;
			//echo $sql;
			$conexionBD = new conexion();
			$conexionBD->conectarBD();
			$data = $conexionBD->ejeCon($sql,0);
			return $data;
	}

	function selEditar($idcompetencia){
		$sql = "SELECT c.idcompetencia, c.usuarioid, c.programaid, c.calificado, u.nombres, u.apellidos, p.programa from competencia as c ";
		$sql .="inner join usuario as u on c.usuarioid = u.idusuario ";
		$sql .= "inner join programa as p on c.programaid = p.idprograma ";
		$sql .=	" WHERE idcompetencia = '".$idcompetencia."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

}
?>

