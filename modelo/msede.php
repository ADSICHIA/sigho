<?php
include_once  ("controlador/conexion.php");
class msede{
	
	function msede(){}
	
	
	function mantenimiento($act,$doc){
		$sql = "UPDATE estacion SET mantenimiento='".$act."' WHERE id_estacion='".$doc."';";
		$this->cons($sql);
	}
	
	
	function delesta($del){
		$sql = "DELETE FROM estacion WHERE id_estacion='".$del."';";
		$this->cons($sql);
	}

	function insede($nomsede, $direccion , $telefono,$municipio){
		$sql = "INSERT INTO sede(idsede,sede, direccion, telefono, municipioid, `estado`) VALUES ('','".$nomsede."','".$direccion."','".$telefono."','".$municipio."');";
		$this->cons($sql);
	}
	function updesta($id_estacion,$nomesta,$ubicacion, $descripcion ,$parada,$troncal){
		$sql = "UPDATE estacion SET nombre='".$nomesta."', ubicacion='".$ubicacion."', descripcion='".$descripcion."', tipo_parada='".$parada."', id_troncal='".$troncal."' WHERE id_estacion='".$id_estacion."';";
		$this->cons($sql);
	}
	function selestaupd($pr){
		$sql = "SELECT id_estacion,nombre,ubicacion,descripcion,mantenimiento FROM estacion WHERE id_estacion='".$pr."';";
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