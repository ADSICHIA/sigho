<?php
//include ("controlador/conexion.php");
class mdisponi{
	var $arr;
	function mdisponi(){}
	
	function insertdispo($jornadaid,$usuarioid,$dia,$disponible,$grupoid){
	        $sql = "INSERT INTO disponiblidad(jornadaid,usuarioid,dia,disponible,grupoid)
		VALUES ('".$jornadaid."','".$usuarioid."', '".$dia."','".$disponible."','".$grupoid."');";
		$this->cons($sql);
                
       	}
        
	function deldisponi($usuarioid){
		$sql = "DELETE  FROM disponiblidad WHERE usuarioid='".$usuarioid."';";
		$this->cons($sql);
	}

	function cons($c){
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	}

	function seldisponi($usuario){
		$sql = "SELECT iddisponiblidad, jornadaid, usuarioid, dia, disponible
                FROM disponiblidad
                WHERE usuarioid='".$usuario."'";
                
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

       
	function selusuario(){
		$sql = "SELECT idusuario, nombres, apellidos FROM usuario;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	function selgrupo(){
		$sql = "SELECT idgrupo, grupo FROM grupo where agendado=0;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	
        function seldias(){
		$sql = "SELECT idvalor, valor FROM valor WHERE parametroid = 4;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
        
        function seljornadas(){
		$sql = "SELECT idjornada,jornada,hora_inicio,hora_fin,horas FROM jornada;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
        
        
        }
?>