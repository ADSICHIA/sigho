<?php
 	include_once ('../controlador/conexion.php');
	class gestorRango extends conexion {
		
		function gestorRango (){
			
		}
		function consultarficha($ficha,$fechaini,$fechafin){ 
		//$cod_titulacion= isset ($_POST["cod_titulacion"])? $_POST["cod_titulacion"]:NULL;
		//if($cod_titulacion){
		//echo "Entre";
		//$con= new conexion();
		$this->ConectarDB();
		//$sql="SELECT * FROM horario WHERE cod_titulacion='".$cod_titulacion."'";
		$this->sql="SELECT horario.cod_titulacion ,horario.dia ,horario.fecha_ini ,horario.fecha_fin ,titulacion.cod_titulacion ,programas.nom_programa,jornada.descripcion ,nivel.nom_nivel ,ubicacion.nom_ubicacion ,usuario.nom_usuario
		
		FROM usuario
		INNER JOIN horario ON usuario.doc_usuario=horario.doc_usuario
		INNER JOIN titulacion ON horario.cod_titulacion=titulacion.cod_titulacion 
		INNER JOIN programas ON titulacion.cod_programa= programas.cod_programa 
		INNER JOIN jornada ON titulacion.cod_jornada= jornada.cod_jornada
		INNER JOIN nivel ON programas.cod_nivel= nivel.cod_nivel
		INNER JOIN ubicacion ON titulacion.cod_ubicacion= ubicacion.cod_ubicacion WHERE 
		
		(titulacion.cod_titulacion='".$ficha."') and (horario.fecha_ini>='".$fechaini."') and (horario.fecha_fin <='".$fechafin."')";
		
		$this->res= $this->SelectDato($this->sql);
		//var_dump($res);
		if(!$this->res){
			echo "no se encuentra el datos que digito";
		}else{
			return $this->res;
		}
		
	  }
	}
 ?>