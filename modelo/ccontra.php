<?php
    include ("modelo/mcontra.php");

    $ins = new mcontra();
   
    $dat1 = $ins->selper();
    $documento = isset($_SESSION["documento"]) ? $_SESSION["documento"]:NULL;
    $dat = $ins->selusu($documento);
    $perusu = isset($_SESSION["perfil"]) ? $_SESSION["perfil"]:NULL;
    //Eliminar
    $del = isset($_GET["del"]) ? $_GET["del"]:NULL;
    if ($del){
        $ins->delapre($del);
    }
    

    //echo "aqui";
    $fechadeinicio = isset($_POST["fechadeinicio"]) ? $_POST["fechadeinicio"]:NULL;
    $telefono = isset($_POST["telefono"]) ? $_POST["telefono"]:NULL;
    $emails = isset($_POST["emails"]) ? $_POST["emails"]:NULL;
    $sangre = isset($_POST["sangre"]) ? $_POST["sangre"]:NULL;
    $dtx = isset($_POST["documentox"]) ? $_POST["documentox"]:NULL;
    $idper = isset($_POST["idper"]) ? $_POST["idper"]:NULL;
    $ndocapre = isset($_POST["ndocapre"]) ? $_POST["ndocapre"]:NULL;
    $tdocapre = isset($_POST["tdocapre"]) ? $_POST["tdocapre"]:NULL;
    $nox = isset($_POST["nomapre"]) ? $_POST["nomapre"]:NULL;
    $apex = isset($_POST["apeapre"]) ? $_POST["apeapre"]:NULL;
    $telapre = isset($_POST["telapre"]) ? $_POST["telapre"]:NULL;
    $genapre = isset($_POST["genapre"]) ? $_POST["genapre"]:NULL;
    $nlmiapre = isset($_POST["nlmiapre"]) ? $_POST["nlmiapre"]:NULL;
    $estcapre = isset($_POST["estcapre"]) ? $_POST["estcapre"]:NULL;
    $dirapre = isset($_POST["dirapre"]) ? $_POST["dirapre"]:NULL;
    $emaapre = isset($_POST["emaapre"]) ? $_POST["emaapre"]:NULL;
    $codubi = isset($_POST["codubi"]) ? $_POST["codubi"]:NULL;
    $fenaapre = isset($_POST["fenaapre"]) ? $_POST["fenaapre"]:NULL;
    $nfic = isset ($_POST["nfic"]) ? $_POST["nfic"]:NULL;
    $llamax = isset ($_POST["llamaapre"]) ? $_POST["llamaapre"]:NULL;
    $telex = isset ($_POST["teleapre"]) ? $_POST["teleapre"]:NULL;
    $pass = isset ($_POST["pass"]) ? $_POST["pass"]:NULL;
    $actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;
    $ndocaprex = isset($_POST["ndocaprex"]) ? $_POST["ndocaprex"]:NULL;
    $nomapre = ucwords(strtolower($nox));
    $apeapre = ucwords(strtolower($apex));
    $llamaapre = ucwords(strtolower($llamax));
    $teleapre = ucwords(strtolower($telex));
    //echo $actu;


        //Actualizar
    if ($ndocapre&&$actu) {
       $ins->UpDate($ndocaprex, $ndocapre, $tdocapre, $nomapre, $apeapre, $telapre, $genapre, $nlmiapre, $estcapre, $dirapre, $emaapre,$codubi,$fenaapre,$nfic, $llamaapre, $teleapre, $pass, $idper, $sangre, $emails, $telefono);
       echo "<script type='text/javascript'>alert('Sus Datos se han Actualizado exitosamente.');window.location='home.php';</script>";
    }
        //Actualizar2
    if ($ndocaprex&&$actu){
        //echo "ya casi";
        $ins->UpDateExplaboral($ndocaprex, $ndocapre);
        $ins->UpDateResapre($ndocaprex, $ndocapre);
        $ins->UpDateEncxapr($ndocaprex, $ndocapre);
        echo "<script type='text/javascript'>alert('Sus Datos se han Actualizado exitosamente.');window.location='home.php';</script>";
    }

    //echo "Insertar";
    if ($ndocapre&&$tdocapre&&$nomapre&&$apeapre&&$telapre&&$genapre&&$estcapre&&$dirapre&&$emaapre
        &&$codubi&&$fenaapre&&$nfic&&$llamaapre&&$teleapre&&$pass&&$idper&&$sangre&&!$actu){
        $duplicar = $ins->Duplicidad($ndocapre);
        if ($duplicar==0){
        $ins->insapre($ndocapre, $tdocapre, $nomapre, $apeapre, $telapre, $genapre, $nlmiapre, $estcapre, $dirapre, $emaapre, $codubi, $fenaapre, $nfic, $llamaapre, $teleapre, $pass, $idper, $sangre, $emails, $telefono, $fechadeinicio);
    //echo "ya casi";
        if($perusu==1 || $perusu==2){
            echo "<script type='text/javascript'>alert('Se ha registro satisfactoriamente.');window.location='home.php';</script>";
        }else {
           echo "<script type='text/javascript'>alert('Se ha registro satisfactoriamente.');window.location='index.php';</script>";   
        }    
        }else{
            echo "<script type='text/javascript'>alert('El usuario ya esta registrado.');window.location='index.php';</script>";
        }
    }   

        $dat34 = $ins-> selusu($dtx);
        $dat44 = $ins-> selusu1();
        $dat24 = $ins->selres1($documento); 

?>