<?php

include_once("controlador/conexion.php");

class mcompeprograma {

    function mcompeprograma() {
        
    }

    function insertacompe($codigo, $denomina, $cantihor, $idprograma) {

        $sql = "insert into competencia_programa (id_competencia, denominacion, cantidad_horas, programaid) values ('" . $codigo . "', '" . $denomina . "', '" . $cantihor . "', '" . $idprograma . "');";
        $this->cons($sql);
    }

    function updcompe($codigo, $denomina, $cantihor, $idprograma, $valor) {
        $sql ="update competencia_programa set id_competencia = '".$codigo."' , denominacion = '".$denomina."', cantidad_horas = '".$cantihor."' , programaid = '".$idprograma."' where id_competencia = '".$valor."' ;";
        $this->cons($sql);
    }

    function delcompe($elim) {

        $sql = "delete from competencia_programa where id_competencia = '".$elim."' ";
        
        $this->cons($sql);
    }

    function cons($c) {
        $conexionBD = new conexion();
        $conexionBD->conectarBD();
        $conexionBD->ejeCon($c, 1);
    }

    function selecompe($pr) {
        $sql = "select * from competencia_programa where id_competencia ='".$pr."'  ";
        $conexionBD = new conexion();
        $conexionBD->conectarBD();
        $data = $conexionBD->ejeCon($sql, 0);
        return $data;
    }
    
    
    
    
    function seleprograma() {
        $sql = "select programa.idprograma, programa.programa from programa";
        $conexionBD = new conexion();
        $conexionBD->conectarBD();
        $data = $conexionBD->ejeCon($sql, 0);
        return $data;
    }
    
    function seledat() {
        $sql = "select * from programa AS pro INNER JOIN competencia_programa AS comp ON comp.programaid=pro.idprograma; ";
        $conexionBD = new conexion();
        $conexionBD->conectarBD();
        $data = $conexionBD->ejeCon($sql, 0);
        return $data;
    }
    
    
    
     function seleresultado($elim) {
        $sql = "select id_resultado from resultados where idcompetencia = '".$elim."'";
        $conexionBD = new conexion();
        $conexionBD->conectarBD();
        $data = $conexionBD->ejeCon($sql, 0);
        return $data;
    }
    
    
    
    

}

?>