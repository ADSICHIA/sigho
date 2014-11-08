<?php

//include("/controlador/conexion.php");

class marea{
	function marea(){
	}
	
	function insert($area , $usuarioid){
		$sql = "INSERT INTO  area ( area ,  usuarioid ) VALUES('".$area."', '".$usuarioid."');";
		$this->cons($sql);
	}
	
	function update($idarea, $area , $usuarioid){
		$sql = "UPDATE area SET area = '".$area."', usuarioid = '".$usuarioid."' where idarea = '".$idarea."';";
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

	function selEditar($idarea){
		$sql = "SELECT  idarea, area, usuarioid FROM area WHERE idarea = '".$idarea."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
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

	function validaPrograma($areaid){
		$sql = "SELECT idprograma FROM programa WHERE areaid = '".$areaid."'";
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

	function selArea2($filtro,$rvalini,$rvalfin){
		$sql = "SELECT a.idarea, a.area, a.usuarioid, u.nombres, u.apellidos FROM area as a inner join usuario as u on a.usuarioid = u.idusuario";
		if($filtro)
				$sql.= " WHERE a.area LIKE '%".$filtro."%'";
		$sql.= " ORDER BY a.idarea LIMIT ".$rvalini.", ".$rvalfin;
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
}