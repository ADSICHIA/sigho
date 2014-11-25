<?php

//include("/controlador/conexion.php");

class mPrograma{
	function mPrograma(){
	}
	
	function insert($idprograma, $programa, $version, $areaid){
		$sql = "INSERT INTO programa(idprograma, programa, version, areaid) values ('".$idprograma."', '".$programa."', '".$version."', '".$areaid."');";
		$this->cons($sql);
	}
	
	function update($idprograma, $programa, $version, $areaid){
		$sql = "UPDATE programa SET idprograma = '".$idprograma."', programa = '".$programa."', version = '".$version."', areaid = '".$areaid."'";
		$sql .=" WHERE idprograma = '".$idprograma."';";
		$this->cons($sql);
	}
	
	function delete ($idprograma){
		$sql = "DELETE FROM programa WHERE idprograma = '".$idprograma."'";
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
		$sql = "SELECT p.idprograma, p.programa, p.version, p.areaid, a.area FROM programa AS p LEFT JOIN area AS a ON a.idarea = p.areaid;";
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

	function validaFicha($idprograma){
		$sql = "SELECT count(programaid) as resultado from ficha where programaid = '".$idprograma."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	function validaCompetencia($idprograma){
		$sql = "SELECT count(programaid) as resultado from competencia where programaid = '".$idprograma."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	function selpro2($filtro,$rvalini,$rvalfin){
		$sql = "SELECT idprograma, programa, version, areaid FROM programa";
		if($filtro)
				$sql.= " WHERE idprograma LIKE '%".$filtro."%'";
		$sql.= " ORDER BY idprograma LIMIT ".$rvalini.", ".$rvalfin;
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
}