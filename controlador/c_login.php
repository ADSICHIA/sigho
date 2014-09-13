<?php
    require_once("modelo/m_login.php");
    $result="";
    $user=isset($_POST["user"])?$_POST["user"]:NULL;
    $pass=isset($_POST["password"])?$_POST["password"]:NULL;
    if($user && pass){
        $estado=autentica($user,$pass);
        if($estado){
            //echo "<script type='text/javascript'>window.location='../index.php';</script>";
            //header("Location: index.php?vista=horario.php");
            
        }
    }
// var_dump($user);
//        $tado=autenticar($user, $pass);
//	if($tado=="El usuario se autentico exitosamente")
//    	echo "<script type='text/javascript'>window.location='home.php';</script>";
	
    //include_once ("vista/v_login.php");
	
?>
