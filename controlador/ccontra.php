<?php
    include ("modelo/mcontra.php");
    $ins = new mcontra();
   
   // $dat1 = $ins->selper();
    //$documento = isset($_SESSION["documento"]) ? $_SESSION["documento"]:NULL;
    //$dat = $ins->selusu($documento);
   // $perusu = isset($_SESSION["perfil"]) ? $_SESSION["perfil"]:NULL;
    //Eliminar
   
    $documento = isset($_SESSION["documento"]) ? $_SESSION["documento"]:NULL;
     $dat1 = $ins->selContra($documento);
    // $del = isset($_GET["del"]) ? $_GET["del"]:NULL;
    // if ($del){
    //     $ins->delapre($del);
    // }

    $pas1 = isset ($_POST["pas1"]) ? $_POST["pas1"]:NULL;
    $actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;
  
    // echo $documento;

   
        //Actualizar
    echo $documento,$pas1;
    if ($documento && $pas1) {
     
       $ins->UpDate($pas1, $documento);
       echo "<script type='text/javascript'>alert('Sus contraseña se ha cambiado exitosamente.');window.location='home.php';</script>";
    }
         


?>