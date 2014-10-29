<?php
include ("../controlador/conexion.php");
class mregistrarusuario{
	var $arr;
	function mregistrarusuario(){}
	function parametro(){
		$sql = "SELECT idvalor, valor, editable, parametroid FROM valor WHERE parametroid=1";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	function genero(){
		$sql = "SELECT idvalor, valor, editable, parametroid FROM valor WHERE parametroid=2";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	function perfil(){
		$sql = "SELECT idperfil, perfil, activo FROM perfil";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	function departamento(){
		$sql = "SELECT iddepartamento, departamento FROM departamento;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	
}
?>