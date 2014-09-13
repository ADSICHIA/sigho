<?php
session_start();
    function autenticar($user, $pass){
        if($user && $pass){
            require_once("conexion.php");
            $link=new conexion();
            $link->conectarDB();
            $query="SELECT * FROM usuario WHERE doc_usuario ='".$user."'";
            $result=mysql_query($query) or die("Error al ejecutar la consulta");
            if(count($result)==1){
                $row=mysql_fetch_array($result);
                if($row[3]==$pass){
                    $_SESSION["user"]["documento"]=$row[0];
                    $_SESSION["user"]["nombres"]=$row[1]." ".$row[2];
                    $_SESSION["autenticado"]=430025;
                    /*header("Location:home.php");
					return "El usuario se autentico exitosamente";*/
					echo "<script type='text/javascript'>window.location='home.php';</script>";
                }else{
                    session_destroy();
                    return "Usuario o clave invalidos";
                }
            }else{
                session_destroy();
                return "Usuario o clave invalidos";
            }
            
        }else{
            session_destroy();
            return "El usuario o clave no existe";
        }
    }

?>

