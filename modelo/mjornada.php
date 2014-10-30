<?php
include_once("controlador/conexion.php");

class mjornada{
    
    function mjornada(){}
    
    function inserjornada($jornada, $horaini, $horafin, $canti){
        $sql = "INSERT INTO jornada (jornada, hora_inicio, hora_fin, horas) VALUES ('".$jornada."','". $horaini."','". $horafin."','".$canti."');";
        $this->cons($sql);
      
    }
    
    function cons($c){
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
    }
    
    function seljornada(){
		$sql = "SELECT jornada, hora_inicio, hora_fin from jornada;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
    }
    
    function seledit($pr){
        $sql = "SELECT * from jornada where idjornada='".$pr."';";
	$conexionBD = new conexion();
	$conexionBD->conectarBD();
	$data = $conexionBD->ejeCon($sql,0);
	return $data;
    }
}



?>
