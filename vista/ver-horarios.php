<?php

include ("../controlador/conexion.php");

	$valor = $_REQUEST["variables"];
	$num = $_REQUEST["Numero"];
	$varia = $_REQUEST["programa"];
	$grup = $_REQUEST["grupo"];
	//echo "programa: ".$valor.", numero: ".$num.", jornada: ".$varia;
	if ($valor==0) {

    }else if($valor){
    	if($num==1){
		$sql2 = "SELECT programa.idprograma, programa.programa  AS pro, programa.areaid, area.idarea FROM programa INNER JOIN area ON programa.areaid = area.idarea WHERE area.idarea=".$valor." ";
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
		$html='<select name="programaid" id="programa" required onchange="javascript:RecargarProgramas(this.value,2,this.value);" >';
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
			$html='<select name="grupo" id="grupo" required onchange="javascript:verHorario(1);verEspacios(1);RecargarProgramas(this.value,7,'.$varia.');RecargarProgramas(this.value,8,'.$varia.');RecargarProgramas(this.value,9,'.$varia.');RecargarProgramas(this.value,10,'.$varia.');RecargarProgramas(this.value,11,'.$varia.');RecargarProgramas(this.value,12,'.$varia.');RecargarProgramas(this.value,13,'.$varia.');" >';
			$html.='<option value=""  >Seleccione</option>';
			foreach($resulta as $res){
				if ($res["agen"]==1) {
					$html.='<option value="'.$res["value"].'">'.$res["nombre"].'</option>';
				}
				
			}
			$html.='</select>';

			echo $div;
			echo $html;
			//echo $sql;
		}else if ($num==7) {
			$sql = "SELECT idjornada, jornada, hora_inicio, hora_fin, horas FROM jornada  ";
			$sql1 = "SELECT grupoid, jornadaid FROM horario WHERE grupoid=".$valor." AND dia=7 ";
			$conexionBD = new conexion();
			$conexionBD->conectarBD();
			$jorna = $conexionBD->ejeCon($sql,0);
			$hora = $conexionBD->ejeCon($sql1,0);
			$resulta=array();
			$jornadas;
			$j=0;
			for($j=0; $j < count($jorna); $j++){
					$resulta[$j]["value"]=$jorna[$j]["idjornada"];
					$resulta[$j]["nombre"]=$jorna[$j]["jornada"];
			}

			foreach ($hora as $h ) {
				$jornadas[0]=$h["jornadaid"];
			}
			$html='<option value="0">Seleccione</option>';				
			foreach($resulta as $res){
					$html.='<option value="'.$res["value"].'"';
						if($jornadas[0]==$res["value"]) $html.= 'selected';
						$html.=' >'.utf8_encode($res["nombre"]).'</option>';				
			}
			echo $html;
		}else if ($num==8) {
			$sql = "SELECT idjornada, jornada, hora_inicio, hora_fin, horas FROM jornada  ";
			$sql1 = "SELECT grupoid, jornadaid FROM horario WHERE grupoid=".$valor." AND dia=8 ";
			$conexionBD = new conexion();
			$conexionBD->conectarBD();
			$jorna = $conexionBD->ejeCon($sql,0);
			$hora = $conexionBD->ejeCon($sql1,0);
			$resulta=array();
			$jornadas;
			$j=0;
			for($j=0; $j < count($jorna); $j++){
					$resulta[$j]["value"]=$jorna[$j]["idjornada"];
					$resulta[$j]["nombre"]=$jorna[$j]["jornada"];
			}

			foreach ($hora as $h ) {
				$jornadas[0]=$h["jornadaid"];
			}
			
			$html='<option value="0">Seleccione</option>';				
			foreach($resulta as $res){
					$html.='<option value="'.$res["value"].'"';
						if($jornadas[0]==$res["value"]) $html.= 'selected';
						$html.=' >'.utf8_encode($res["nombre"]).'</option>';				
			}
			echo $html;
		}else if ($num==9) {
			$sql = "SELECT idjornada, jornada, hora_inicio, hora_fin, horas FROM jornada  ";
			$sql1 = "SELECT grupoid, jornadaid FROM horario WHERE grupoid=".$valor." AND dia=9 ";
			$conexionBD = new conexion();
			$conexionBD->conectarBD();
			$jorna = $conexionBD->ejeCon($sql,0);
			$hora = $conexionBD->ejeCon($sql1,0);
			$resulta=array();
			$jornadas;
			$j=0;
			for($j=0; $j < count($jorna); $j++){
					$resulta[$j]["value"]=$jorna[$j]["idjornada"];
					$resulta[$j]["nombre"]=$jorna[$j]["jornada"];
			}

			foreach ($hora as $h ) {
				$jornadas[0]=$h["jornadaid"];
			}

			$html='<option value="0">Seleccione</option>';				
			foreach($resulta as $res){
					$html.='<option value="'.$res["value"].'"';
						if($jornadas[0]==$res["value"]) $html.= 'selected';
						$html.=' >'.utf8_encode($res["nombre"]).'</option>';				
			}

			echo $html;
		}else if ($num==10) {
			$sql = "SELECT idjornada, jornada, hora_inicio, hora_fin, horas FROM jornada  ";
			$sql1 = "SELECT grupoid, jornadaid FROM horario WHERE grupoid=".$valor." AND dia=10 ";
			$conexionBD = new conexion();
			$conexionBD->conectarBD();
			$jorna = $conexionBD->ejeCon($sql,0);
			$hora = $conexionBD->ejeCon($sql1,0);
			$resulta=array();
			$jornadas;
			$j=0;
			for($j=0; $j < count($jorna); $j++){
					$resulta[$j]["value"]=$jorna[$j]["idjornada"];
					$resulta[$j]["nombre"]=$jorna[$j]["jornada"];
			}

			foreach ($hora as $h ) {
				$jornadas[0]=$h["jornadaid"];
			}

			$html='<option value="0">Seleccione</option>';				
			foreach($resulta as $res){
					$html.='<option value="'.$res["value"].'"';
						if($jornadas[0]==$res["value"]) $html.= 'selected';
						$html.=' >'.utf8_encode($res["nombre"]).'</option>';				
			}

			echo $html;
		}else if ($num==11) {
			$sql = "SELECT idjornada, jornada, hora_inicio, hora_fin, horas FROM jornada  ";
			$sql1 = "SELECT grupoid, jornadaid FROM horario WHERE grupoid=".$valor." AND dia=11 ";
			$conexionBD = new conexion();
			$conexionBD->conectarBD();
			$jorna = $conexionBD->ejeCon($sql,0);
			$hora = $conexionBD->ejeCon($sql1,0);
			$resulta=array();
			$jornadas;
			$j=0;
			for($j=0; $j < count($jorna); $j++){
					$resulta[$j]["value"]=$jorna[$j]["idjornada"];
					$resulta[$j]["nombre"]=$jorna[$j]["jornada"];
			}

			foreach ($hora as $h ) {
				$jornadas[0]=$h["jornadaid"];
			}

			$html='<option value="0">Seleccione</option>';				
			foreach($resulta as $res){
					$html.='<option value="'.$res["value"].'"';
						if($jornadas[0]==$res["value"]) $html.= 'selected';
						$html.=' >'.utf8_encode($res["nombre"]).'</option>';				
			}

			echo $html;
		}else if ($num==12) {
			$sql = "SELECT idjornada, jornada, hora_inicio, hora_fin, horas FROM jornada  ";
			$sql1 = "SELECT grupoid, jornadaid FROM horario WHERE grupoid=".$valor." AND dia=12 ";
			$conexionBD = new conexion();
			$conexionBD->conectarBD();
			$jorna = $conexionBD->ejeCon($sql,0);
			$hora = $conexionBD->ejeCon($sql1,0);
			$resulta=array();
			$jornadas;
			$j=0;
			for($j=0; $j < count($jorna); $j++){
					$resulta[$j]["value"]=$jorna[$j]["idjornada"];
					$resulta[$j]["nombre"]=$jorna[$j]["jornada"];
			}

			foreach ($hora as $h ) {
				$jornadas[0]=$h["jornadaid"];
			}

			$html='<option value="0">Seleccione</option>';				
			foreach($resulta as $res){
					$html.='<option value="'.$res["value"].'"';
						if($jornadas[0]==$res["value"]) $html.= 'selected';
						$html.=' >'.utf8_encode($res["nombre"]).'</option>';				
			}

			echo $html;
		}else if ($num==13) {
			$sql = "SELECT idjornada, jornada, hora_inicio, hora_fin, horas FROM jornada  ";
			$sql1 = "SELECT grupoid, jornadaid FROM horario WHERE grupoid=".$valor." AND dia=13 ";
			$conexionBD = new conexion();
			$conexionBD->conectarBD();
			$jorna = $conexionBD->ejeCon($sql,0);
			$hora = $conexionBD->ejeCon($sql1,0);
			$resulta=array();
			$jornadas;
			$j=0;
			for($j=0; $j < count($jorna); $j++){
					$resulta[$j]["value"]=$jorna[$j]["idjornada"];
					$resulta[$j]["nombre"]=$jorna[$j]["jornada"];
			}

			foreach ($hora as $h ) {
				$jornadas[0]=$h["jornadaid"];
			}

			$html='<option value="0">Seleccione</option>';				
			foreach($resulta as $res){
					$html.='<option value="'.$res["value"].'"';
						if($jornadas[0]==$res["value"]) $html.= 'selected';
						$html.=' >'.utf8_encode($res["nombre"]).'</option>';				
			}

			echo $html;
		}else if ($num==14) {
			$number = 7;
			$sql = "SELECT  P.programa, U.nombres, U.apellidos, U.idusuario, U.identificacion, D.jornadaid, J.jornada, D.dia, U.horas_formacion, C.calificado
			FROM programa as P
			RIGHT JOIN competencia as C ON P.idprograma = C.programaid
			INNER JOIN usuario as U ON C.usuarioid = U.idusuario
			INNER JOIN disponiblidad as D ON U.idusuario = D.usuarioid
            INNER JOIN jornada as J ON D.jornadaid = J.idjornada
			WHERE P.idprograma='".$grup."' AND J.idjornada=".$valor." AND D.dia=".$number." GROUP BY U.idusuario ";

			$sql1 = "SELECT grupoid, jornadaid, usuarioid FROM horario WHERE grupoid='".$varia."' AND dia='".$number."';";
		
			$conexionBD = new conexion();
			$conexionBD->conectarBD();
			$jorna = $conexionBD->ejeCon($sql,0);
			$hora = $conexionBD->ejeCon($sql1,0);
			$resulta=array();
			$jornadas;
			$j=0;
			for($j=0; $j < count($jorna); $j++){
					$resulta[$j]["value"]=$jorna[$j]["identificacion"];
					$resulta[$j]["nombre"]=$jorna[$j]["nombres"];
					$resulta[$j]["apellido"]=$jorna[$j]["apellidos"];
					$resulta[$j]["HF"]=$jorna[$j]["horas_formacion"];
					$resulta[$j]["CA"]=$jorna[$j]["calificado"];
			}

			foreach ($hora as $h ) {
				$jornadas[0]=$h["usuarioid"];
			}
			$div='<label>Instructor Actual:</label>';
			$html='<select name="day[7]"   style="width: 95px">';
			$html.='<option value="0">Seleccione</option>';
			$html.='<optgroup label="Parciales">';		
			foreach($resulta as $res){
				if ($res["HF"]>0 && $res["calificado"]==0) {
					$html.='<option value="'.$res["value"].'"';
						if($jornadas[0]==$res["value"]) $html.= 'selected';
						$html.=' >'.utf8_encode($res["nombre"]." ".$res["apellido"]).'</option>';
				}
			}
				$html.='</optgroup>';
				$html.='<optgroup label="Calificados">';			
			foreach($resulta as $res){
				if ($res["HF"]>0 && $res["calificado"]==1) {
					$html.='<option value="'.$res["value"].'"';
						if($jornadas[0]==$res["value"]) $html.= 'selected';
						$html.=' >'.utf8_encode($res["nombre"]." ".$res["apellido"]).'</option>';
				}
			}
			$html.='</select>';
			echo $div;
			echo $html;
		}else if ($num==15) {
			$number = 8;
			$sql = "SELECT  P.programa, U.nombres, U.apellidos, U.idusuario, U.identificacion, D.jornadaid, J.jornada, D.dia, U.horas_formacion, C.calificado
			FROM programa as P
			RIGHT JOIN competencia as C ON P.idprograma = C.programaid
			INNER JOIN usuario as U ON C.usuarioid = U.idusuario
			INNER JOIN disponiblidad as D ON U.idusuario = D.usuarioid
            INNER JOIN jornada as J ON D.jornadaid = J.idjornada
			WHERE P.idprograma='".$grup."' AND J.idjornada=".$valor." AND D.dia=".$number." GROUP BY U.idusuario ";

			$sql1 = "SELECT grupoid, jornadaid, usuarioid FROM horario WHERE grupoid='".$varia."' AND dia='".$number."';";
		
			$conexionBD = new conexion();
			$conexionBD->conectarBD();
			$jorna = $conexionBD->ejeCon($sql,0);
			$hora = $conexionBD->ejeCon($sql1,0);
			$resulta=array();
			$jornadas;
			$j=0;
			for($j=0; $j < count($jorna); $j++){
					$resulta[$j]["value"]=$jorna[$j]["identificacion"];
					$resulta[$j]["nombre"]=$jorna[$j]["nombres"];
					$resulta[$j]["apellido"]=$jorna[$j]["apellidos"];
					$resulta[$j]["HF"]=$jorna[$j]["horas_formacion"];
					$resulta[$j]["CA"]=$jorna[$j]["calificado"];
			}

			foreach ($hora as $h ) {
				$jornadas[0]=$h["usuarioid"];
			}
			$div='<label>Instructor Actual:</label>';
			$html='<select name="day[8]"   style="width: 95px">';
			$html.='<option value="0">Seleccione</option>';				
			$html.='<optgroup label="Parciales">';		
			foreach($resulta as $res){
				if ($res["HF"]>0 && $res["calificado"]==0) {
					$html.='<option value="'.$res["value"].'"';
						if($jornadas[0]==$res["value"]) $html.= 'selected';
						$html.=' >'.utf8_encode($res["nombre"]." ".$res["apellido"]).'</option>';
				}
			}
				$html.='</optgroup>';
				$html.='<optgroup label="Calificados">';			
			foreach($resulta as $res){
				if ($res["HF"]>0 && $res["calificado"]==1) {
					$html.='<option value="'.$res["value"].'"';
						if($jornadas[0]==$res["value"]) $html.= 'selected';
						$html.=' >'.utf8_encode($res["nombre"]." ".$res["apellido"]).'</option>';
				}
			}
			$html.='</select>';
			echo $div;
			echo $html;
		}else if ($num==16) {
			$number = 9;
			$sql = "SELECT  P.programa, U.nombres, U.apellidos, U.idusuario, U.identificacion, D.jornadaid, J.jornada, D.dia, U.horas_formacion, C.calificado
			FROM programa as P
			RIGHT JOIN competencia as C ON P.idprograma = C.programaid
			INNER JOIN usuario as U ON C.usuarioid = U.idusuario
			INNER JOIN disponiblidad as D ON U.idusuario = D.usuarioid
            INNER JOIN jornada as J ON D.jornadaid = J.idjornada
			WHERE P.idprograma='".$grup."' AND J.idjornada=".$valor." AND D.dia=".$number." GROUP BY U.idusuario ";

			$sql1 = "SELECT grupoid, jornadaid, usuarioid FROM horario WHERE grupoid='".$varia."' AND dia='".$number."';";
		
			$conexionBD = new conexion();
			$conexionBD->conectarBD();
			$jorna = $conexionBD->ejeCon($sql,0);
			$hora = $conexionBD->ejeCon($sql1,0);
			$resulta=array();
			$jornadas;
			$j=0;
			for($j=0; $j < count($jorna); $j++){
					$resulta[$j]["value"]=$jorna[$j]["identificacion"];
					$resulta[$j]["nombre"]=$jorna[$j]["nombres"];
					$resulta[$j]["apellido"]=$jorna[$j]["apellidos"];
					$resulta[$j]["HF"]=$jorna[$j]["horas_formacion"];
					$resulta[$j]["CA"]=$jorna[$j]["calificado"];
			}

			foreach ($hora as $h ) {
				$jornadas[0]=$h["usuarioid"];
			}
			$div='<label>Instructor Actual:</label>';
			$html='<select name="day[9]"   style="width: 95px">';
			$html.='<option value="0">Seleccione</option>';				
			$html.='<optgroup label="Parciales">';		
			foreach($resulta as $res){
				if ($res["HF"]>0 && $res["calificado"]==0) {
					$html.='<option value="'.$res["value"].'"';
						if($jornadas[0]==$res["value"]) $html.= 'selected';
						$html.=' >'.utf8_encode($res["nombre"]." ".$res["apellido"]).'</option>';
				}
			}
				$html.='</optgroup>';
				$html.='<optgroup label="Calificados">';			
			foreach($resulta as $res){
				if ($res["HF"]>0 && $res["calificado"]==1) {
					$html.='<option value="'.$res["value"].'"';
						if($jornadas[0]==$res["value"]) $html.= 'selected';
						$html.=' >'.utf8_encode($res["nombre"]." ".$res["apellido"]).'</option>';
				}
			}
			$html.='</select>';
			echo $div;
			echo $html;
		}else if ($num==17) {
			$number = 10;
			$sql = "SELECT  P.programa, U.nombres, U.apellidos, U.idusuario, U.identificacion, D.jornadaid, J.jornada, D.dia, U.horas_formacion, C.calificado
			FROM programa as P
			RIGHT JOIN competencia as C ON P.idprograma = C.programaid
			INNER JOIN usuario as U ON C.usuarioid = U.idusuario
			INNER JOIN disponiblidad as D ON U.idusuario = D.usuarioid
            INNER JOIN jornada as J ON D.jornadaid = J.idjornada
			WHERE P.idprograma='".$grup."' AND J.idjornada=".$valor." AND D.dia=".$number." GROUP BY U.idusuario ";

			$sql1 = "SELECT grupoid, jornadaid, usuarioid FROM horario WHERE grupoid='".$varia."' AND dia='".$number."';";
		
			$conexionBD = new conexion();
			$conexionBD->conectarBD();
			$jorna = $conexionBD->ejeCon($sql,0);
			$hora = $conexionBD->ejeCon($sql1,0);
			$resulta=array();
			$jornadas;
			$j=0;
			for($j=0; $j < count($jorna); $j++){
					$resulta[$j]["value"]=$jorna[$j]["identificacion"];
					$resulta[$j]["nombre"]=$jorna[$j]["nombres"];
					$resulta[$j]["apellido"]=$jorna[$j]["apellidos"];
					$resulta[$j]["HF"]=$jorna[$j]["horas_formacion"];
					$resulta[$j]["CA"]=$jorna[$j]["calificado"];
			}

			foreach ($hora as $h ) {
				$jornadas[0]=$h["usuarioid"];
			}
			$div='<label>Instructor Actual:</label>';
			$html='<select name="day[10]"   style="width: 95px">';
			$html.='<option value="0">Seleccione</option>';				
			$html.='<optgroup label="Parciales">';		
			foreach($resulta as $res){
				if ($res["HF"]>0 && $res["calificado"]==0) {
					$html.='<option value="'.$res["value"].'"';
						if($jornadas[0]==$res["value"]) $html.= 'selected';
						$html.=' >'.utf8_encode($res["nombre"]." ".$res["apellido"]).'</option>';
				}
			}
				$html.='</optgroup>';
				$html.='<optgroup label="Calificados">';			
			foreach($resulta as $res){
				if ($res["HF"]>0 && $res["calificado"]==1) {
					$html.='<option value="'.$res["value"].'"';
						if($jornadas[0]==$res["value"]) $html.= 'selected';
						$html.=' >'.utf8_encode($res["nombre"]." ".$res["apellido"]).'</option>';
				}
			}
			$html.='</select>';
			echo $div;
			echo $html;
		}else if ($num==18) {
			$number = 11;
			$sql = "SELECT  P.programa, U.nombres, U.apellidos, U.idusuario, U.identificacion, D.jornadaid, J.jornada, D.dia, U.horas_formacion, C.calificado
			FROM programa as P
			RIGHT JOIN competencia as C ON P.idprograma = C.programaid
			INNER JOIN usuario as U ON C.usuarioid = U.idusuario
			INNER JOIN disponiblidad as D ON U.idusuario = D.usuarioid
            INNER JOIN jornada as J ON D.jornadaid = J.idjornada
			WHERE P.idprograma='".$grup."' AND J.idjornada=".$valor." AND D.dia=".$number." GROUP BY U.idusuario ";

			$sql1 = "SELECT grupoid, jornadaid, usuarioid FROM horario WHERE grupoid='".$varia."' AND dia='".$number."';";
		
			$conexionBD = new conexion();
			$conexionBD->conectarBD();
			$jorna = $conexionBD->ejeCon($sql,0);
			$hora = $conexionBD->ejeCon($sql1,0);
			$resulta=array();
			$jornadas;
			$j=0;
			for($j=0; $j < count($jorna); $j++){
					$resulta[$j]["value"]=$jorna[$j]["identificacion"];
					$resulta[$j]["nombre"]=$jorna[$j]["nombres"];
					$resulta[$j]["apellido"]=$jorna[$j]["apellidos"];
					$resulta[$j]["HF"]=$jorna[$j]["horas_formacion"];
					$resulta[$j]["CA"]=$jorna[$j]["calificado"];
			}

			foreach ($hora as $h ) {
				$jornadas[0]=$h["usuarioid"];
			}
			$div='<label>Instructor Actual:</label>';
			$html='<select name="day[11]"   style="width: 95px">';
			$html.='<option value="0">Seleccione</option>';				
			$html.='<optgroup label="Parciales">';		
			foreach($resulta as $res){
				if ($res["HF"]>0 && $res["calificado"]==0) {
					$html.='<option value="'.$res["value"].'"';
						if($jornadas[0]==$res["value"]) $html.= 'selected';
						$html.=' >'.utf8_encode($res["nombre"]." ".$res["apellido"]).'</option>';
				}
			}
				$html.='</optgroup>';
				$html.='<optgroup label="Calificados">';			
			foreach($resulta as $res){
				if ($res["HF"]>0 && $res["calificado"]==1) {
					$html.='<option value="'.$res["value"].'"';
						if($jornadas[0]==$res["value"]) $html.= 'selected';
						$html.=' >'.utf8_encode($res["nombre"]." ".$res["apellido"]).'</option>';
				}
			}
			$html.='</select>';
			echo $div;
			echo $html;
		}else if ($num==19) {
			$number = 12;
			$sql = "SELECT  P.programa, U.nombres, U.apellidos, U.idusuario, U.identificacion, D.jornadaid, J.jornada, D.dia, U.horas_formacion, C.calificado
			FROM programa as P
			RIGHT JOIN competencia as C ON P.idprograma = C.programaid
			INNER JOIN usuario as U ON C.usuarioid = U.idusuario
			INNER JOIN disponiblidad as D ON U.idusuario = D.usuarioid
            INNER JOIN jornada as J ON D.jornadaid = J.idjornada
			WHERE P.idprograma='".$grup."' AND J.idjornada=".$valor." AND D.dia=".$number." GROUP BY U.idusuario ";

			$sql1 = "SELECT grupoid, jornadaid, usuarioid FROM horario WHERE grupoid='".$varia."' AND dia='".$number."';";
		
			$conexionBD = new conexion();
			$conexionBD->conectarBD();
			$jorna = $conexionBD->ejeCon($sql,0);
			$hora = $conexionBD->ejeCon($sql1,0);
			$resulta=array();
			$jornadas;
			$j=0;
			for($j=0; $j < count($jorna); $j++){
					$resulta[$j]["value"]=$jorna[$j]["identificacion"];
					$resulta[$j]["nombre"]=$jorna[$j]["nombres"];
					$resulta[$j]["apellido"]=$jorna[$j]["apellidos"];
					$resulta[$j]["HF"]=$jorna[$j]["horas_formacion"];
					$resulta[$j]["CA"]=$jorna[$j]["calificado"];
			}

			foreach ($hora as $h ) {
				$jornadas[0]=$h["usuarioid"];
			}
			$div='<label>Instructor Actual:</label>';
			$html='<select name="day[12]"   style="width: 95px">';
			$html.='<option value="0">Seleccione</option>';				
			$html.='<optgroup label="Parciales">';		
			foreach($resulta as $res){
				if ($res["HF"]>0 && $res["calificado"]==0) {
					$html.='<option value="'.$res["value"].'"';
						if($jornadas[0]==$res["value"]) $html.= 'selected';
						$html.=' >'.utf8_encode($res["nombre"]." ".$res["apellido"]).'</option>';
				}
			}
				$html.='</optgroup>';
				$html.='<optgroup label="Calificados">';			
			foreach($resulta as $res){
				if ($res["HF"]>0 && $res["calificado"]==1) {
					$html.='<option value="'.$res["value"].'"';
						if($jornadas[0]==$res["value"]) $html.= 'selected';
						$html.=' >'.utf8_encode($res["nombre"]." ".$res["apellido"]).'</option>';
				}
			}
			$html.='</select>';
			echo $div;
			echo $html;
		}else if ($num==20) {
			$number = 13;
			$sql = "SELECT  P.programa, U.nombres, U.apellidos, U.idusuario, U.identificacion, D.jornadaid, J.jornada, D.dia, U.horas_formacion, C.calificado
			FROM programa as P
			RIGHT JOIN competencia as C ON P.idprograma = C.programaid
			INNER JOIN usuario as U ON C.usuarioid = U.idusuario
			INNER JOIN disponiblidad as D ON U.idusuario = D.usuarioid
            INNER JOIN jornada as J ON D.jornadaid = J.idjornada
			WHERE P.idprograma='".$grup."' AND J.idjornada=".$valor." AND D.dia=".$number." GROUP BY U.idusuario ";

			$sql1 = "SELECT grupoid, jornadaid, usuarioid FROM horario WHERE grupoid='".$varia."' AND dia='".$number."';";
		
			$conexionBD = new conexion();
			$conexionBD->conectarBD();
			$jorna = $conexionBD->ejeCon($sql,0);
			$hora = $conexionBD->ejeCon($sql1,0);
			$resulta=array();
			$jornadas;
			$j=0;
			for($j=0; $j < count($jorna); $j++){
					$resulta[$j]["value"]=$jorna[$j]["identificacion"];
					$resulta[$j]["nombre"]=$jorna[$j]["nombres"];
					$resulta[$j]["apellido"]=$jorna[$j]["apellidos"];
					$resulta[$j]["HF"]=$jorna[$j]["horas_formacion"];
					$resulta[$j]["CA"]=$jorna[$j]["calificado"];
			}

			foreach ($hora as $h ) {
				$jornadas[0]=$h["usuarioid"];
			}
			$div='<label>Instructor Actual:</label>';
			$html='<select name="day[13]"   style="width: 95px">';
			$html.='<option value="0">Seleccione</option>';				
			$html.='<optgroup label="Parciales">';		
			foreach($resulta as $res){
				if ($res["HF"]>0 && $res["calificado"]==0) {
					$html.='<option value="'.$res["value"].'"';
						if($jornadas[0]==$res["value"]) $html.= 'selected';
						$html.=' >'.utf8_encode($res["nombre"]." ".$res["apellido"]).'</option>';
				}
			}
				$html.='</optgroup>';
				$html.='<optgroup label="Calificados">';			
			foreach($resulta as $res){
				if ($res["HF"]>0 && $res["calificado"]==1) {
					$html.='<option value="'.$res["value"].'"';
						if($jornadas[0]==$res["value"]) $html.= 'selected';
						$html.=' >'.utf8_encode($res["nombre"]." ".$res["apellido"]).'</option>';
				}
			}
			$html.='</select>';
			echo $div;
			echo $html;
		}

	}

?>
