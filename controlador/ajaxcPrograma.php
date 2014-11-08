<?php
include_once("conexion.php");
$datos=$_POST["ficha"];
$validar=validaPrograma($datos);
if(!is_null($validar) && count($validar)==1){
	echo "El programa con ficha ".$datos." ya existe";
	//echo json_encode($result);
}else{

}
 function validaPrograma($idprograma){
		$valida = "SELECT idprograma from programa where idprograma = '".$idprograma."'";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($valida, 0);
		return $data;
	}
	function cons($c){
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$this->result=$conexionBD->ejeCon($c,0);
		//=$conexionBD->resultado;
	}
?>