<?php
	include_once("controlador/csede.php");
?>
<center>
<form name="form1" action="" method="post" >
	<table width="400" >
        <tr>
        	<td colspan="2" align="center" style="font-size: 20.5px;">
            	<h1>SEDES</h1>
            </td>
        </tr>
        <tr><td><br><br></td>
        </tr>
         
    	<tr>
        	<td align="left">Nombre:</td>
        	<td><input type="text" name="nomsede" size="30" maxlength="30" required="required" placeholder="Ingrese el nombre de la sede" /></td>
        </tr>
        <tr>
        	<td align="left">Direccion:</td>
        	<td><input type="text" name="direccion" size="30" maxlength="40" required="required" placeholder="Ingrese la direccion de la sede"  /></td>
        </tr>
         <tr>
            <td align="left">Telefono:</td>
            <td><input type="text" name="telefono" size="30" maxlength="40" required="required" placeholder="Ingrese un telefono de la sede"  /></td>
        </tr>
         <tr>
            <td align="left">Municipio:</td>
                <td><select name="municipio">
            <?php for($i=0;$i<count($mu);$i++){?>
                <option value="<?php echo $mu[$i]['idmunicipio']?>"><?php echo $mu[$i]['municipio']?></option>
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

</center>