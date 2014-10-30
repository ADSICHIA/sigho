<?php

//include("/controlador/conexion.php");

class mFicha{
	function mFicha(){
	}
	
	function insert($idficha ,  $fecha_inicio ,  $fecha_fin , $oferta ,  $programaid ,  $jornadaid , $cant_aprendices){
		$sql = "INSERT INTO  ficha (idficha ,  fecha_inicio ,  fecha_fin ,  oferta ,  programaid ,  jornadaid ,  cant_aprendices ) VALUES ('".$idficha."', '".$fecha_inicio."', '".$fecha_fin."', '".$oferta."', '".$programaid."', '".$jornadaid."', '".$cant_aprendices."');";
		$this->cons($sql);
	}
	
	function update($idficha ,  $fecha_inicio ,  $fecha_fin , $oferta ,  $programaid ,  $jornadaid , $cant_aprendices){
		$sql = "UPDATE ficha SET idficha = '".$idficha."', fecha_inicio = '".$fecha_inicio."', fecha_fin = '".$fecha_fin."', oferta = '".$oferta."', programaid = '".$programaid."',";
		$sql .="jornadaid = '".$jornadaid."', cant_aprendices = '".$cant_aprendices."' WHERE idficha = '".$idficha."';";
		$this->cons($sql);
	}
	
	function delete ($idficha){
		$sql = "DELETE FROM ficha WHERE idficha = '".$idficha."';";
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

	function validaFicha($idficha){
		$valida = "SELECT idficha from ficha where idficha = '".$idficha."'";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($valida, 0);
		return $data;
	}

	function selOferta(){
		$sql = "SELECT idvalor, valor from valor WHERE parametroid = 5";
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