<?php
	include ("modelo/mdisponi.php");
       
        $ins = new mdisponi();

       
//print_r($_POST );


 
        
        
//      $del = isset($_GET["del"]) ? $_GET["del"]:NULL;
//	if ($del){
//            $ins->deldisponi($del);
//	}
//        usuario ".$_POST['usuarios']
 
$usuarioid = isset($_SESSION["idUser"])?$_SESSION["idUser"]:NULL;

if (isset($_POST['chequeo'])) {
    
    $ins->deldisponi($usuarioid); 
    
   if (is_array($_POST['chequeo'])) {
    $jdaux = "";
        foreach ($_POST['chequeo'] as $key => $value) {
            $jdaux = explode("_",$key );
            
            echo " <br> inserte esto  Jornada ".$jdaux[0]." usuario ".$usuarioid." dia ".$jdaux[1]."  dispo ".$value;
              
		$ins->insertdispo($jdaux[0],$usuarioid,$jdaux[1],$value,$grupo=null);
               
	}
        
    }
}    

          
 
?>

 
        
        
<!--        
        
        
       $pu = isset($_POST["chequeo"]) ? $_POST["chequeo"]:NULL;
        $usuarioid = isset($_POST["usuarios"]) ? $_POST["usuarios"]:NULL;
//	$dia = isset($_POST["dia"]) ? $_POST["dia"]:NULL;
//	$disponible = isset($_POST["disponible"]) ? $_POST["disponible"]:null;
//	$grupoid = isset($_POST["grupo"]) ? $_POST["grupo"]:NULL;
//	$actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;
//        
       echo "que es esto : "."$pu";
//                  
//	//Actualizar
//	if ($iddisponiblidad && $jornadaid && $usuarioid && $dia && $disponible && $grupoid  && $actu){
//		$ins->updatedispo($iddisponiblidad, $jornadaid, $usuarioid, $dia, $disponible, $grupoid);
//	}
//	
//       

//	$pr = isset($_GET["pr"]) ? $_GET["pr"]:NULL;
//          $dat = $ins->seldispo1($pr);
            ?>-->