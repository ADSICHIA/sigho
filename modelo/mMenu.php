<?php
include ("controlador/conexion.php");
class mMenu{
	var $result;
	function mMenu(){}
	function cons($c){
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$this->result=$conexionBD->ejeCon($c,0);
	}
	function getMenus(){
		$sql = "SELECT idmenu, menu, menuid, href, icono, visible 
				FROM menu 
				WHERE visible='1' and menuid is null";
		$this->cons($sql);
		return $this->result;
		
	}
	function getSubMenus($idMenu){
		$sql = "SELECT idmenu, menu, menuid, href, icono, visible 
				FROM menu 
				WHERE visible='1' and menuid='$idMenu'";
		$this->cons($sql);
		return $this->result;
	}
	
}
?>