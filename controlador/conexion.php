<?php
//Clase de conexión con las bases de datos de mysql
class conexion{
	var $link;
	var $resultado;

	function conexion(){}

	function conectarBD(){
		include("configuracion.php");
		$this->link = mysql_connect($serv_db,$usu_db,$pass_db);
		if (!$this->link){
			die("<h5>No se logro realizar la conexion</h5>");
		}
		$db2= mysql_select_db($db);
		if (!$db2)		{
			echo "no se puede conectar db";
		}
	}

	function desconectarBD(){
		mysql_close($this->link);
	}

	function ejeCon($con, $op){
		//var_dump($con);
		$this->resultado = mysql_query($con) or 
		die("La consulta fallo: ".mysql_error());
		if ($op==0){
			while ($linea = mysql_fetch_array($this->resultado)){
				$arrayResultado[] = $linea;
			}
		}else{
			$arrayResultado[] =0;
		}
		$resarr = isset($arrayResultado) ? $arrayResultado:NULL;
		if($resarr){
			return $arrayResultado;
		}
	}
}
?>