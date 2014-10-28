<?php

//include("/controlador/conexion.php");

class mPrograma{
	function mPrograma(){
	}
	
	function insert($idficha ,  $fecha_inicio ,  $fecha_fin , $oferta ,  $programaid ,  $jornadaid , $cant_aprendices){
		$sql = "INSERT INTO  ficha (idficha ,  fecha_inicio ,  fecha_fin ,  oferta ,  programaid ,  jornadaid ,  cant_aprendices ) VALUES ('".$idficha."', '".$fecha_inicio."', '".$fecha_fin."', '".$oferta."', '".$programaid."', '".$jornadaid."', '".$cant_aprendices."');";
		$this->cons($sql);
	}
	
	function update($idprograma, $programa, $version, $areaid){
		$sql = "UPDATE programa SET idprograma = '".$idprograma."', programa = '".$programa."', version = '".$version."', areaid = '".$areaid."'";
		$sql .=" WHERE idprograma = '".$idprograma."';";
		$this->cons($sql);
	}
	
	function delete ($idficha){
		$sql = "DELETE * FROM ficha WHERE idficha = '".$idficha."';";
		$this->cons($sql);
	}
	
	function cons($c){
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	}

	function selPrograma(){
		$sql = "SELECT idprograma, programa FROM programa;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	function select(){
		$sql = "SELECT * FROM ficha;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	function selJornada(){
		$sql = "SELECT idjornada, jornada FROM jornada;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	function selJornadaid( ){
		$sql = "SELECT ficha.idficha, ficha.jornadaid, jornada.idjornada, jornada.jornada FROM jornada INNER JOIN ficha on idjornada=jornadaid";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

}