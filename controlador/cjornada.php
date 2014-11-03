<?php

include("modelo/mjornada.php");

$ins=new mjornada();


$jornada = isset($_POST['jornada']) ? $_POST['jornada']:NULL;
$horaini = isset($_POST['horaini']) ? $_POST['horaini']:NULL;
$horafin = isset($_POST['horafin']) ? $_POST['horafin']:NULL;
$canti = isset($_POST['canti']) ? $_POST['canti']:NULL;
$actua = isset($_POST['actua']) ? $_POST['actua']:NULL;
$pr = isset($_GET['pr']) ? $_GET['pr']:NULL;

$act = isset($_GET['act']) ? $_GET['act']:NULL;






/*$desact = isset($_GET['desact']) ? $_GET['desact']:NULL;
$acti = isset($_GET['acti']) ? $_GET['acti']:NULL;*/






if($jornada && $horaini && $horafin && $canti && !$actua){
    
    ?>
<script>
alert("La jornada ha sido creada exitosamente");
location.href = "home.php";

</script>
    <?php
    
    $ins->inserjornada($jornada, $horaini, $horafin, $canti);
    
}

$jornadas = $ins->seljornada();

if($pr){
$jornafilt = $ins->seledit($pr);
}


if($jornada && $horaini && $horafin && $canti && $actua){
    
    ?>
    
    <script>
     alert("La jornada se ha actualizado exitosamente");
     location.href = "home.php?pac=116";
    </script>
    

    <?php

    
    $ins->updjor($jornada, $horaini, $horafin, $canti, $actua);
    
}

//variables para activar y desactivar jornada
$codigo = isset($_GET['codigo']) ? $_GET['codigo']:NULL;

$activo = isset($_GET['activo']) ? $_GET['activo']:NULL;



if($codigo && $activo){
    
    /*$activo = 0;
    
    $resu = $ins->seljoracti($codigo);
    
    $val= json_encode($resu);
    
    echo $val;*/
    
    
    
    if($activo==1){
        
        ?>
        <script>
         alert("La jornada quedara inactiva");
         location.href = 'home.php?pac=116';
        </script>
        
        <?php
        
        
        $ins->updactivo($codigo, 2);
        
        
    }else{
    
    
    
    
    
       
        
        ?>
         <script>
         alert("La jornada ha sido activada");
         location.href = 'home.php?pac=116';
        </script>
        
        
        <?php
        
        //$activo = 2;
        
        $ins->updactivo($codigo, 1);
       
        
    }
    
    
    
    
    
    
    
}




?>
