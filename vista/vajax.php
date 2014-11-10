<?php
include ("../controlador/conexion.php");

    $valor = $_REQUEST["valor"];
    $sql2 = "SELECT  idmunicipio, municipio , departamentoid FROM municipio WHERE departamentoid='".$valor."';";
	$conexionBD = new conexion();
	$conexionBD->conectarBD();
	$estados = $conexionBD->ejeCon($sql2,0);
	$result=array();
	$i=0;
	foreach($estados as $estado){
		$result[$i]["value"]=$estado["idmunicipio"];
		$result[$i]["nombre"]=$estado["municipio"];
		$i++;
		}
	$html ='Municipio ';   
	$html.='<select name="municipioid" style="width: 195px;">';
	$html.='<option value="">Seleccione</option>';
	foreach($result as $res){
			$html.='<option value="'.$res["value"].'">'.$res["nombre"].'</option>';
		}
	$html.='</select>';
	echo $html;

?>