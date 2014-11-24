<?php
include ("modelo/mPrograma.php");
include ("modelo/mpagina.php");	
	
	$ins = new mPrograma();


	$delete = isset($_GET["del"]) ? $_GET["del"]:NULL;

    if ($delete){
    	$validaFicha = $ins->validaFicha($delete);
    	$validaCompetencia = $ins->validaCompetencia($delete);
    	if ($validaCompetencia[0]['resultado'] != 0 || $validaFicha[0]['resultado'] != 0){
    		echo "<script>alert('No es posible eliminar el programa ya que tiene fichas o competencias relacionadas'); window.location='home.php?pac=106';</script>";
    	}else{
      		$ins->delete($delete);
      	}
    }

	$mensaje="";

	$pac = isset ($_GET["pac"]) ? $_GET["pac"]:NULL;
    $filtro=isset($_GET["filtro"]) ? $_GET["filtro"]:NULL;
    $pr = isset($_GET['pr']) ? $_GET['pr']:NULL;
	$idprograma = isset ($_POST["idprograma"]) ? $_POST["idprograma"]:NULL;
	$programa = isset($_POST["programa"]) ? $_POST["programa"]:NULL;
	$version = isset($_POST["version"]) ? $_POST["version"]:NULL;
	$areaid = isset($_POST["areaid"]) ? $_POST["areaid"]:NULL;
	$actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;
	//$actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;
	$area =  $ins->selArea();
	$editar = $ins->selEditar($pr);
	
         
        if($idprograma!=NULL && $programa!=NULL && $version!=NULL && $areaid != NULL && $actu!=NULL){
            
            
            echo "No estan llegando las variables";
            
        }
        
        
        echo $idprograma;
        echo "<br>";
        echo $programa;
         echo "<br>";
        echo $version;
         echo "<br>";
        echo $areaid;
         echo "<br>";
        echo $actu;
        echo "Si estan llegando";
        
	if ($idprograma && $programa && $version && $areaid && $actu){
            
            
		$ins->update($idprograma,$programa,$version,$areaid);
	}
	
	if ($idprograma && $programa && $version && $areaid && !$actu){
		$resultado = $ins->validaPrograma($idprograma);
		if ($resultado){
			$mensaje = "El programa que intenta ingresar ya existe";
		}else{
			$ins->insert($idprograma,$programa,$version,$areaid);
		}
	}

	//Paginar
	$bo = "";
	$nreg = 10;//numero de registros a mostrar
	$pag = new mpagina($nreg);
	$conp ="SELECT count(idprograma)as Npe FROM programa";  
	if($filtro) $conp.= " WHERE programa.idprograma LIKE '%".$filtro."%'";

	$tabla = $ins->select();
?>