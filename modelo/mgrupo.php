<?php
include_once("controlador/conexion.php");
class mgrupo{
	var $arr;
	function mgrupo(){}
	
	
	function cons($c){
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	}
     
        //usuada
        function seldirector(){
		$sql = "SELECT  * FROM usuario WHERE perfilid='2' ";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
        //usuada
        function selambiente(){
		$sql = "SELECT  * FROM ambiente";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
         //usuada
        function insgrupo($nombregr ,$director , $ambiente){
		$sql = "INSERT INTO `grupo`(`grupo`, `director`, `ambienteid`) VALUES ('".$nombregr."','". $director."','". $ambiente."');";
		$this->cons($sql);
	}
      

       //usuada
        function selgrupo(){
		 $sql = "SELECT gr.idgrupo,gr.grupo,gr.agendado,gr.vigente ,usu.nombres,usu.apellidos,am.ambiente FROM `grupo` as gr inner join usuario as usu on gr.director=usu.idusuario inner join ambiente as am on gr.ambienteid=am.idambiente order by gr.idgrupo desc";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
        //usada
        function cambiar1($numero , $idgrupo){
		$sql = "UPDATE grupo SET vigente='".$numero."'WHERE idgrupo ='".$idgrupo."';";
		$this->cons($sql);
	}
         //usada
        function cambiar2($numero , $idgrupo){
		$sql = "UPDATE grupo SET vigente='".$numero."'WHERE idgrupo ='".$idgrupo."';";
		$this->cons($sql);
	}
         //usuada
        function  selgrupo1($idgrupo){
		$sql = "SELECT * from grupo WHERE idgrupo='".$idgrupo."'; ";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
         //usada
        function upgrupo($idgrupo,$nombregr ,$director , $ambiente){
		$sql = "UPDATE grupo SET grupo='".$nombregr."',director='".$director."',ambienteid='".$ambiente."'   WHERE idgrupo ='".$idgrupo."';";
		$this->cons($sql);
	}
        //usada
        function selhorario($idgrupo){
		$sql = "SELECT * FROM `horario` WHERE grupoid ='".$idgrupo."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
        //usada
        function selficha($idgrupo){
                $sql = "SELECT * FROM `ficha_grupo` WHERE grupoid ='".$idgrupo."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
   
        function  delgrupo($idgrupo){
		$sql =  "DELETE FROM grupo WHERE idgrupo='".$idgrupo."';";
		$this->cons($sql);
	}
     
        } 
?>
