
<script type="text/javascript"></script>
<?php

include ("modelo/mdisponi.php");

$ins = new mdisponi();


//print_r($_POST );

$pac = 109;


$usuarioid = isset($_SESSION["idUser"]) ? $_SESSION["idUser"] : NULL;
;


if (isset($_POST['chequeo'])) {

    $ins->deldisponi($usuarioid);

    if (is_array($_POST['chequeo'])) {
        $jdaux = "";
        foreach ($_POST['chequeo'] as $key => $value) {
            $jdaux = explode("_", $key);

            $ins->insertdispo($jdaux[0], $usuarioid, $jdaux[1], $value, $grupo = null);
            //print_r($jdaux);
        }
    }
}
?>
 