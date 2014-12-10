<?php

include_once("../controlador/conexion_sqlserver.php");
if ($_REQUEST["valor"] == 0) {
   
    echo"Seleccione una competencia";
  
} else {

    $valor = $_REQUEST["valor"];
    $sql2 = "SELECT id_resultado,resultado  FROM `resultados` WHERE idcompetencia=" . $valor . " order by resultado";
    $conexionBD = new conexion_sqlserver();
    $conexionBD->conectarBD();
    $estados = $conexionBD->ejecutarConsulta($sql2, 0);
    $result = array();
    $i = 0;
    if ($estados <> NULL) {

        foreach ($estados as $estado) {
            $result[$i]["value"] = $estado["id_resultado"];
            $result[$i]["nombre"] = $estado["resultado"];
            $i++;
        }
        $html="";
        /*$html = '<select name="idresultado" id="reloadresultado" required >';
        $html.='<option value>Seleccione</option>';*/
        $u=0;
        foreach ($result as $res) {
     
           //$html.='<option value="' . $res["value"] . '">' . $res["nombre"] . '</option>';
            $html.='<input type="checkbox" name="res_'.$u.'"  value="'.$res['value'].'"> '.$res["nombre"].'<br>';
          $u++;
        
        }
        $html.='<input type="hidden" name="coun"  value="'.$u.'">';
        echo $html;
    } else {
        $html = 'sin resultados';
      
        echo $html;
    }
}
?>