<?php 
    include ("controlador/cresu.php");
?>
<center>

    <form name="form" action="" method="POST">
    <table align="center" border="0" cellspacing="" border="1" cellpadding="3" width="920px">
      <tr>
         <td colspan="2"><h2>Ingrese Resultados</h2></td>
      </tr>
      <tr>
         <td>Codigo Resultado:</td>
         <td><input name="cod" type="text"></td>
      </tr>
       <tr>
         <td>Resultado:</td>
         <td><input name="resul" type="text"></td>
      </tr>
      <tr>
          <td>Seleccione Competencia</td>
          <td>
            <select name="resu">
            <?php
             for ($i=0; $i<count($compe); $i++){ 
            ?>
              <option value="<?php echo $compe[$i]['id_competencia'] ?>"><?php echo $compe[$i]['denominacion'] ?></option>
               <?php } ?>     
            </select>
          </td>
      </tr>
    </table>
    </form>
  </center>







      <form class="form" name="form2" onSubmit=" return confirm('¿desea continuar?')">
      <table width="550" border="0" cellpadding="4" cellspacing="15">
          <tr>
              <th class="style1" aling="center" width="80">resultado </th>
   
          </tr>
           <td><select name="resu">
          <?php
          for ($i=0; $i<count($data); $i++){ 
     
          ?>
          <option value="<?php echo $data[$i]['id_resultado'] ?>"><?php echo $data[$i]['resultado'] ?></option>
             <?php } ?> 
  	
        </select>
        </td>
       
      </table>
  



   