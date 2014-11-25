<?php
include_once("controlador/conexion.php");
class mgrupoficha{
	var $arr;
	function mgrupoficha(){}
	
	
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
        function selgrupo($idgrupo){
		 $sql = "SELECT gr.grupo,gr.agendado,gr.vigente ,usu.nombres,usu.apellidos,am.ambiente FROM `grupo` as gr inner join usuario as usu on gr.director=usu.idusuario inner join ambiente as am on gr.ambienteid=am.idambiente WHERE gr.idgrupo ='".$idgrupo."'";
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
	 //usuada
        function  selfichas($idgrupo){
		$sql = "SELECT * from ficha_grupo WHERE grupoid='".$idgrupo."'; ";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	//usuada
        function  selficha1($idficha){
		$sql = "SELECT * from ficha WHERE idficha='".$idficha."'; ";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

         //usuada
        function insficha_grupo($grupo,$fichaid, $cant){
		$sql = "INSERT INTO `ficha_grupo`(`grupoid`, `fichaid`, `cant_aprendices`) VALUES ('".$grupo."','". $fichaid."','". $cant."');";
		$this->cons($sql);
	}

        function  delgrupo_ficha($idfichagrupo){
		$sql =  "DELETE FROM ficha_grupo WHERE idficha_grupo='".$idfichagrupo."';";
		$this->cons($sql);
	}

     
        } 
?>
