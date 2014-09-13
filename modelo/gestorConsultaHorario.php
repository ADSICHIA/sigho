<?php
include_once("../controlador/conexion.php");
class gestorConsultaHorario extends conexion{
	//elaborado por:Mayra Alejandra Durango.
	function gestorConsultaHorario(){
		
			
	}
	//---------recibe el numero de documento que traera la session y genera la consulta.
	//---------retorna el resultado de la consulta.
	//elaborado por:Mayra Alejandra Durango.
	function consultaHorario($doc,$fechaactual){
		$this->conectarDB();
		$this->sql="select horario.cod_titulacion,horario.dia,titulacion.cod_titulacion,programas.nom_programa,jornada.descripcion,nivel.nom_nivel,ubicacion.nom_ubicacion
				from
				horario
				inner join titulacion on horario.cod_titulacion=titulacion.cod_titulacion
				 inner join programas on titulacion.cod_programa=programas.cod_programa 
				inner join jornada on titulacion.cod_jornada=jornada.cod_jornada
				inner join nivel on programas.cod_nivel=nivel.cod_nivel
				inner join ubicacion on titulacion.cod_ubicacion=ubicacion.cod_ubicacion where (doc_usuario='".$doc."') and (horario.fecha_ini >='".$fechaactual."')";
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
	
	//---------recibe los registros devueltos por la consulta y los ubica en el vector que se asocia a los dias de la semana.
	//---------retorna el vector.
	//elaborado por:Mayra Alejandra Durango.
	function consultarDatosHorario($res){
		$i=0;
		while($i<count($res)){
			if($res[$i]["dia"]=="Lunes"){
				$vec[0]="Ficha: ".$res[$i]['cod_titulacion']." Nombre Programa: ".$res[$i]["nom_programa"]." Nivel:".$res[$i]["nom_nivel"]." Aula : ".$res[$i]["nom_ubicacion"]." Jornada: ".$res[$i]["descripcion"]."";
				}else if($res[$i]["dia"]=="Martes"){
					$vec[1]="Ficha: ".$res[$i]['cod_titulacion']." Nombre Programa: ".$res[$i]["nom_programa"]." Nivel:".$res[$i]["nom_nivel"]." Aula : ".$res[$i]["nom_ubicacion"]." Jornada: ".$res[$i]["descripcion"]."";
				}else if($res[$i]["dia"]=="Miercoles"){
					$vec[2]="Ficha: ".$res[$i]['cod_titulacion']." Nombre Programa: ".$res[$i]["nom_programa"]." Nivel:".$res[$i]["nom_nivel"]." Aula : ".$res[$i]["nom_ubicacion"]." Jornada: ".$res[$i]["descripcion"]."";
				}else if($res[$i]["dia"]=="Jueves"){
					$vec[3]="Ficha: ".$res[$i]['cod_titulacion']." Nombre Programa: ".$res[$i]["nom_programa"]." Nivel:".$res[$i]["nom_nivel"]." Aula : ".$res[$i]["nom_ubicacion"]." Jornada: ".$res[$i]["descripcion"]."";
				}else if($res[$i]["dia"]=="Viernes"){
					$vec[4]="Ficha: ".$res[$i]['cod_titulacion']." Nombre Programa: ".$res[$i]["nom_programa"]." Nivel:".$res[$i]["nom_nivel"]." Aula : ".$res[$i]["nom_ubicacion"]." Jornada: ".$res[$i]["descripcion"]."";
				}else if($res[$i]["dia"]=="Sabado"){
					$vec[5]="Ficha: ".$res[$i]['cod_titulacion']." Nombre Programa: ".$res[$i]["nom_programa"]." Nivel:".$res[$i]["nom_nivel"]." Aula : ".$res[$i]["nom_ubicacion"]." Jornada: ".$res[$i]["descripcion"]."";
				}else if($res[$i]["dia"]=="Domingo"){
					$vec[6]="Ficha: ".$res[$i]['cod_titulacion']." Nombre Programa: ".$res[$i]["nom_programa"]." Nivel:".$res[$i]["nom_nivel"]." Aula : ".$res[$i]["nom_ubicacion"]." Jornada: ".$res[$i]["descripcion"]."";
				}
				
				$i++;
		}
		return $vec;
	}
}
?>