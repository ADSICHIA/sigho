<?php
include ("controlador/conexion.php");
class mSeguridad{
	var $result;
	function mSeguridad(){}
	function cons($c){
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$this->result=$conexionBD->ejeCon($c,0);
		//=$conexionBD->resultado;
	}
	function validarUsuario($user){
		$sql = "SELECT idusuario, identificacion, email_sena,
						 email_misena, email, celular, telefono, 
						 direccion, municipioid, nombres, apellidos, 
						 nivel_formacion, tipo_documento, clave, 
						 fecha_documento, fecha_expiracion, perfilid, 
						 horas_formacion, genero FROM usuario 
						 WHERE identificacion='$user'";

		$this->cons($sql);
		$result=$this->result;
		//var_dump($result);
		return $result;
	}
}
?>