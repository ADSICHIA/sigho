<?php
include_once  ("controlador/conexion.php");
class msede{
	
	function msede(){}
	
	
	function mantenimiento($act,$pr){
		$sql = "UPDATE sede SET estado='".$act."' WHERE idsede='".$pr."';";
		$this->cons($sql);
	}
	
	
	function delsede($del){
		$sql = "DELETE FROM sede WHERE idsede='".$del."';";
		$this->cons($sql);
	}

	function insede($nomsede, $direccion , $telefono,$municipio){
		$sql = "INSERT INTO sede(idsede,sede, direccion, telefono, municipioid) VALUES ('','".$nomsede."','".$direccion."','".$telefono."','".$municipio."');";
		$this->cons($sql);
	}
	function upsede($nomsede, $direccion , $telefono,$municipio,$pr){
		$sql = "UPDATE sede SET sede='".$nomsede."', direccion='".$direccion."', telefono='".$telefono."', municipioid='".$municipio."' WHERE idsede='".$pr."';";
		$this->cons($sql);
	}

	function selsedeupd($pr){
		$sql = "SELECT * FROM sede WHERE idsede='".$pr."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	function selmuni(){
		$sql = "SELECT * FROM municipio";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	function selesedes(){
		$sql = "SELECT * FROM sede ORDER by idsede DESC";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;

	}

	 function selencfiltro($filtro,$rvalini,$rvalfin){
		$sql = "SELECT es.id_estacion,es.nombre,es.ubicacion,es.descripcion,es.mantenimiento,es.tipo_parada,tr.nombre as tronca FROM estacion as es 
INNER JOIN troncal as tr
ON es.id_troncal=tr.id_troncal ";
		if($filtro)
			$sql.= " WHERE es.nombre LIKE '%".$filtro."%'";
		$sql .= "  ORDER BY es.id_estacion DESC LIMIT ".$rvalini.", ".$rvalfin;
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	
	function cons($c){
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	}

}
?>