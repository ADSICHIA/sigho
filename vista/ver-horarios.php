<?php

include ("../controlador/conexion.php");

	$valor = $_REQUEST["variables"];
	$num = $_REQUEST["Numero"];
	$varia = $_REQUEST["programa"];
	echo "programa: ".$valor.", numero: ".$num.", jornada: ".$hi;
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
			$html='<select name="grupo" id="grupo" required onchange="javascript:verCreados();RecargarProgramas(this.value,4,'.$varia.');vertable();" >';
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
		}else if ($num==4) {
			$sql = "SELECT H.grupoid, H.dia, H.usuarioid, H.jornadaid, U.nombres, U.apellidos, U.identificacion, J.jornada, J.hora_inicio, J.hora_fin
			FROM horario as H 
			INNER JOIN usuario as U ON H.usuarioid = U.identificacion
			INNER JOIN jornada as J ON H.jornadaid = J.idjornada
			WHERE H.grupoid = ".$valor."  ";

			$sql1 = "SELECT G.grupo, U.nombres, U.apellidos, U.idusuario, FG.fichaid, J.jornada, J.hora_inicio, J.hora_fin, G.idgrupo, J.idjornada
			FROM grupo as G
			INNER JOIN horario as H ON G.idgrupo = H.grupoid
			INNER JOIN jornada as J ON H.jornadaid = J.idjornada
			INNER JOIN ficha_grupo as FG ON G.idgrupo = FG.grupoid
			INNER JOIN ficha as F ON FG.fichaid = F.idficha
			INNER JOIN programa as P ON F.programaid = P.idprograma
			INNER JOIN competencia as C ON C.programaid = P.idprograma
			INNER JOIN usuario as U ON C.usuarioid = U.idusuario
			WHERE G.idgrupo = ".$valor." GROUP BY G.IDGRUPO ";

			$sql2 = "SELECT  P.programa, U.nombres, U.apellidos, U.idusuario, U.identificacion, D.jornadaid, J.jornada, D.dia, J.idjornada
			FROM programa as P
			RIGHT JOIN competencia as C ON P.idprograma = C.programaid
			INNER JOIN usuario as U ON C.usuarioid = U.idusuario
			INNER JOIN disponiblidad as D ON U.idusuario = D.usuarioid
            INNER JOIN jornada as J ON D.jornadaid = J.idjornada
			WHERE P.idprograma=".$varia." ";

			$conexionBD = new conexion();
			$conexionBD->conectarBD();
			$estados = $conexionBD->ejeCon($sql,0);
			$instructores = $conexionBD->ejeCon($sql1,0);
			$docentes = $conexionBD->ejeCon($sql2,0);
			$resulta=array();
			$segundo=array();
			$x=0;
			$jornada = 0;
			$idinstructor;
			for($j=0; $j < count($instructores); $j++){
				$segundo[$j]["idgrup"]=$instructores[$j]["idgrupo"];
				$segundo[$j]["grup"]=$instructores[$j]["grupo"];
				$segundo[$j]["nombre"]=$instructores[$j]["nombres"];
				$segundo[$j]["apellido"]=$instructores[$j]["apellidos"];
				$segundo[$j]["jorna"]=$instructores[$j]["jornada"];
				$segundo[$j]["idjorna"]=$instructores[$j]["idjornada"];
				$segundo[$j]["inicio"]=$instructores[$j]["hora_inicio"];
				$segundo[$j]["fin"]=$instructores[$j]["hora_fin"];
			}

			for($j=0; $j < 7; $j++){
				$instructor[$j]="<label>No hay Instructor</label>";
			}

			foreach($estados as $res){
				if ($res["jornadaid"]==1) {
					$jornada = 1;
				} else if ($res["jornadaid"]==2) {
					$jornada = 2;
				} else if ($res["jornadaid"]==3) {
					$jornada = 3;
				} else if ($res["jornadaid"]==4) {
					$jornada = 4;
				}else if ($res["jornadaid"]==5) {
					$jornada = 5;
				}

				if ($res["dia"]==7) {
					$instructor[0]=$res["nombres"]." ".$res["apellidos"];
					$idinstructor[0]=$res["identificacion"];
				} else if ($res["dia"]==8) {
					$instructor[1]=$res["nombres"]." ".$res["apellidos"];
					$idinstructor[1]=$res["identificacion"];
				} else if ($res["dia"]==9) {
					$instructor[2]=$res["nombres"]." ".$res["apellidos"];
					$idinstructor[2]=$res["identificacion"];
				} else if ($res["dia"]==10) {
					$instructor[3]=$res["nombres"]." ".$res["apellidos"];
					$idinstructor[3]=$res["identificacion"];
				} else if ($res["dia"]==11) {
					$instructor[4]=$res["nombres"]." ".$res["apellidos"];
					$idinstructor[4]=$res["identificacion"];
				} else if ($res["dia"]==12) {
					$instructor[5]=$res["nombres"]." ".$res["apellidos"];
					$idinstructor[5]=$res["identificacion"];
				} else if ($res["dia"]==13) {
					$instructor[6]=$res["nombres"]." ".$res["apellidos"];
					$idinstructor[6]=$res["identificacion"];
				} 
				$x++;
			}

				$aye = '<table align="center" border="0" cellspacing="" cellpadding="3" width="920px">';
				foreach($segundo as $seg){
				$aye.= '<tr><td><label>Nombre del Grupo:  '.$seg["grup"].'</label><input type="hidden" name="grupo" value="'.$seg["idgrup"].'" /></td>';
				}
				foreach($segundo as $res){
				$aye.= '<td><label>Jornada del Grupo:  '.$res["jorna"].'</label></td></tr>';
				}
				foreach($segundo as $res){
				$aye.= '<tr><td><label>Director del Grupo:  '.$res["nombre"].'  '.$res["apellido"].'</label></td><td><label>Horario de la Jornada: desde las '.$res["inicio"].' hasta las '.$res["fin"].'</label></td></tr>';
				}
				$aye.= '<tr><td>&nbsp;</td></tr>';
				$aye.= '</table>';
				$boton = '<input type="submit" value="Actualizar" />';
				$msj = 'Instructor Actual: ';

			if ($jornada==5) {
				
				$div = '<div class="coll"><input type="hidden" name="actu" value="actu" /><input type="hidden" name="jornada" value="1" />';
				$div.= '<div id="day" align="center" class="dias">Lunes</div>';
				$div.= '<div id="day1" align="center" class="dias">Martes</div>';
				$div.= '<div id="day2" align="center" class="dias">Miercoles</div>';
				$div.= '<div id="day3" align="center" class="dias">Jueves</div>';
				$div.= '<div id="day4" align="center" class="dias">Viernes</div>';
				$div.= '<div id="day5" align="center" class="dias">Sabado</div>';
				$div.= '</div>';
				echo $aye;
				echo $div;
				$div1 = '<div class="coll">';
				$div1.= '<div id="cont" align="center" class="reis"><label>'.$msj.'</label><br><select name="day[7]" class="selec"><option value="">Seleccione</option>';
				foreach ($docentes as $va) {
					if ($va["dia"]==7 && $va["idjornada"]==1) {
						$div1.='<option value="'.$va["identificacion"].'"';
						if($idinstructor[0]==$va["identificacion"]) $div1.= 'selected';
						$div1.=' >'.$va["nombres"].' '.$va["apellidos"].'</option>';
					}
				}
				$div1.='</select></div>';
				$div1.= '<div id="cont1" align="center" class="reis"><label>'.$msj.'</label><br><select name="day[8]" class="selec"><option value="">Seleccione</option>';
				foreach ($docentes as $va) {
					if ($va["dia"]==8 && $va["idjornada"]==1) {
						$div1.='<option value="'.$va["identificacion"].'"';
						if($idinstructor[1]==$va["identificacion"]) $div1.= 'selected';
						$div1.=' >'.$va["nombres"].' '.$va["apellidos"].'</option>';
					}
				}
				$div1.='</select></div>';
				$div1.= '<div id="cont2" align="center" class="reis"><label>'.$msj.'</label><br><select name="day[9]" class="selec"><option value="">Seleccione</option>';
				foreach ($docentes as $va) {
					if ($va["dia"]==9 && $va["idjornada"]==1) {
						$div1.='<option value="'.$va["identificacion"].'"';
						if($idinstructor[2]==$va["identificacion"]) $div1.= 'selected';
						$div1.=' >'.$va["nombres"].' '.$va["apellidos"].'</option>';
					}
				}
				$div1.='</select></div>';
				$div1.= '<div id="cont3" align="center" class="reis"><label>'.$msj.'</label><br><select name="day[10]" class="selec"><option value="">Seleccione</option>';
				foreach ($docentes as $va) {
					if ($va["dia"]==10 && $va["idjornada"]==1) {
						$div1.='<option value="'.$va["identificacion"].'"';
						if($idinstructor[3]==$va["identificacion"]) $div1.= 'selected';
						$div1.=' >'.$va["nombres"].' '.$va["apellidos"].'</option>';
					}
				}
				$div1.='</select></div>';
				$div1.= '<div id="cont4" align="center" class="reis"><label>'.$msj.'</label><br><select name="day[11]" class="selec"><option value="">Seleccione</option>';
				foreach ($docentes as $va) {
					if ($va["dia"]==11 && $va["idjornada"]==1) {
						$div1.='<option value="'.$va["identificacion"].'"';
						if($idinstructor[4]==$va["identificacion"]) $div1.= 'selected';
						$div1.=' >'.$va["nombres"].' '.$va["apellidos"].'</option>';
					}
				}
				$div1.='</select></div>';
				$div1.= '<div id="cont5" align="center" class="reis"><label>'.$msj.'</label><br><select name="day[12]" class="selec"><option value="">Seleccione</option>';
				foreach ($docentes as $va) {
					if ($va["dia"]==12 && $va["idjornada"]==1) {
						$div1.='<option value="'.$va["identificacion"].'"';
						if($idinstructor[5]==$va["identificacion"]) $div1.= 'selected';
						$div1.=' >'.$va["nombres"].' '.$va["apellidos"].'</option>';
					}
				}
				$div1.='</select></div>';
				$div1.= '</div>';
				echo $div1;
				echo $boton;
			} else if ($jornada==1) {
				$div = '<div class="coll">';
				$div.= '<div id="day" align="center" class="dias">Lunes</div>';
				$div.= '<div id="day1" align="center" class="dias">Martes</div>';
				$div.= '<div id="day2" align="center" class="dias">Miercoles</div>';
				$div.= '<div id="day3" align="center" class="dias">Jueves</div>';
				$div.= '<div id="day4" align="center" class="dias">Viernes</div>';
				$div.= '</div>';
				echo $aye;
				echo $div;
				$div1 = '<div class="coll">';
				$div1.= '<div id="cont" align="center" class="reis"><label>'.$msj.'</label><br><select name="day[7]" class="selec"><option value="">Seleccione</option>';
				foreach ($docentes as $va) {
					if ($va["dia"]==7 && $va["idjornada"]==1) {
						$div1.='<option value="'.$va["identificacion"].'"';
						if($idinstructor[0]==$va["identificacion"]) $div1.= 'selected';
						$div1.=' >'.$va["nombres"].' '.$va["apellidos"].'</option>';
					}
				}
				$div1.='</select></div>';
				$div1.= '<div id="cont" align="center" class="reis"><label>'.$msj.'</label><br><select name="day[8]" class="selec"><option value="">Seleccione</option>';
				foreach ($docentes as $va) {
					if ($va["dia"]==8 && $va["idjornada"]==1) {
						$div1.='<option value="'.$va["identificacion"].'"';
						if($idinstructor[1]==$va["identificacion"]) $div1.= 'selected';
						$div1.=' >'.$va["nombres"].' '.$va["apellidos"].'</option>';
					}
				}
				$div1.='</select></div>';
				$div1.= '<div id="cont2" align="center" class="reis"><label>'.$msj.'</label><br><select name="day[9]" class="selec"><option value="">Seleccione</option>';
				foreach ($docentes as $va) {
					if ($va["dia"]==9 && $va["idjornada"]==1) {
						$div1.='<option value="'.$va["identificacion"].'"';
						if($idinstructor[2]==$va["identificacion"]) $div1.= 'selected';
						$div1.=' >'.$va["nombres"].' '.$va["apellidos"].'</option>';
					}
				}
				$div1.='</select></div>';
				$div1.= '<div id="cont2" align="center" class="reis"><label>'.$msj.'</label><br><select name="day[10]" class="selec"><option value="">Seleccione</option>';
				foreach ($docentes as $va) {
					if ($va["dia"]==10 && $va["idjornada"]==1) {
						$div1.='<option value="'.$va["identificacion"].'"';
						if($idinstructor[3]==$va["identificacion"]) $div1.= 'selected';
						$div1.=' >'.$va["nombres"].' '.$va["apellidos"].'</option>';
					}
				}
				$div1.='</select></div>';
				$div1.= '<div id="cont2" align="center" class="reis"><label>'.$msj.'</label><br><select name="day[11]" class="selec"><option value="">Seleccione</option>';
				foreach ($docentes as $va) {
					if ($va["dia"]==11 && $va["idjornada"]==1) {
						$div1.='<option value="'.$va["identificacion"].'"';
						if($idinstructor[4]==$va["identificacion"]) $div1.= 'selected';
						$div1.=' >'.$va["nombres"].' '.$va["apellidos"].'</option>';
					}
				}
				$div1.='</select></div>';
				$div1.= '</div>';
				echo $div1;
				echo $boton;
			}else if ($jornada==2) {
				$div = '<div class="coll">';
				$div.= '<div id="day" align="center" class="dias">Lunes</div>';
				$div.= '<div id="day1" align="center" class="dias">Martes</div>';
				$div.= '<div id="day2" align="center" class="dias">Miercoles</div>';
				$div.= '<div id="day3" align="center" class="dias">Jueves</div>';
				$div.= '<div id="day4" align="center" class="dias">Viernes</div>';
				$div.= '</div>';
				echo $aye;
				echo $div;
				$div1 = '<div class="coll">';
				$div1.= '<div id="cont" align="center" class="reis"><label>'.$msj.'</label><br><select name="day[7]" class="selec"><option value="">Seleccione</option>';
				foreach ($docentes as $va) {
					if ($va["dia"]==7 && $va["idjornada"]==2) {
						$div1.='<option value="'.$va["identificacion"].'"';
						if($idinstructor[0]==$va["identificacion"]) $div1.= 'selected';
						$div1.=' >'.$va["nombres"].' '.$va["apellidos"].'</option>';
					}
				}
				$div1.='</select></div>';
				$div1.= '<div id="cont" align="center" class="reis"><label>'.$msj.'</label><br><select name="day[8]" class="selec"><option value="">Seleccione</option>';
				foreach ($docentes as $va) {
					if ($va["dia"]==8 && $va["idjornada"]==2) {
						$div1.='<option value="'.$va["identificacion"].'"';
						if($idinstructor[1]==$va["identificacion"]) $div1.= 'selected';
						$div1.=' >'.$va["nombres"].' '.$va["apellidos"].'</option>';
					}
				}
				$div1.='</select></div>';
				$div1.= '<div id="cont2" align="center" class="reis"><label>'.$msj.'</label><br><select name="day[9]" class="selec"><option value="">Seleccione</option>';
				foreach ($docentes as $va) {
					if ($va["dia"]==9 && $va["idjornada"]==2) {
						$div1.='<option value="'.$va["identificacion"].'"';
						if($idinstructor[2]==$va["identificacion"]) $div1.= 'selected';
						$div1.=' >'.$va["nombres"].' '.$va["apellidos"].'</option>';
					}
				}
				$div1.='</select></div>';
				$div1.= '<div id="cont2" align="center" class="reis"><label>'.$msj.'</label><br><select name="day[10]" class="selec"><option value="">Seleccione</option>';
				foreach ($docentes as $va) {
					if ($va["dia"]==10 && $va["idjornada"]==2) {
						$div1.='<option value="'.$va["identificacion"].'"';
						if($idinstructor[3]==$va["identificacion"]) $div1.= 'selected';
						$div1.=' >'.$va["nombres"].' '.$va["apellidos"].'</option>';
					}
				}
				$div1.='</select></div>';
				$div1.= '<div id="cont2" align="center" class="reis"><label>'.$msj.'</label><br><select name="day[11]" class="selec"><option value="">Seleccione</option>';
				foreach ($docentes as $va) {
					if ($va["dia"]==11 && $va["idjornada"]==2) {
						$div1.='<option value="'.$va["identificacion"].'"';
						if($idinstructor[4]==$va["identificacion"]) $div1.= 'selected';
						$div1.=' >'.$va["nombres"].' '.$va["apellidos"].'</option>';
					}
				}
				$div1.='</select></div>';
				$div1.= '</div>';
				echo $div1;
				echo $boton;
			} else if ($jornada==3) {
				$div = '<div class="coll">';
				$div.= '<div id="day" align="center" class="dias">Lunes</div>';
				$div.= '<div id="day1" align="center" class="dias">Martes</div>';
				$div.= '<div id="day2" align="center" class="dias">Miercoles</div>';
				$div.= '<div id="day3" align="center" class="dias">Jueves</div>';
				$div.= '<div id="day4" align="center" class="dias">Viernes</div>';
				$div.= '</div>';
				echo $aye;
				echo $div;
				$div1 = '<div class="coll">';
				$div1.= '<div id="cont2" align="center" class="reis"><label>'.$msj.'</label><br><select name="day[7]" class="selec"><option value="">Seleccione</option>';
				foreach ($docentes as $va) {
					if ($va["dia"]==7 && $va["idjornada"]==3) {
						$div1.='<option value="'.$va["identificacion"].'"';
						if($idinstructor[0]==$va["identificacion"]) $div1.= 'selected';
						$div1.=' >'.$va["nombres"].' '.$va["apellidos"].'</option>';
					}
				}
				$div1.='</select></div>';
				$div1.= '<div id="cont2" align="center" class="reis"><label>'.$msj.'</label><br><select name="day[8]" class="selec"><option value="">Seleccione</option>';
				foreach ($docentes as $va) {
					if ($va["dia"]==8 && $va["idjornada"]==3) {
						$div1.='<option value="'.$va["identificacion"].'"';
						if($idinstructor[1]==$va["identificacion"]) $div1.= 'selected';
						$div1.=' >'.$va["nombres"].' '.$va["apellidos"].'</option>';
					}
				}
				$div1.= '<div id="cont2" align="center" class="reis"><label>'.$msj.'</label><br><select name="day[9]" class="selec"><option value="">Seleccione</option>';
				foreach ($docentes as $va) {
					if ($va["dia"]==9 && $va["idjornada"]==3) {
						$div1.='<option value="'.$va["identificacion"].'"';
						if($idinstructor[2]==$va["identificacion"]) $div1.= 'selected';
						$div1.=' >'.$va["nombres"].' '.$va["apellidos"].'</option>';
					}
				}
				$div1.= '<div id="cont2" align="center" class="reis"><label>'.$msj.'</label><br><select name="day[10]" class="selec"><option value="">Seleccione</option>';
				foreach ($docentes as $va) {
					if ($va["dia"]==10 && $va["idjornada"]==3) {
						$div1.='<option value="'.$va["identificacion"].'"';
						if($idinstructor[3]==$va["identificacion"]) $div1.= 'selected';
						$div1.=' >'.$va["nombres"].' '.$va["apellidos"].'</option>';
					}
				}
				$div1.= '<div id="cont2" align="center" class="reis"><label>'.$msj.'</label><br><select name="day[11]" class="selec"><option value="">Seleccione</option>';
				foreach ($docentes as $va) {
					if ($va["dia"]==11 && $va["idjornada"]==3) {
						$div1.='<option value="'.$va["identificacion"].'"';
						if($idinstructor[4]==$va["identificacion"]) $div1.= 'selected';
						$div1.=' >'.$va["nombres"].' '.$va["apellidos"].'</option>';
					}
				}
				$div1.= '</div>';
				echo $div1;
				echo $boton;
			} else if ($jornada==4) {
				$div = '<div class="coll">';
				$div.= '<div id="day" align="center" class="dias">Sabado</div>';
				$div.= '<div id="day1" align="center" class="dias">Domingo</div>';
				$div.= '</div>';
				echo $aye;
				echo $div;
				$div1 = '<div class="coll">';
				$div1.= '<div id="cont2" align="center" class="reis"><label>'.$msj.'</label><br><select name="day[12]" class="selec"><option value="">Seleccione</option>';
				foreach ($docentes as $va) {
					if ($va["dia"]==12 && $va["idjornada"]==4) {
						$div1.='<option value="'.$va["identificacion"].'"';
						if($idinstructor[5]==$va["identificacion"]) $div1.= 'selected';
						$div1.=' >'.$va["nombres"].' '.$va["apellidos"].'</option>';
					}
				}
				$div1.= '<div id="cont2" align="center" class="reis"><label>'.$msj.'</label><br><select name="day[13]" class="selec"><option value="">Seleccione</option>';
				foreach ($docentes as $va) {
					if ($va["dia"]==13 && $va["idjornada"]==4) {
						$div1.='<option value="'.$va["identificacion"].'"';
						if($idinstructor[6]==$va["identificacion"]) $div1.= 'selected';
						$div1.=' >'.$va["nombres"].' '.$va["apellidos"].'</option>';
					}
				}
				$div1.= '</div>';
				echo $div1;
				echo $boton;
			}
		
		}

	}

?>
