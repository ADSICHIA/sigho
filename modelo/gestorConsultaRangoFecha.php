<?php
include_once("../controlador/conexion.php");
class gestorConsultaRangoFecha extends conexion{
	//elaborado por:Mayra Alejandra Durango.
	function gestorConsultaRangoFecha(){
		
			
	}
	//---------recibe el numero de documento que traera la session y genera la consulta.
	//---------retorna el resultado de la consulta.
	//elaborado por:Mayra Alejandra Durango.
	function consultaHorario($doc,$fechaini,$fechafin){
		$this->conectarDB();
		$this->sql="select horario.cod_titulacion,horario.dia,horario.fecha_ini,horario.fecha_fin,titulacion.cod_titulacion,
					programas.nom_programa,jornada.descripcion,nivel.nom_nivel,ubicacion.nom_ubicacion,usuario.nom_usuario
					from usuario
					inner join horario on horario.doc_usuario=usuario.doc_usuario
					inner join titulacion on horario.cod_titulacion=titulacion.cod_titulacion
					inner join programas on titulacion.cod_programa=programas.cod_programa 
					inner join jornada on titulacion.cod_jornada=jornada.cod_jornada
					inner join nivel on programas.cod_nivel=nivel.cod_nivel
					inner join ubicacion on titulacion.cod_ubicacion=ubicacion.cod_ubicacion  where 

				(usuario.doc_usuario='".$doc."') and (horario.fecha_ini  between '".$fechaini."' and '".$fechaini."') 

				and (horario.fecha_fin  between '".$fechafin."' and '".$fechafin."')";
		$this->res=$this->SelectDato($this->sql);
		
		if(!$this->res){
			echo "no existe el dato ingresado";
		}else{
		
			return $this->res;
		}	
		
	}
	
	
	
	
}
?>