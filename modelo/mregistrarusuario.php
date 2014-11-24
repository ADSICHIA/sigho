<?php
//include("controlador/conexion.php");
class mregistrarusuario{
	var $arr;

	function mregistrarusuario(){}


	function insertar($tipo_documento,$horas_formacion,$nivel_formacion,$identificacion,$email_sena,$email_misena,$email,$celular,$telefono,$direccion,$municipioid,$nombres,$apellidos,$clave,$fecha_documento,$fecha_expiracion,$perfilid,$genero){
		$sql = "INSERT INTO usuario (tipo_documento,identificacion,horas_formacion,nivel_formacion,email_sena,email_misena,email,celular,telefono,direccion,municipioid,nombres,apellidos,clave,fecha_documento,fecha_expiracion,perfilid,genero) values
		('".$tipo_documento."','".$identificacion."','".$nivel_formacion."','".$horas_formacion."','".$email_sena."','".$email_misena."','".$email."','".$celular."','".$telefono."','".$direccion."','".$municipioid."','".$nombres."','".$apellidos."','".$clave."','".$fecha_documento."','".$fecha_expiracion."','".$perfilid."','".$genero."');";
		$this->cons($sql);
	
		

	}
	function getValor($parametroId){
		$sql = "SELECT idvalor, valor, editable, parametroid FROM valor WHERE parametroid='$parametroId'";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	function actua($tipo_documento,$identificacion,$fecha_documento,$fecha_expiracion,$nombres,$apellidos,$email_sena,$email_misena,$email,$celular,$telefono,$direccion,$genero,$perfilid,$municipioid,$clave,$horas_formacion,$nivel_formacion,$idusuario){
		$sql = "UPDATE usuario SET tipo_documento='".$tipo_documento."',identificacion='".$identificacion."',nivel_formacion='".$nivel_formacion."',horas_formacion='".$horas_formacion."',email_sena='".$email_sena."',email_misena='".$email_misena."',email='".$email."',celular='".$celular."',telefono='".$telefono."',direccion='".$direccion."',municipioid='".$municipioid."',nombres='".$nombres."',apellidos='".$apellidos."',clave='".$clave."',fecha_documento='".$fecha_documento."',fecha_expiracion='".$fecha_expiracion."',perfilid='".$perfilid."',genero='".$genero."' WHERE idusuario='".$idusuario."';";
		$this->cons($sql);
		
	}
	function eliminar($idusuario){
		$sql = "DELETE FROM usuario WHERE idusuario='".$idusuario."'";
		$this->cons($sql);
	}

	
	function cons($c){
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	
	}
	function parametro(){
		$sql = "SELECT idvalor, valor, editable, parametroid FROM valor WHERE parametroid=2";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	function seleccionar(){
		$sql = "SELECT v.idusuario,v.tipo_documento,v.identificacion,v.horas_formacion,v.nivel_formacion,v.email_sena,v.email_misena,";
		$sql .= "v.email,v.celular,v.telefono,v.direccion,v.municipioid,v.nombres,v.apellidos,v.clave,v.fecha_documento,v.fecha_expiracion,";
		$sql .= "v.perfilid, v.genero , (SELECT valor FROM valor WHERE v.genero = idvalor)genero , (SELECT valor FROM valor WHERE v.tipo_documento = idvalor)cedula";
		$sql .= ", (SELECT perfil FROM perfil WHERE v.perfilid = idperfil)perfil , m.municipio FROM usuario AS v, municipio AS m WHERE v.municipioid=m.idmunicipio ";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	function editar($idusuario){
		$sql = "SELECT idusuario,tipo_documento,identificacion,horas_formacion,nivel_formacion,email_sena,email_misena,";
		$sql .= "email,celular,telefono,direccion,municipioid,nombres,apellidos,clave,fecha_documento,fecha_expiracion,";
		$sql .= "perfilid, genero FROM usuario WHERE idusuario='".$idusuario."'";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	function genero(){
		$sql = "SELECT idvalor, valor, editable, parametroid FROM valor WHERE parametroid=3";
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
		$sql = "SELECT iddepartamento, departamento FROM departamento";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	function municipio(){
		$sql = "SELECT idmunicipio, municipio FROM municipio";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	
}
?>