<?php
include_once("../controlador/conexion.php");
class gestorResumenHoras extends conexion{
	//elaborado por:Mayra Alejandra Durango.
	function gestorResumenHoras(){
		
			
	}
	//---------recibe el numero de documento que traera la session y genera la consulta.
	//---------retorna el resultado de la consulta.
	//elaborado por:Mayra Alejandra Durango.
	function consultaHorario($doc,$fechaactual){
		$this->conectarDB();
		$this->sql="select jornada.hora_ini,jornada.hora_fin,(select hour(timediff(jornada.hora_ini,jornada.hora_fin)))as diferencia
					from
					usuario
					inner join horario on (usuario.doc_usuario=horario.doc_usuario)
					inner join titulacion on (horario.cod_titulacion=titulacion.cod_titulacion)
					inner join jornada on (titulacion.cod_jornada=jornada.cod_jornada) where usuario.doc_usuario='".$doc."' and (horario.fecha_ini  between '".$fechaactual."' and '".$fechaactual."')";
		$this->res=$this->SelectDato($this->sql);
		
		if(!$this->res){
			echo "no existe el dato ingresado";
		}else{
		
			return $this->res;
		}	
	}
	//---------recibe los registros devueltos por la consulta y los ubica en el vector que se asocia a los dias de la semana.
	//---------retorna el vector.
	//elaborado por:Mayra Alejandra Durango.
	function consultaHorarioActual($doc){
		$this->conectarDB();
		$this->sql="select horario.fecha_ini from horario where doc_usuario='".$doc."' order by fecha_ini desc";
		$this->res1=$this->SelectDato($this->sql);
		
		if(!$this->res1){
			echo "no existe el dato ingresado";
		}else{
		
			return $this->res1;
		}	
		
	
	}
	
	function ResumenHoras($res1){
	$i=0;
		while($i<count($res1)){
		
			$dif[]=$res1[$i]["diferencia"];
			$i++;
		}
		if(!$dif){
			echo "no existe el dato ingresado";
		}else{
			$y=0;
			$suma=0;
			while($y<count($dif)){
			
				//var_dump($this->res);
				$suma=$suma+$dif[$y];
			
					
				$y++;
			}
			return $suma;
		}
	}
}
?>