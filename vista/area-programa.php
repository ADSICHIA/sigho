<?php

include ("../controlador/conexion.php");

	$valor = $_REQUEST["variables"];
	$num = $_REQUEST["Numero"];
	$hi = $_REQUEST["jornada"];
	//echo "programa: ".$valor.", numero: ".$num.", jornada: ".$hi;
	if ($valor==0 || $num==0 || $hi==0) {

    }else if($valor){
    	if($num==1){
		$sql2 = "SELECT programa.idprograma, programa.programa  AS pro, 
					programa.areaid, area.idarea 
					FROM programa INNER JOIN area ON programa.areaid = area.idarea WHERE area.idarea=".$valor." order by pro ASC";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$estados = $conexionBD->ejeCon($sql2,0);
		$result=array();
		$j=0;
		for($j=0; $j < count($estados); $j++){
				$result[$j]["value"]=$estados[$j]["idprograma"];
				$result[$j]["nombre"]=$estados[$j]["pro"];
		}		   
		$div='<label>&nbsp;&nbsp;Nombre del Programa:  </label>';
		$html='<select name="programaid" id="programaid" required onchange="javascript:RecargarProgramas(this.value,2,1);RecargarProgramas(this.value,4);" >';
		$html.='<option value=""  >Seleccione</option>';
		foreach($result as $res){
			$html.='<option value="'.$res["value"].'">'.$res["nombre"].'</option>';
		}
		$html.='</select>';
		echo $div;
		echo $html;
		}else if ($num==2) {
			$sql = "SELECT G.idgrupo, G.grupo, G.vigente, G.agendado
			FROM grupo as G
			INNER JOIN ficha_grupo as FG ON G.idgrupo = FG.grupoid
			INNER JOIN ficha as F ON F.idficha = FG.fichaid
			WHERE F.programaid=".$valor."  GROUP BY G.IDGRUPO";
			//echo $sql;
			$conexionBD = new conexion();
			$conexionBD->conectarBD();
			$estados = $conexionBD->ejeCon($sql,0);
			$resulta=array();
			$j=0;
			for($j=0; $j < count($estados); $j++){
					$resulta[$j]["value"]=$estados[$j]["idgrupo"];
					$resulta[$j]["nombre"]=$estados[$j]["grupo"];
					$resulta[$j]["agen"]=$estados[$j]["agendado"];
			}		   
			$div='<label>Grupo: </label>';
			$html='<select name="grupo" id="grupo" required onchange="javascript:verHorario(1);verEspacios(1);RecargarProgramas(this.value,3,1);" >';
			$html.='<option value=""  >Seleccione</option>';
			foreach($resulta as $res){
				if ($res["agen"]==0) {
					$html.='<option value="'.$res["value"].'">'.$res["nombre"].'</option>';
				}
				
			}
			$html.='</select>';

			echo $div;
			echo $html;
			//echo $sql;
		}else if ($num==3) {
			$sql = "SELECT idjornada, jornada, hora_inicio, hora_fin, horas, activo FROM jornada  ";
			$conexionBD = new conexion();
			$conexionBD->conectarBD();
			$estados = $conexionBD->ejeCon($sql,0);
			$resulta=array();
			$j=0;
			for($j=0; $j < count($estados); $j++){
					$resulta[$j]["value"]=$estados[$j]["idjornada"];
					$resulta[$j]["nombre"]=$estados[$j]["jornada"];
			}		   
			
			$html='<option value=""  >Seleccione</option>';
			foreach($resulta as $res){
					$html.='<option value="'.$res["value"].'">'.$res["nombre"].'</option>';				
			}
			echo $html;
		}else if ($num==7) {
			$sql3 = "SELECT  P.programa, U.nombres, U.apellidos, U.idusuario, U.identificacion, D.jornadaid, J.jornada, D.dia, U.horas_formacion, C.calificado
			FROM programa as P
			RIGHT JOIN competencia as C ON P.idprograma = C.programaid
			INNER JOIN usuario as U ON C.usuarioid = U.idusuario
			INNER JOIN disponiblidad as D ON U.idusuario = D.usuarioid
            INNER JOIN jornada as J ON D.jornadaid = J.idjornada
			WHERE P.idprograma=".$valor." AND J.idjornada=".$hi." AND D.dia=".$num." ";
			//echo $sql3;
			$conexionBD = new conexion();
			$conexionBD->conectarBD();
			$estados = $conexionBD->ejeCon($sql3,0);
			$resulta=array();
			$j=0;
			for($j=0; $j < count($estados); $j++){
					$resulta[$j]["Id"]=$estados[$j]["identificacion"];
					$resulta[$j]["Nom"]=$estados[$j]["nombres"];
					$resulta[$j]["Ape"]=$estados[$j]["apellidos"];
					$resulta[$j]["HF"]=$estados[$j]["horas_formacion"];
					$resulta[$j]["calificado"]=$estados[$j]["calificado"];
			}
			$div='<label>Seleccione Instructor:</label>';
			$html='<select name="dia[7]" id="docen2"  style="width: 100px">';	   
			$html.='<option value="" >Seleccione</option>';
			$html.='<optgroup label="Parciales">';
			foreach($resulta as $res){
				if ($res["HF"]>0 && $res["calificado"]==0) {
					$html.='<option value="'.$res["Id"].'">'.$res["Nom"].' '.$res["Ape"].'</option>';		
				}
				
			}
			$html.='</optgroup>';
			$html.='<optgroup label="Calificados">';
			foreach($resulta as $res){
				if ($res["HF"]>0 && $res["calificado"]==1) {
					$html.='<option value="'.$res["Id"].'">'.$res["Nom"].' '.$res["Ape"].'</option>';		
				}
				
			}
			$html.='</optgroup>';
			$html.='</select>';
			echo $div;
			echo $html;
		}else if ($num==8) {
			$sql3 = "SELECT  P.programa, U.nombres, U.apellidos, U.idusuario, U.identificacion, D.jornadaid, J.jornada, D.dia, U.horas_formacion, C.calificado
			FROM programa as P
			RIGHT JOIN competencia as C ON P.idprograma = C.programaid
			INNER JOIN usuario as U ON C.usuarioid = U.idusuario
			INNER JOIN disponiblidad as D ON U.idusuario = D.usuarioid
            INNER JOIN jornada as J ON D.jornadaid = J.idjornada
			WHERE P.idprograma=".$valor." AND J.idjornada=".$hi." AND D.dia=".$num." GROUP BY U.idusuario ";
			$conexionBD = new conexion();
			$conexionBD->conectarBD();
			$estados = $conexionBD->ejeCon($sql3,0);
			$resulta=array();
			$j=0;
			for($j=0; $j < count($estados); $j++){
					$resulta[$j]["Id"]=$estados[$j]["identificacion"];
					$resulta[$j]["Nom"]=$estados[$j]["nombres"];
					$resulta[$j]["Ape"]=$estados[$j]["apellidos"];
					$resulta[$j]["HF"]=$estados[$j]["horas_formacion"];
					$resulta[$j]["calificado"]=$estados[$j]["calificado"];
			}		   
			$div='<label>Seleccione Instructor:</label>';
			$html='<select name="dia[8]" id="docen3" style="width: 100px">';	   
			$html.='<option value="" >Seleccione</option>';
			$html.='<optgroup label="Parciales">';
			foreach($resulta as $res){
				if ($res["HF"]>0 && $res["calificado"]==0) {
					$html.='<option value="'.$res["Id"].'">'.$res["Nom"].' '.$res["Ape"].'</option>';		
				}
				
			}
			$html.='</optgroup>';
			$html.='<optgroup label="Calificados">';
			foreach($resulta as $res){
				if ($res["HF"]>0 && $res["calificado"]==1) {
					$html.='<option value="'.$res["Id"].'">'.$res["Nom"].' '.$res["Ape"].'</option>';		
				}
				
			}
			$html.='</optgroup>';
			$html.='</select>';
			echo $div;
			echo $html;
		}else if ($num==9) {
			$sql3 = "SELECT  P.programa, U.nombres, U.apellidos, U.idusuario, U.identificacion, D.jornadaid, J.jornada, D.dia, U.horas_formacion, C.calificado
			FROM programa as P
			RIGHT JOIN competencia as C ON P.idprograma = C.programaid
			INNER JOIN usuario as U ON C.usuarioid = U.idusuario
			INNER JOIN disponiblidad as D ON U.idusuario = D.usuarioid
            INNER JOIN jornada as J ON D.jornadaid = J.idjornada
			WHERE P.idprograma=".$valor." AND J.idjornada=".$hi." AND D.dia=".$num." GROUP BY U.idusuario ";
			$conexionBD = new conexion();
			$conexionBD->conectarBD();
			$estados = $conexionBD->ejeCon($sql3,0);
			$resulta=array();
			$j=0;
			for($j=0; $j < count($estados); $j++){
					$resulta[$j]["Id"]=$estados[$j]["identificacion"];
					$resulta[$j]["Nom"]=$estados[$j]["nombres"];
					$resulta[$j]["Ape"]=$estados[$j]["apellidos"];
					$resulta[$j]["HF"]=$estados[$j]["horas_formacion"];
					$resulta[$j]["calificado"]=$estados[$j]["calificado"];
			}		   
			$div='<label>Seleccione Instructor:</label>';
			$html='<select name="dia[9]" id="docen4" style="width: 100px">';	   
			$html.='<option value="" >Seleccione</option>';
			$html.='<optgroup label="Parciales">';
			foreach($resulta as $res){
				if ($res["HF"]>0 && $res["calificado"]==0) {
					$html.='<option value="'.$res["Id"].'">'.$res["Nom"].' '.$res["Ape"].'</option>';		
				}
				
			}
			$html.='</optgroup>';
			$html.='<optgroup label="Calificados">';
			foreach($resulta as $res){
				if ($res["HF"]>0 && $res["calificado"]==1) {
					$html.='<option value="'.$res["Id"].'">'.$res["Nom"].' '.$res["Ape"].'</option>';		
				}
				
			}
			$html.='</optgroup>';
			$html.='</select>';
			echo $div;
			echo $html;
		}else if ($num==10) {
			$sql3 = "SELECT  P.programa, U.nombres, U.apellidos, U.idusuario, U.identificacion, D.jornadaid, J.jornada, D.dia, U.horas_formacion, C.calificado
			FROM programa as P
			RIGHT JOIN competencia as C ON P.idprograma = C.programaid
			INNER JOIN usuario as U ON C.usuarioid = U.idusuario
			INNER JOIN disponiblidad as D ON U.idusuario = D.usuarioid
            INNER JOIN jornada as J ON D.jornadaid = J.idjornada
			WHERE P.idprograma=".$valor." AND J.idjornada=".$hi." AND D.dia=".$num." GROUP BY U.idusuario ";
			$conexionBD = new conexion();
			$conexionBD->conectarBD();
			$estados = $conexionBD->ejeCon($sql3,0);
			$resulta=array();
			$j=0;
			for($j=0; $j < count($estados); $j++){
					$resulta[$j]["Id"]=$estados[$j]["identificacion"];
					$resulta[$j]["Nom"]=$estados[$j]["nombres"];
					$resulta[$j]["Ape"]=$estados[$j]["apellidos"];
					$resulta[$j]["HF"]=$estados[$j]["horas_formacion"];
					$resulta[$j]["calificado"]=$estados[$j]["calificado"];
			}		   
			$div='<label>Seleccione Instructor:</label>';
			$html='<select name="dia[10]" id="docen5" style="width: 100px">';	   
			$html.='<option value="" >Seleccione</option>';
			$html.='<optgroup label="Parciales">';
			foreach($resulta as $res){
				if ($res["HF"]>0 && $res["calificado"]==0) {
					$html.='<option value="'.$res["Id"].'">'.$res["Nom"].' '.$res["Ape"].'</option>';		
				}
				
			}
			$html.='</optgroup>';
			$html.='<optgroup label="Calificados">';
			foreach($resulta as $res){
				if ($res["HF"]>0 && $res["calificado"]==1) {
					$html.='<option value="'.$res["Id"].'">'.$res["Nom"].' '.$res["Ape"].'</option>';		
				}
				
			}
			$html.='</optgroup>';
			$html.='</select>';
			echo $div;
			echo $html;
		}else if ($num==11) {
			$sql3 = "SELECT  P.programa, U.nombres, U.apellidos, U.idusuario, U.identificacion, D.jornadaid, J.jornada, D.dia, U.horas_formacion, C.calificado
			FROM programa as P
			RIGHT JOIN competencia as C ON P.idprograma = C.programaid
			INNER JOIN usuario as U ON C.usuarioid = U.idusuario
			INNER JOIN disponiblidad as D ON U.idusuario = D.usuarioid
            INNER JOIN jornada as J ON D.jornadaid = J.idjornada
			WHERE P.idprograma=".$valor." AND J.idjornada=".$hi." AND D.dia=".$num." GROUP BY U.idusuario ";
			$conexionBD = new conexion();
			$conexionBD->conectarBD();
			$estados = $conexionBD->ejeCon($sql3,0);
			$resulta=array();
			$j=0;
			for($j=0; $j < count($estados); $j++){
					$resulta[$j]["Id"]=$estados[$j]["identificacion"];
					$resulta[$j]["Nom"]=$estados[$j]["nombres"];
					$resulta[$j]["Ape"]=$estados[$j]["apellidos"];
					$resulta[$j]["HF"]=$estados[$j]["horas_formacion"];
					$resulta[$j]["calificado"]=$estados[$j]["calificado"];
			}		   
			$div='<label>Seleccione Instructor:</label>';
			$html='<select name="dia[11]" id="docen6" style="width: 100px">';	   
			$html.='<option value="" >Seleccione</option>';
			$html.='<optgroup label="Parciales">';
			foreach($resulta as $res){
				if ($res["HF"]>0 && $res["calificado"]==0) {
					$html.='<option value="'.$res["Id"].'">'.$res["Nom"].' '.$res["Ape"].'</option>';		
				}
				
			}
			$html.='</optgroup>';
			$html.='<optgroup label="Calificados">';
			foreach($resulta as $res){
				if ($res["HF"]>0 && $res["calificado"]==1) {
					$html.='<option value="'.$res["Id"].'">'.$res["Nom"].' '.$res["Ape"].'</option>';		
				}
				
			}
			$html.='</optgroup>';
			$html.='</select>';
			echo $div;
			echo $html;
		}else if ($num==12) {
			$sql3 = "SELECT  P.programa, U.nombres, U.apellidos, U.idusuario, U.identificacion, D.jornadaid, J.jornada, D.dia, U.horas_formacion, C.calificado
			FROM programa as P
			RIGHT JOIN competencia as C ON P.idprograma = C.programaid
			INNER JOIN usuario as U ON C.usuarioid = U.idusuario
			INNER JOIN disponiblidad as D ON U.idusuario = D.usuarioid
            INNER JOIN jornada as J ON D.jornadaid = J.idjornada
			WHERE P.idprograma=".$valor." AND J.idjornada=".$hi." AND D.dia=".$num." GROUP BY U.idusuario ";
			$conexionBD = new conexion();
			$conexionBD->conectarBD();
			$estados = $conexionBD->ejeCon($sql3,0);
			$resulta=array();
			$j=0;
			for($j=0; $j < count($estados); $j++){
					$resulta[$j]["Id"]=$estados[$j]["identificacion"];
					$resulta[$j]["Nom"]=$estados[$j]["nombres"];
					$resulta[$j]["Ape"]=$estados[$j]["apellidos"];
					$resulta[$j]["HF"]=$estados[$j]["horas_formacion"];
					$resulta[$j]["calificado"]=$estados[$j]["calificado"];
			}		   
			$div='<label>Seleccione Instructor:</label>';
			$html='<select name="dia[12]" id="docen7" style="width: 100px">';	   
			$html.='<option value="" >Seleccione</option>';
			$html.='<optgroup label="Parciales">';
			foreach($resulta as $res){
				if ($res["HF"]>0 && $res["calificado"]==0) {
					$html.='<option value="'.$res["Id"].'">'.$res["Nom"].' '.$res["Ape"].'</option>';		
				}
				
			}
			$html.='</optgroup>';
			$html.='<optgroup label="Calificados">';
			foreach($resulta as $res){
				if ($res["HF"]>0 && $res["calificado"]==1) {
					$html.='<option value="'.$res["Id"].'">'.$res["Nom"].' '.$res["Ape"].'</option>';		
				}
				
			}
			$html.='</optgroup>';
			$html.='</select>';
			echo $div;
			echo $html;
		}else if ($num==13) {
			$sql3 = "SELECT  P.programa, U.nombres, U.apellidos, U.idusuario, U.identificacion, D.jornadaid, J.jornada, D.dia, U.horas_formacion, C.calificado
			FROM programa as P
			RIGHT JOIN competencia as C ON P.idprograma = C.programaid
			INNER JOIN usuario as U ON C.usuarioid = U.idusuario
			INNER JOIN disponiblidad as D ON U.idusuario = D.usuarioid
            INNER JOIN jornada as J ON D.jornadaid = J.idjornada
			WHERE P.idprograma=".$valor." AND J.idjornada=".$hi." AND D.dia=".$num." GROUP BY U.idusuario ";
			$conexionBD = new conexion();
			$conexionBD->conectarBD();
			$estados = $conexionBD->ejeCon($sql3,0);
			$resulta=array();
			$j=0;
			for($j=0; $j < count($estados); $j++){
					$resulta[$j]["Id"]=$estados[$j]["identificacion"];
					$resulta[$j]["Nom"]=$estados[$j]["nombres"];
					$resulta[$j]["Ape"]=$estados[$j]["apellidos"];
					$resulta[$j]["Horas"]=$estados[$j]["horas_formacion"];
					$resulta[$j]["calificado"]=$estados[$j]["calificado"];
			}		   
			$div='<label>Seleccione Instructor:</label>';
			$html='<select name="dia[13]" id="docen8" style="width: 100px">';	   
			$html.='<option value="" >Seleccione</option>';
			$html.='<optgroup label="Parciales">';
			foreach($resulta as $res){
				if ($res["Horas"]>0 && $res["calificado"]==0) {
					$html.='<option value="'.$res["Id"].'">'.$res["Nom"].' '.$res["Ape"].'</option>';		
				}
				
			}
			$html.='</optgroup>';
			$html.='<optgroup label="Calificados">';
			foreach($resulta as $res){
				if ($res["Horas"]>0 && $res["calificado"]==1) {
					$html.='<option value="'.$res["Id"].'">'.$res["Nom"].' '.$res["Ape"].'</option>';		
				}
				
			}
			$html.='</optgroup>';
			$html.='</select>';
			echo $div;
			echo $html;
		}

	}

?>