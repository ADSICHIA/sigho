<?php

include("modelo/mjornada.php");

$ins=new mjornada();


$jornada = isset($_POST['jornada']) ? $_POST['jornada']:NULL;
$horaini = isset($_POST['horaini']) ? $_POST['horaini']:NULL;
$horafin = isset($_POST['horafin']) ? $_POST['horafin']:NULL;
$canti = isset($_POST['canti']) ? $_POST['canti']:NULL;
$actua = isset($_POST['actua']) ? $_POST['actua']:NULL;
$pr = isset($_GET['pr']) ? $_GET['pr']:NULL;


echo $pr;


if($jornada && $horaini && $horafin && $canti && !$actua){
    
    ?>
<script>
alert("La jornada ha sido creada exitosamente");
location.href = "home.php";

</script>
    <?php
    
    $ins->inserjornada($jornada, $horaini, $horafin, $canti);
    
}

$jornada = $ins->seljornada();

if($pr){
$jornafilt = $ins->seledit($pr);
}


if($jornada && $horaini && $horafin && $canti && $actua){
    
    ?>
    
    <script>
       alert("La jornada se ha actualizado exitosamente");
       location.href = "home.php?pac=118";
    </script>
    

    <?php

    
    $ins->updjor($jornada, $horaini, $horafin, $canti, $actua);
    
}

?>
