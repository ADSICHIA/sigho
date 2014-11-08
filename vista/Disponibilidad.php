<?php
include ("controlador/cdisponi.php");

?>
<html>
<head>
    
<title>Disponibilidad</title>
</head>
<title>Sujerencia de Disponibilidad</title>
<body>
    
 <div class="table-responsive">    
 <h3>DISPONIBILIDAD SUJERIDA</h3>   
<form id="usuario" name="Disponibilidad" method="post" action="">
    
    <table width="600" height="200">

        <tr>
<!--                    <td align="left">Nombre del usuario: </td>
                    <td> <select name="usuarios" onchange="this.form.submit();">

                            <?php
                            //Select
                            $usu = $ins->selusuario();
                            for ($h = 0; $h < count($usu); $h++) {
                                ?>
                            <option value="<?php echo $usu[$h]['idusuario'] ?>" 
                                <?php if($usu[$h]['idusuario'] == $_POST["usuarios"]) echo 'selected'; ?>>
                                    <?php echo $usu[$h]['nombres'] . " " . $usu[$h]['apellidos'] ?></option>
                            <?php } ?>
                        </select>-->
        
      
   </tr>

<tr>
        <td align="center" width="100">Jornada</td>

            <?php
            $dia = $ins->seldias();
            for ($i = 0; $i < count($dia); $i++){
            ?>
         <td align="center" width="100"><?php echo $dia[$i]['valor']; ?></td>
            <?php } ?>
</tr>

<?php

$dispo = $ins->seldisponi($usuarioid);
          
              
$jorn = $ins->seljornadas();

for ($j = 0; $j < count($jorn); $j++) { 
    ?>

<tr>
    <td align="center"><?php
            $date = date_create($jorn[$j]['hora_inicio']);
            $date1 = date_create($jorn[$j]['hora_fin']);
            echo $jorn[$j]['jornada'].'<br>'.date_format($date, 'g:i A').'<br>'.date_format($date1, 'g:i A');?></td>
        <?php 
         for ($i = 0; $i < count($dia); $i++){
           
            ?>
    
        <td align="center"><input class="form-control" type="checkbox" name="chequeo[<?php echo $jorn[$j]['idjornada']."_".$dia[$i]['idvalor'];?>]" 
            <?php 
    for ($d = 0; $d < count($dispo); $d++){
        
    if (($jorn[$j]['idjornada']."_".$dia[$i]['idvalor']) == ($dispo[$d]['jornadaid']."_".$dispo[$d]['dia']))
        { 
        echo 'checked' ;
        }else{
            echo 'folse' ;
            };?> 
   <?php  };?> value=1">  </td>  
  <?php  };
};
 
 ?>         
  
</tr>
 
    </table>
 
    </table>
    <input type="submit" name="Submit" value="Sujerir" onclick=""/>

</form>
 </div>
</body>
</html>



