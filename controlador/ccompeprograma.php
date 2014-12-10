<?php

include("modelo/mcompeprograma.php");


$ins = new mcompeprograma();

$pr = isset($_GET["pr"]) ? $_GET["pr"]:NULL;
$codigo = isset($_POST["codigo"]) ? $_POST["codigo"]:NULL;
$denomina = isset($_POST["denomina"]) ? $_POST["denomina"]:NULL;
$cantihor = isset ($_POST["cantihor"]) ? $_POST["cantihor"]:NULL;
$idprograma = isset ($_POST["idpro"]) ? $_POST["idpro"]:NULL;

$actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;

$valor = isset($_POST["valor"]) ? $_POST["valor"]:NULL;

$pr = isset ($_GET["pr"]) ? $_GET["pr"]:NULL;


$elim = isset ($_GET["elim"]) ? $_GET["elim"]:NULL;





if ($codigo && $denomina && $cantihor && $idprograma && !$actu) {
    
    echo "<script>

           alert('Se ha creado la competencia exitosamente');
           location.href = 'home.php?pac=809';

         </script>";
    
    
    $ins->insertacompe($codigo, $denomina, $cantihor, $idprograma);
    
}




if ($codigo && $denomina && $cantihor && $idprograma && $actu && $valor) {
    
    echo "<script>

           alert('Se ha editado la competencia exitosamente');
           location.href = 'home.php?pac=809';

         </script>";
    
    
    $ins->updcompe($codigo, $denomina, $cantihor, $idprograma, $valor);
    
}







$valoresprograma = $ins->seleprograma();
$compe = $ins->seledat();


if($pr){

$valoredita = $ins->selecompe($pr);

}



if($elim){
    
    $resul= $ins->seleresultado($elim);
    
    
    if($resul>=1){
        
         echo "<script>

           alert('Usted no puede eliminar esta competencia, debido a que tiene resultados relacionados');
           location.href = 'home.php?pac=809';

         </script>";
    
        
    }else{
        
        
         echo "<script>

           alert('La competencia ha sido eliminada exitosamente');
           location.href = 'home.php?pac=809';

         </script>";
    
        
        
        
        $ins->delcompe($elim);
        
        
    }

}


?>