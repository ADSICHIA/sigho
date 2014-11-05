<?php
include ("controlador/cparametro.php");
?>
<center>
<form name="form1" action="" method="post" >
	<table width="400">
        <tr>
        	<td colspan="2" align="center">
            	<h2>Insertar Parametro</h2>
            </td>
        </tr>
        
    	<tr>
        	<td align="left">Nombre de Parametro</td>
        	<td><input type="text" name="nompar" size="30" maxlength="30" required="required" /></td>
        </tr>  
        <tr>
        	<td colspan="2" align="center">
            	<input type="submit" value="Guardar" />
            </td>
        </tr>        
    </table>
</form>


<form id="form2" name="form2" method="GET" action="" onSubmit="return confirm('¿Desea eliminar?')">
  
  <div align="center" id="tabint">
    <table width="550" border="1" cellspacing="0" cellpadding="4">

	<tr>
        <th class="style1" align="center" width="80">Cod. Parametro<input name="pac" type="hidden" id="pac" value="102" /></th>
        <th class="style1" align="center" width="160">Nombre Parametro</th>
        <th class="style1" align="center" width="60">Editar</th>	
      </tr>																   	</tr>
 	<?php 
 		//Select
			$dat = $ins->selpar();
			for ($i=0; $i < count($dat); $i++){
	?>	
    <tr>           
		<td class="style2" align="center"><?php echo $dat[$i]['codpar']?><input type="hidden" name="del" value=<?php echo $dat[$i]['codpar']?>>
        </td>
            <td class="style2" align="left"><?php echo $dat[$i]['nompar'] ?></td>
            <td align="center"><a href="home.php?pr=<?php echo $dat[$i]['codpar'] ?>&pac=102&up=11&ed=0"><img border=0 src="image/editar.png" width="16" height="16" /></a></td>    
		</tr>
        
	<?php  }  ?>
     
         <tr>
		    <td colspan=8 class="style2">Para eliminar presione el n&uacute;mero del c&oacute;digo.</td>
        </tr>
    </table>
    <p>&nbsp; </p>
  </div>
</form>
</center>



<center>
<form name="form3" action="" method="post" >
	<table width="400">
        <tr>
        	<td colspan="2" align="center">
            	<h2>Insertar Valores</h2>
            </td>
        </tr>
      
    	<tr>
        	<td>Nombre del Valor</td>
        	<td><input type="text" name="nomval" size="30" maxlength="30" required="required" /></td>
         </tr>
         <tr>
        	<td align="left">Parametro</td>
        	<td>
               <select name="codpar">
               
	<?php 
 	//Select
		$dat1 = $ins->selpar();
		for ($i=0; $i < count($dat1); $i++){
	  ?>
            
            <option value="<?php echo $dat1[$i]['codpar'] ?>" ><?php echo $dat1[$i]['nompar'] ?></option>
            
            <?php } ?>
            	</select>
            </td>
        </tr>
            
  
        <tr>
        	<td colspan="2" align="center">
            	<input type="submit" value="Guardar" />
            </td>
        </tr>
        
    </table>
</form>
<form id="form4" name="form3" method="get" action="" onSubmit="return confirm('¿Desea eliminar?')">
  <div align="center" id="tabint">
  
    	<table width="550" border="1" cellspacing="0" cellpadding="4" style="margin-left:200px" >
         

      	<tr>
        	<th class="style1" align="center" width="80">Cod. Valor<input name="pac" type="hidden" id="pac" value="102" /></th>
        <th class="style1" align="center" width="160">Nombre Valor</th>
        <th class="style1" align="center" width="160">Nombre Parametro</th>
        <th class="style1" align="center" width="60">Editar</th>
        </tr>
        <?php 
 		//Select
			$dat2 = $ins->selval1();
			
			for ($i=0; $i < count($dat2); $i++){
	?>	
    <tr>           
		<td class="style2" align="center"><input type="submit" name="del2" value=<?php echo $dat2[$i]['codval']?>>
        </td>
            <td class="style2" align="left"><?php echo $dat2[$i]['nomval'] ?></td>
            <td class="style2" align="left"><?php echo $dat2[$i]['nompar'] ?></td>
            <td align="center"><a href="home.php?pr=<?php echo $dat2[$i]['codval'] ?>&pac=102&up=11&ed=1&prr=<?php echo $dat2[$i]['codpar'] ?>"><img border=0 src="image/editar.png" width="16" height="16" /></a></td>    
		</tr>
        
	<?php  }  ?>

    
    </table>
    </div>
</form>
</select>
</center>