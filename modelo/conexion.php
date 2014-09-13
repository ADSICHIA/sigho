<?php

class conexion{
    function conexion(){
    }
    function conectarDB(){
    $serv_db="localhost";
	$usu_db="root";
	$pass_usu="";
	$db_ms="sigho";
    $this->link=mysql_connect($serv_db,$usu_db,$pass_usu);
    if(!$this->link){
        die("<h5>No se ha podido realizar la conexion</h5>");
    }
    $db=  mysql_select_db($db_ms);
    if(!$db){
        echo "No se puede conectar a la base de datos";
    }
    }
    function insertar($consulta){
        $this->resultado=  mysql_query($consulta) or die("La consulta falló:".  mysql_error());
        
    }
    function SelectDato($consulta){
        $this->resultado = mysql_query($consulta) or die("La consulta falló:".mysql_error());
        while($linea=mysql_fetch_array($this->resultado)){
            $arrayResultado[]=$linea;
        }
        $resarr =isset($arrayResultado) ? $arrayResultado: NULL;
        if($resarr){
            return $arrayResultado;
        }
    }
    
}
?>