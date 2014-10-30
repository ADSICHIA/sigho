<?php
	//include ("controlador/conexion.php");


class mparametro{
	var $arr;
	function mparametro(){}
	
	function inspar($nompar, $edit)
	{
		$sql = "INSERT INTO parametro (parametro, editable) VALUES ('".$nompar."','".$edit."');";
		$this->cons($sql);
	}
	function insval($nomval, $edit, $codpar)
	{
		$sql = "INSERT INTO valor ( valor , editable,  parametroid) values ('".$nomval."', '".$edit."', '".$codpar."');";
		$this->cons($sql);
	}
	function delpar($codpar)
	{
		$sql = "DELETE FROM parametro WHERE idparametro='".$codpar."';";
		$this->cons($sql);
	}
	function delval($codval)
	{
		$sql = "DELETE FROM valor WHERE idvalor='".$codval."';";
		$this->cons($sql);
	}
	function updpar($codpar, $nompar, $edit)
	{
		$sql = "UPDATE parametro SET parametro='".$nompar."', editable='".$editable."' WHERE idparametro='".$codpar."';";
		$this->cons($sql);
	}
	function cons($c)
	{
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	}
	function selpar()
	{
		$sql = "SELECT idparametro, parametro, editable FROM parametro;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	function selval(){
		$sql = "SELECT valor.idvalor, valor.valor, valor.parametroid, parametro.parametro FROM valor, parametro;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	function selpar1($codpar)
	{
		$sql = "SELECT idparametro, parametro, editable FROM parametro WHERE idparametro='".$codpar."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	function selval2($codval)
	{
		$sql = "SELECT idvalor, valor, editable, parametroid FROM valor WHERE idvalor='".$codval."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	function selval1()
	{
		$sql = "SELECT valor.idvalor, valor.valor, valor.parametroid, parametro.parametro FROM valor, parametro WHERE valor.parametroid= parametro.idparametro;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
		
	function updval($codval, $nomval, $edit, $codpar)
	{
		$sql = "UPDATE valor SET valor='".$nomval."' , editable='".$edit."', parametroid='".$codpar."' WHERE idvalor='".$codval."';";
		$this->cons($sql);
	}
}
?>