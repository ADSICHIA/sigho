<?php
	include ("controlador/cruta.php");
?>
<center>
<form name="form1" action="" method="post" onSubmit="return confirm('Por  favor primero  verifique  los datos ingresados  antes de hacer clic en  !aceptar!')"  >

	<table width="700" border="0">
        <tr>
        	<td colspan="2" align="center">
            	<h2>Rutas de transporte</h2>
            </td>
            
        </tr>
        <tr>
        	<td align="left">Placa del veh&iacute;culo </td> 
        	 <td> <input type="text" placeholder="Placa del veh&iacute;culo" name="placa" size="20" maxlength="15" required="required"  pattern="[A-Z]{3}[0-9]{3}" title="El formato debe coincidir con 3 letras mayúsculas y 3 números sin espacion." /></td>
          
        </td> 
        
        
        </tr>
    	<tr>
        	<td align="left">N&uacute;mero de puestos</td>
            
           <td> <input type="number" placeholder="N&uacute;mero de puestos" name="npuesto" size="20" maxlength="11" required="required"  /></td>
        </tr>
        <tr>
        	<td align="left">Seleccione el conductor </td>
        	<td><select name="idconductor" required >
                  <option value>Conductor</option>
       
       <?php 
		
		for ($i=0; $i < count($det); $i++){
		
		?>
       
         <option value=" <?php 	echo $det[$i]['identificacion'] ?>" /> <?php echo $det[$i]['identificacion'] ?> <?php echo $det[$i]['prinombre'] ?> <?php echo $det[$i]['priapellido'] ?></option>
		
		 <?php } ?>
			
	   </select></td>
       </tr>
       <tr>
        	<td align="left">Modelo  del veh&iacute;culo </td> 
        	 <td> <input type="number" placeholder="modelo" name="modelo" size="20" maxlength="11" required="required" /></td>
          
        </td> 
        
        
        </tr>
         <tr>
        	<td align="left">Seleccione la marca del veh&iacute;culo</td>
                <td><select name="idmarca" required >
                           <option value>Marca</option>
       
       
       <?php 
		
		for ($i=0; $i < count($marca); $i++){
		
		?>
       
         <option value=" <?php 	echo $marca[$i]['idmarca'] ?>" /> <?php echo $marca[$i]['nombre'] ?></option>
		
		 <?php } ?>
			
	   </select></td>
       </tr>
        <tr>
        	<td colspan="2" align="center" >
                    <input type="reset" value="limpiar" />
            	<input type="submit"  value="Guardar"   />
            </td>
        </tr>
         
    </table>
</form>



<form id="form2" name="form2" method="GET" action="" onSubmit="return confirm('Desea eliminar?')">
  
  <div align="center" id="tabint">
    <table width="700" border="1" cellspacing="0" cellpadding="5">
       

 <tr>
        <th class="style1" align="center" width="80">No.ruta<input name="acceso" type="hidden" id="acceso" value="102" /></th>
   
        
         <th class="style1" align="center" width="120">Placa del veh&iacute;culo</th>
        <th class="style1" align="center" width="120">N&uacute;mero de puestos</th>
         <th class="style1" align="center" width="400">Conductor</th> 
         <th class="style1" align="center" width="160">Marca</th>
         <th class="style1" align="center" width="120">Modelo</th> 
          <th class="style1" align="center" width="160">Editar</th>
      </tr>
 <?php 
 	//Select
	
		 //echo json_encode ($datos);
		for ($i=0; $i < count($datos); $i++){
	  ?>
        <tr>
          
		    <td class="style2" align="center"><input type="submit" name="del" value= <?php  echo $datos[$i]['idruta'] ?>></td>
           
            <td class="style2" align="left"> <?php  echo $datos[$i]['placa'] ?></td>  
           <td class="style2" align="left"> <?php  echo $datos[$i]['npuesto'] ?></td> 
           <td class="style2" align="left"> <?php  echo $datos[$i]['idconductor'] ?> <?php  echo $datos[$i]['nombre'] ?> <?php  echo $datos[$i]['apellido'] ?></td>
           <td class="style2" align="left"> <?php  echo $datos[$i]['marca'] ?></td>
            <td class="style2" align="left"> <?php  echo $datos[$i]['modelo'] ?></td>
           
      
            
            <td align="center"><a href="home.php?pr=<?php  echo $datos[$i]['idruta'] ?>&acceso=102&up=34"><img border=0 src="image/editar.png" width="16" height="16" /></a></td>
		
        </tr>
      <?php  }  ?>
 
         <tr>
		    <td colspan=17 class="style2">Para eliminar presione el n&uacute;mero del c&oacute;digo.</td>
        </tr>
    </table>
    <p>&nbsp; </p>
  </div>
</form>

</center>