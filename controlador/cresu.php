<?php
include ("modelo/mresu.php");

	$ins = new mresu();
    $pr = isset ($_GET["pr"]) ? $_GET["pr"]:NULL;
    $in = isset ($_GET["in"]) ? $_GET["in"]:NULL;

    $upd=$ins->selcom($pr);

    $del = isset ($_GET["del"]) ? $_GET["del"]:NULL;
    if($del){
        $ins->delresultado($del);
    }
  
 
    $pac = isset ($_GET["pac"]) ? $_GET["pac"]:NULL;
    $cod = isset($_POST["cod"]) ? $_POST["cod"]:NULL;
	$res = isset($_POST["res"]) ? $_POST["res"]:NULL;
    $actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;
	$compe = isset($_POST["compe"]) ? $_POST["compe"]:NULL;
    $exi = $ins->selexi($cod);

   if($cod && $res && $compe && !$actu){
        if($exi==null){
              $ins->insres($cod , $res , $compe); 
              echo "<script language='Javascript'>  alert ('El resultado se a creado correctamente.');</script>";  
              echo "<script type='text/Javascript'> window.location='home.php?pac=890';</script>";
          }else{
                echo "<script language='Javascript'>  alert ('Ese resultado ya existe.');</script>";
          } 
   }

   if($cod && $res && $compe && $actu){
          $ins->updres($cod , $res , $compe);  
          echo "<script language='Javascript'>  alert ('El resultado se actualizo correctamente.');</script>";  
          echo "<script type='text/Javascript'> window.location='home.php?pac=890';</script>";
   }
	$data = $ins->selresultado();

    $compe = $ins->selcompetencia();
  
	//$editar = $ins->selEditar($pr);
        

?>