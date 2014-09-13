<?php
class cargar {
	var $cn;
        var $rs;
        var $sql;

	function __construct($sql) {
		$this->sql=$sql;
		$this->cn = mysql_connect("localhost","root","");
		mysql_select_db("sigho");
		$this->cargar();
	}

	function cargar() {
     	$this->rs=mysql_query($this->sql);
		header('Content-Type: text/xml');
		echo "<?xml version='1.0' encoding='ISO-8859-1' standalone='yes'?>\n";
		echo "<datos>\n";
		echo "<descri>-1,Seleccione</descri>";
		while ($descri = mysql_fetch_assoc($this->rs)){
			echo "<descri>".$descri['cod_ubicacion'].",".$descri['nom_ubicacion']."</descri>\n";
       		}
		echo "</datos>\n";
	}

	function __destruct() {
   	mysql_close($this->cn);
	}
}
extract($_POST);
//var_dump($_POST);
switch ($carga){
	case 'sEst':	$sql = "SELECT nom_ubicacion,cod_ubicacion FROM vieubica ORDER BY nom_ubicacion";	break;
        case 'sDM':	$sql = "SELECT nom_ubicacion,cod_ubicacion FROM ubicacion WHERE depende ='$sEst' ORDER BY nom_ubicacion";	break;
	case 'sCol':	$sql = "SELECT nom_ubicacion,cod_ubicacion FROM ubicacion WHERE depende ='$sDM' ORDER BY nom_ubicacion";	break;
	default:	$sql = "SELECT nom_ubicacion,cod_ubicacion FROM vieubica ORDER BY nom_ubicacion";
}

$clCar = new cargar($sql);