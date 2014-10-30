<?php

include("modelo/mjornada.php");

$ins=new mjornada();


$jornada = isset($_POST['jornada']) ? $_POST['jornada']:NULL;
$horaini = isset($_POST['horaini']) ? $_POST['horaini']:NULL;
$horafin = isset($_POST['horafin']) ? $_POST['horafin']:NULL;
$canti = isset($_POST['canti']) ? $_POST['canti']:NULL;
$actu = isset($_POST['actu']) ? $_POST['canti']:NULL;
$in = isset($_POST['in']) ? $_POST['in']:NULL;

if($jornada && $horaini && $horafin && $canti && !$actu){
    
    ?>
<script>
alert("La jornada ha sido creada exitosamente");
location.href = "";

</script>
    <?php
    
    $ins->inserjornada($jornada, $horaini, $horafin, $canti);
    
}

$jornada = $ins->seljornada();


?>
