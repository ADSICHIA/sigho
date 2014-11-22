<?php
    session_start();
    if(!$_SESSION["autentificado"]==10 || (isset($_GET["pac"]) && $_GET["pac"]=="logout")){
      	session_destroy();
    	header('Location: index.php');
    }
?>