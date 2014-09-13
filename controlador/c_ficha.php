<?php	
    include_once("./modelo/m_ficha.php");

	$elimi=isset($_POST["del"])?$_POST["del"]:NULL;
	if(!is_null($elimi)){
		eliminarFicha($elimi);
	}
	$actu=isset($_POST["actu"])?$_POST["actu"]:NULL;
	if(!is_null($actu)){
		$cod_titulacion= isset($_POST["cod_titulacion"])?$_POST["cod_titulacion"]:NULL;
		$cod_programa= isset($_POST["programa"])?$_POST["programa"]:NULL;
		$fecha_ini= isset($_POST["fini"])?$_POST["fini"]:NULL;
		$fecha_final=isset($_POST["ffin"])?$_POST["ffin"]:NULL;
		$cod_jornada= isset($_POST["jornada"])?$_POST["jornada"]:NULL;
		$cod_ubicacion= isset($_POST["ubicacion"])?$_POST["ubicacion"]:NULL;
		$dia=array(0,0,0,0,0,0,0);
		for($i=0;$i<7;$i++){
			$dia[$i]= isset ($_POST["dia".($i+1)]) ?$_POST["dia".($i+1)]:NULL;
		}
		//echo $cod_titulacion.", ".$cod_programa.", ".$fecha_ini.", ".$fecha_final.", ".$cod_jornada.", ".$cod_ubicacion;
		$actualiza=editarFicha($cod_titulacion, $cod_programa, $fecha_ini, $fecha_final, $cod_jornada, $cod_ubicacion, $dia);
	}
        
	$filtro=isset($_POST["programa"])?$_POST["programa"]:NULL;
        //include_once("../modelo/m_ficha.php");
        //var_dump($filtro);
	$lista_fichas=listarFichas($filtro);
        var_dump("aaaa");
	$programas=listarProgramas();
	$dia=array(0,0,0,0,0,0,0);
	for($i=0;$i<7;$i++){
		$dia[$i]= isset ($_POST["dia".($i+1)]) ?$_POST["dia".($i+1)]:NULL;
	}
        
	include("./vista/v_ficha.php");
        echo "HOla Controlador";
?>