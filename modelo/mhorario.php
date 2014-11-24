<?php
include_once("controlador/conexion.php");
class mhorario{
	var $arr;
	function mhorario(){

	}

	function Agendar($grupo){
		$sql = "UPDATE grupo SET agendado='1' WHERE idgrupo='".$grupo."' ";
		$this->cons($sql);
	}
	function insertar($grupoid, $dia, $usuarioid, $jornadaid){
        $sql = "INSERT INTO horario (grupoid, dia, usuarioid, jornadaid) values ('".$grupoid."', '".$dia."', '".$usuarioid."', '".$jornadaid."');";
        $this->cons($sql);
	}
	function ReducirHoras($idusuario,$jornadaid,$key){
		$sql = "SELECT horas_formacion FROM usuario WHERE identificacion='".$idusuario."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		$respuesta=array();
		$resultado=array();
		for ($i=0; $i < count($data); $i++) { 
			$respuesta[$i] = $data[$i]['horas_formacion'];
			if ($jornadaid==1){
				$resultado[$i]=$respuesta[$i]-6;
				$slq = "UPDATE usuario SET horas_formacion='".$resultado[$i]."' WHERE identificacion='".$idusuario."';";
				$this->cons($slq);
			}else if ($jornadaid==2) {
				$resultado[$i]=$respuesta[$i]-5;
				$slq = "UPDATE usuario SET horas_formacion='".$resultado[$i]."' WHERE identificacion='".$idusuario."';";
				$this->cons($slq);
			}else if ($jornadaid==3){
				$resultado[$i]=$respuesta[$i]-4;
				$slq = "UPDATE usuario SET horas_formacion='".$resultado[$i]."' WHERE identificacion='".$idusuario."';";
				$this->cons($slq);
			}else if ($jornadaid==4){
				$resultado[$i]=$respuesta[$i]-8;
				$slq = "UPDATE usuario SET horas_formacion='".$resultado[$i]."' WHERE identificacion='".$idusuario."';";
				$this->cons($slq);
			}else if ($jornadaid==5){
				$resultado[$i]=$respuesta[$i]-6;
				$slq = "UPDATE usuario SET horas_formacion='".$resultado[$i]."' WHERE identificacion='".$idusuario."';";
				$this->cons($slq);
			}
		}
	}
	function seleccionArea(){
		$sql = "SELECT idarea, area, usuarioid FROM area;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	function seleccionJornada(){
		$sql = "SELECT idjornada, jornada, hora_inicio, hora_fin, horas FROM jornada ORDER BY jornada ASC";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	function seleccionHorario($jor, $grupo, $dia){
		$sql = "SELECT count(*) as total FROM horario WHERE jornadaid='".$jor."' AND grupoid='".$grupo."' AND dia='".$dia."' ";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		$data[0]["total"];
		return $data[0]["total"];
	}
	
    function cons($c){
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	}

	function Validacion($key, $grupoid){
		$sql = "SELECT usuarioid FROM horario WHERE grupoid='".$grupoid."' AND dia='".$key."' ";
		//echo $sql;
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data[0];
	}

	function QuitarHoras($profe, $jornada){
		$sql = "SELECT horas_formacion FROM usuario WHERE identificacion='".$profe."' ";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		$horas= array();
		for ($a=0; $a <count($data) ; $a++) { 
			if ($jornada==1) {
				$horas[$a] = $data[$a]['horas_formacion']+4;
				$slq = "UPDATE usuario SET horas_formacion='".$horas[$a]."' WHERE identificacion='".$profe."';";
				$this->cons($slq);
			}else if ($jornada==2) {
				$horas[$a] = $data[$a]['horas_formacion']+6;
				$slq = "UPDATE usuario SET horas_formacion='".$horas[$a]."' WHERE identificacion='".$profe."';";
				$this->cons($slq);
			}else if ($jornada==3) {
				$horas[$a] = $data[$a]['horas_formacion']+5;
				$slq = "UPDATE usuario SET horas_formacion='".$horas[$a]."' WHERE identificacion='".$profe."';";
				$this->cons($slq);
			}else if ($jornada==4) {
				$horas[$a] = $data[$a]['horas_formacion']+12;
				$slq = "UPDATE usuario SET horas_formacion='".$horas[$a]."' WHERE identificacion='".$profe."';";
				$this->cons($slq);
			}else if ($jornada==5) {
				$horas[$a] = $data[$a]['horas_formacion']+4;
				$slq = "UPDATE usuario SET horas_formacion='".$horas[$a]."' WHERE identificacion='".$profe."';";
				$this->cons($slq);
				if ($key==12) {
					$horas[$a] = $data[$a]['horas_formacion']+6;
					$slq = "UPDATE usuario SET horas_formacion='".$horas[$a]."' WHERE identificacion='".$profe."';";
					$this->cons($slq);
				}
			}

		}
	}

	function Actualizar($profe, $grupo, $dia, $jornada){
		$sql = "UPDATE horario SET usuarioid='".$profe."' WHERE dia='".$dia."' AND grupoid='".$grupo."' ";
		$this->cons($sql);
		$sql1 = "SELECT horas_formacion FROM usuario WHERE identificacion='".$profe."' ";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql1,0);
		$horas=array();
		for ($i=0; $i <count($data) ; $i++) { 
			if ($jornada==1) {
				$horas[$i] = $data[$i]['horas_formacion']-4;
				$slq2 = "UPDATE usuario SET horas_formacion='".$horas[$i]."' WHERE identificacion='".$profe."';";
				$this->cons($slq2);
			}else if ($jornada==2) {
				$horas[$i] = $data[$i]['horas_formacion']-6;
				$slq2 = "UPDATE usuario SET horas_formacion='".$horas[$i]."' WHERE identificacion='".$profe."';";
				$this->cons($slq2);
			}else if ($jornada==3) {
				$horas[$i] = $data[$i]['horas_formacion']-5;
				$slq2 = "UPDATE usuario SET horas_formacion='".$horas[$i]."' WHERE identificacion='".$profe."';";
				$this->cons($slq2);
			}else if ($jornada==4) {
				$horas[$i] = $data[$i]['horas_formacion']-12;
				$slq2 = "UPDATE usuario SET horas_formacion='".$horas[$i]."' WHERE identificacion='".$profe."';";
				$this->cons($slq2);
			}else if ($jornada==5) {
				$horas[$a] = $data[$a]['horas_formacion']-4;
				$slq = "UPDATE usuario SET horas_formacion='".$horas[$a]."' WHERE identificacion='".$profe."';";
				$this->cons($slq);
				if ($dia==12) {
					$horas[$a] = $data[$a]['horas_formacion']-6;
					$slq = "UPDATE usuario SET horas_formacion='".$horas[$a]."' WHERE identificacion='".$profe."';";
					$this->cons($slq);
				}
			}
		}
	}
	function getHorarioGrupo($id){
		$sql = "SELECT idhorario, 
						grupoid, 
						(Select valor from valor where idValor=dia) as diaSemana,
						dia, 
						(select hora_inicio from jornada where idjornada=jornadaid) as inicio,
						(select hora_fin from jornada where idjornada=jornadaid) as fin, 
						(SELECT CONCAT(nombres, ' ', apellidos) FROM usuario WHERE identificacion=usuarioid) As instructor,
						agendado 
						FROM horario 
						WHERE grupoid='$id'";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	function getDiaSuma($diaSemana){
		if($diaSemana=="Lunes"){
			return 0;
		}else if($diaSemana=="Martes"){
			return 1;
		}else if($diaSemana=="Miercoles"){
			return 2;
		}else if($diaSemana=="Jueves"){
			return 3;
		}else if($diaSemana=="Viernes"){
			return 4;
		}else if($diaSemana=="Sabado"){
			return 5;
		}else if($diaSemana=="Domingo"){
			return 6;
		}

	}

}
?>