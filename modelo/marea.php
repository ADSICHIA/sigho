<?php

//include("/controlador/conexion.php");

class mPrograma{
	function mPrograma(){
	}
	
	function insert($area , $usuarioid){
		$sql = "INSERT INTO  area ( idarea ,  area ,  usuarioid ) VALUES('".$area."', '".$usuarioid."');";
		$this->cons($sql);
	}
	
	function update($idprograma, $programa, $version, $areaid){
		$sql = "UPDATE programa SET idprograma = '".$idprograma."', programa = '".$programa."', version = '".$version."', areaid = '".$areaid."'";
		$sql .=" WHERE idprograma = '".$idprograma."';";
		$this->cons($sql);
	}
	
	function delete ($idarea){
		$sql = "DELETE * FROM area WHERE idarea = '".$idarea."';";
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
		$sql = "SELECT * FROM ficha;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}


	function selUsuario( ){
		$sql = "SELECT usuario.idusuario, usuario.nombres, usuario.apellidos, area.idarea, area.usuarioid FROM usuario INNER JOIN area on idusuario=usuarioid";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
}