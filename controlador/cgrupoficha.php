<?php
  include ("modelo/mgrupoficha.php");
        //include ("modelo/mpagina.php");
      
  $ins = new mgrupoficha();
  //Eliminar
       

 $pr = isset($_GET["pr"]) ? $_GET["pr"]:NULL;
  $del = isset($_GET["del"]) ? $_GET["del"]:NULL;
  if ($del){
    $ins->delgrupo_ficha($del);

             ?>
                    <script language="javascript">
                    alert ("Ficha eliminada del grupo");
                   location.href='home.php?pac=805&pr=<?php echo $pr?>';
                    </script>
                  <?php   

       
}

$ficha = isset($_POST["ficha"]) ? $_POST["ficha"]:NULL;
$cantidad = isset($_POST["cantidad"]) ? $_POST["cantidad"]:NULL;
if ($ficha && $cantidad ){
$ficha1=$ins->selficha1($ficha);

  $countR = count($ficha1);
    if ($countR ==1 ){ 
  $ins->insficha_grupo($pr,$ficha1[0]['idficha'],$cantidad);
         
             ?>
                    <script language="javascript">
                    alert ("Ficha agregada al grupo");
                 
                    </script>
                  <?php       
             }else{
                 ?>  
            <script language="javascript">
            alert ("la ficha no existe");
         
            </script>
            <?php  
                         }
       
}

$datos=$ins->selgrupo($pr);
$fichas=$ins->selfichas($pr);  







?>