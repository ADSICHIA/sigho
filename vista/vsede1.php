<?php
	include ("controlador/cestacion.php");	
?>
<center>
<form name="form1" action="home.php?pac=101" method="post" >
	<table width="400">
        <tr>
        	<td colspan="2" align="center" style="font-size: 20.5px;">
            	<h1>Editar Estacion</h1>
            </td>
        </tr>
        <tr><td><br><br></td>
        </tr>
 
            <input type="hidden" name="id_estacion" value="<?php echo $upd[0]['id_estacion'] ?>" />
            <input type="hidden" name="actu" value="actu" />
  
    	<tr>
        	<td align="left">Nombre</td>
        	<td><input type="text" name="nomesta" size="30" maxlength="30"  value="<?php echo $upd[0]['nombre'] ?>" /></td>
        </tr>
        <tr>
        	<td align="left">Ubicacion</td>
        	<td><input type="text" name="ubicacion" size="30" maxlength="40"  value="<?php echo $upd[0]['ubicacion'] ?>"/></td>
        </tr>
         <tr>
            <td align="left">Descripcion:</td>
            <td><textarea id="motivo" name="descripcion" cols="47" rows="3"><?php echo $upd[0]['descripcion'] ?></textarea></td>
        </tr>
         <tr>
            <td align="left">Tipo Parada:</td>
                <td><select name="parada">
                
                    <option value="1"> Estacion</option>
                    <option value="2"> Portal</option>
         
                </select>
            </td>
        </tr>
        <tr>
            <td align="left">Troncal:</td>
                <td><select name="troncal">
            <?php for($i=0;$i<count($tron);$i++){?>
                <option value="<?php echo $tron[$i]['id_troncal']?>"><?php echo $tron[$i]['nombre']?></option>
            <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
        	<td colspan="2" align="center">
            	<input type="submit" value="Guardar Cambios" />
                <a href="home.php?pac=101&actu=<?php NULL?>" target="_self"><input type="button"  value="Cancelar" /> </a>
            </td>
          
        </tr>
    </table>
</form>

<div align="center">
<table width="650" >
<tr>
	<td>
		<form id="formfil" name="formfil" method="GET" action="home.php">
			<input name="pac" type="hidden" value="<?php echo $pac; ?>" />
		    Nombre Estacion:<p>
	        <input type="text" name="filtro" value="<?php echo $filtro;?>" onChange="this.form.submit();">
		</form>
    </td>
	<td align="center" valign="bottom">
		<?php
			$bo = "<input type='hidden' name='filtro' value='".$filtro."' />";
            $pag->spag($conp,$nreg,$pac,$bo); 
			$dat = $ins->selencfiltro($filtro, $pag->rvalini(), $pag->rvalfin());
        ?>
    </td>
</tr>
</table>
</div>

<form id="form2" name="form2" method="GET" action="" onSubmit="return confirm('¿Desea eliminar?')">
  
  <div align="center" id="tabint">
    <table width="800"  cellspacing="0" cellpadding="4" border="1">

      <tr>
        <input name="pac" type="hidden" id="pac" value="101" />
        <th class="style1" align="center" width="160">Nombre</th>
        <th class="style1" align="center" width="160">Ubicacion</th>
        <th class="style1" align="center" width="160">Descripcion</th>
        <th class="style1" align="center" width="160">Mantenimiento</th>
        <th class="style1" align="center" width="160">Tipo Parada</th>
        <th class="style1" align="center" width="160">Troncal Perteneciente</th>
        <th class="style1" align="center" width="60">Editar</th>
         <?php if($perusu==1){?>
            <th class="style1" align="center" width="60">Eliminar</th>
        <?php } ?> 
      </tr>
 <?php 
 	//Select
		
		for ($i=0; $i < count($dat); $i++){
	  ?>
        <tr>
            <td class="style2" align="center"><?php echo $dat[$i]['nombre'] ?></td>
            <td class="style2" align="center"><?php echo $dat[$i]['ubicacion'] ?></td>
            <td class="style2" align="center"><?php echo $dat[$i]['descripcion'] ?></td>
           <td align="center"><a href="home.php?pac=101&act=<?php echo $dat[$i]['mantenimiento']; ?>&doc=<?php echo $dat[$i]['id_estacion']; ?>"><?php if($dat[$i]['mantenimiento']=='1'){?><img src="images/desactiva.png" name="cambiarima" title="Estacion en mantenimiento" onclick="return confirm('Seguro que desea cambiar el estado?')"> <?php }else{?><img src="images/activa.png" name="cambiarima" title="Estacion en funcionamiento" onclick="return confirm('Seguro que desea cambiar el estado?')"><?php } ?></a></td>
            <td class="style2" align="center"><?php if($dat[$i]['tipo_parada']=='1') {  echo "Estacion";   }else{ echo "Portal";} ?></td>
              <td class="style2" align="center"><?php echo $dat[$i]['tronca'] ?></td>
            <td align="center"><a href="home.php?pr=<?php echo $dat[$i]['id_estacion'] ?>&pac=101&up=11"><img border=0 src="images/editar.png" width="16" height="16" title="Editar estacion" /></a></td>
            <?php if($perusu==1){?>
            <td align="center"><a href="home.php?del=<?php echo $dat[$i]['id_estacion'] ?>&pac=101" onclick="return confirm('¿Desea eliminar esta estacion?');"><img border=0 src="images/del.png" width="16" title="Eliminar estacion" height="16" /></a></td>
            <?php } ?> 
		
        </tr>
      <?php  }  ?>
 
       
    </table>
    <p>&nbsp; </p>
  </div>
</form>

</center>
