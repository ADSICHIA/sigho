<?php
include ("controlador/conexion.php");
$perfilusu = $_SESSION["perfil"];

class mMenu{
	var $result;

	function mMenu(){}
	function cons($c){
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$this->result=$conexionBD->ejeCon($c,0);
	}
	function getMenus(){ 
		if($_SESSION["perfil"]==2){
		$sql ="SELECT menu.idmenu, menu.menu, menu.menuid, menu.href, menu.icono, menu.visible, permiso.perfilid, permiso.menuid FROM menu inner join permiso on menu.idmenu = permiso.menuid where permiso.activo = 1"; 
				$this->cons($sql);
			return $this->result;

		}else{	$sql = "SELECT idmenu, menu, menuid, href, icono, visible 
				FROM menu 
				WHERE visible='1' and menuid is null";
		$this->cons($sql);
		return $this->result;
		}
	}
	function getSubMenus($idMenu){
		if($_SESSION["perfil"]===2){
		$sql ="SELECT menu.idmenu, menu.menu, menu.menuid, menu.href, menu.icono, menu.visible, permiso.perfilid, permiso.menuid 
       			FROM menu inner join permiso
				on menu.idmenu = permiso.menuid where visible='1' and menuid='$idMenu'"; 
				$this->cons($sql);
			return $this->result;

		}else{
		$sql = "SELECT idmenu, menu, menuid, href, icono, visible 
				FROM menu 
				WHERE visible='1' and menuid='$idMenu'";
		$this->cons($sql);
		return $this->result;
	}
	}
	
}
?>