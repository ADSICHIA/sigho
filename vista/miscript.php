<?php

include_once("../controlador/conexion_sqlserver.php");
if ($_REQUEST["valor"] == 0) {
    echo"<select name='idcompetencia' id='id_estado'>";
    echo"<option value='0'>Seleccione un programa</option>";
    echo "</select>";
} else {

    $valor = $_REQUEST["valor"];
    $sql2 = "SELECT id_competencia,denominacion  FROM `competencia_programa` WHERE programaid=" . $valor . " order by denominacion";
    $conexionBD = new conexion_sqlserver();
    $conexionBD->conectarBD();
    $estados = $conexionBD->ejecutarConsulta($sql2, 0);
    $result = array();
    $i = 0;
    if ($estados <> NULL) {

        foreach ($estados as $estado) {
            $result[$i]["value"] = $estado["id_competencia"];
            $result[$i]["nombre"] = $estado["denominacion"];
            $i++;
        }

        $html = '<select name="idcompetencia" id="reloadcompetencia" required onchange="javascript:Recargarresultado(this.value);" >';
        $html.='<option value>Seleccione</option>';
        foreach ($result as $res) {
            $html.='<option value="' . $res["value"] . '">' . $res["nombre"] . '</option>';
        }
        $html.='</select>';
        echo $html;
    } else {
        $html = '<select name="idcompetencia" id="reloadcompetencia" required>';
        $html.='<option value>Sin datos</option>';
        foreach ($result as $res) {
            $html.='<option value="' . $res["value"] . '">' . $res["nombre"] . '</option>';
        }
        $html.='</select>';
        echo $html;
    }
}
?>