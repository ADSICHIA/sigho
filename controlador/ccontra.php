<?php
    include ("modelo/mcontra.php");
    $ins = new mcontra();
   
   // $dat1 = $ins->selper();
    //$documento = isset($_SESSION["documento"]) ? $_SESSION["documento"]:NULL;
    //$dat = $ins->selusu($documento);
   // $perusu = isset($_SESSION["perfil"]) ? $_SESSION["perfil"]:NULL;
    //Eliminar
   
    $documento = isset($_SESSION["documento"]) ? $_SESSION["documento"]:NULL;
    $del = isset($_GET["del"]) ? $_GET["del"]:NULL;
    if ($del){
        $ins->delapre($del);
    }
    
    $identificacion = isset($_POST["identificacion"]) ? $_POST["identificacion"]:NULL;
    $clave = isset($_POST["identificacion"]) ? $_POST["identificacion"]:NULL;
    $pass = isset ($_POST["pass"]) ? $_POST["pass"]:NULL;
    $actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;
  
    //echo $actu;

    $dat1 = $ins->selContra($documento);
        //Actualizar
    if ($documento && $actu) {
       $ins->UpDate($clave, $documento);
       echo "<script type='text/javascript'>alert('Sus contraseña se ha cambiado exitosamente.');window.location='home.php';</script>";
    }
         


?>