<?php  

include_once("vista/v_recupcont.php");
include_once("modelo/m_recupcont.php");
$btn= isset ($_POST["btn"])?$_POST["btn"]:NULL;
$doc= isset ($_POST["txt_doc"])?$_POST["txt_doc"]:NULL;
$validacion=validacion_envio($btn, $doc);


?>