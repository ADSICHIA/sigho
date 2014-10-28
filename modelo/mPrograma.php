<?php

//include("/controlador/conexion.php");

class mPrograma{
	function mPrograma(){
	}
	
	function insert($idprograma, $programa, $version, $areaid){
		$valida = "SELECT idprograma from porgrama where idprograma = '".$idprograma."'";
		if ($valida){
			$mensajeresultado = "El Programa ya existe";
			return $mensajeresultado;
		}
		$sql = "INSERT INTO programa(idprograma, programa, version, areaid) values ('".$idprograma."', '".$programa."', '".$version."', '".$areaid."');";
	}
	
	function update($idprograma, $programa, $version, $areaid){
		$sql = "UPDATE programa SET idprograma = '".$idprograma."', programa = '".$programa."', version = '".$version."', areaid = '".$areaid."'";
		$sql .=" WHERE idprograma = '".$idprograma."';";
		$this->cons($sql);
	}
	
	function delete ($idprograma){
		$sql = "DELETE * FROM programa WHERE idprograma = '".$idprograma."';";
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
		$sql = "SELECT  idprograma, programa, version, areaid FROM programa;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	/*
	function InsertaTipo($pago){
		$sql = "INSERT INTO valor (descripcion, idparametro) VALUES ('".$pago."', 1);";
		$this->cons($sql);
	}
	function selTipo (){
		$sql = "SELECT idValor, descripcion FROM valor where idParametro = 1;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	*/
}