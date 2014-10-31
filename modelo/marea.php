<?php

//include("/controlador/conexion.php");

class marea{
	function marea(){
	}
	
	function insert($area , $usuarioid){
		$sql = "INSERT INTO  area ( area ,  usuarioid ) VALUES('".$area."', '".$usuarioid."');";
		$this->cons($sql);
	}
	
	function update($area , $usuarioid){
		$sql = "UPDATE area SET area = '".$area."', usuarioid = '".$usuarioid."';";
		$this->cons($sql);
	}
	
	function delete ($idarea){
		$sql = "DELETE FROM area WHERE idarea = '".$idarea."';";
		$this->cons($sql);
	}
	
	function cons($c){
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	}

	function selArea(){
		$sql = "SELECT a.idarea, a.area, a.usuarioid, u.nombres, u.apellidos FROM area as a inner join usuario as u on a.usuarioid = u.idusuario;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	function validaArea($area){
		$sql = "SELECT area FROM area WHERE area = '".$area."'";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	function selUsuario( ){
		$sql = "SELECT usuario.idusuario, usuario.nombres, usuario.apellidos FROM usuario";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
}