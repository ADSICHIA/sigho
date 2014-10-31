<?php
include ("controlador/cPrograma.php");
?>

<div>
<h3>INGRESAR PROGRAMA</h3>

<form name="programa" action="" method="post">     
<label for="idprograma">Identificador del Programa&nbsp;&nbsp;&nbsp;</label>     
<input type="text" id="idprograma" class="form-control" name="idprograma" required="required" pattern="[0-9][0-9]{1,10}" oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Debe Ingresar Solo N&uacute;meros')">
<?php         
if ($mensaje){ 
    echo "<span id='resultado' style='color:red'><strong>" .$mensaje."</strong></span><br/>";         }
?>     
<br/><label for="programa">Descripci&oacute;n del Programa&nbsp;&nbsp;&nbsp;</label>     
<input class="form-control" type="text" name="programa" id="programa" required="required" ><br/>
<label for="version">Versi&oacute;n del Programa&nbsp;&nbsp;&nbsp;</label>
<input class="form-control" type="text" name="version" id="version" required="required" pattern ="[0-9]+([\.|,][0-9]+)?" oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Debe Ingresar Solo N&uacute;meros')" /><br/>
<label for="areaid">Area a la que pertenece el Programa</label>
<select class="form-control" id="areaid" name="areaid" required="required">
     <option value="" selected="selected">Seleccione </option>
<?php          for($i = 0; $i<count($area); $i++){  ?>     
<option value="<?php echo $area[$i]['idarea']; ?>"> <?php echo $area[$i]['area']; ?></option>     
<?php         }     ?>     
</select><br/>     
<input type="submit" value="Guardar" class="btn btn-default">
<label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>     
<input type="button" value="Cancelar" class="btn btn-default">

    
</form>
</div>

<form name="tablaPrograma" action="" method="GET" onSubmit="return confirm('¿Desea eliminar?')">
<div class="table-responsive">
<h3>PROGRAMAS ACTIVOS</h3>
<table class="table table-bordered table-hover table-striped">
<thead>
<tr>
<th>Identificador</th>
<th>Descripci&oacute;n</th>
<th>Versi&oacute;n</th>
<th>Area</th>
<th>Editar</th>
</tr>
</thead>
<tbody>
<input name="pac" type="hidden" id="pac" value="106"/>
<?php 
for($i = 0; $i<count($tabla); $i++){
 ?>
 <tr>
    <td align = "left"><input type="submit" name="del" value="<?php echo $tabla[$i]['idprograma'] ?>"/></td>
    <td><?php echo $tabla[$i]['programa']?></td>
    <td><?php echo $tabla[$i]['version']?></td>
    <td><?php echo $tabla[$i]['area']?></td>
    <td align = "center"><a href = "home.php?pr=<?php echo $tabla[$i]['idprograma'] ?>&pac=<?php echo $pac; ?>&up=11"><img src="vista/imagenes/editar.png"/></a></td>
</tr>
    <?php
        }
    ?>
<tr>
 <tr>
            <td colspan=8 class="style2">Para eliminar presione el n&uacute;mero del c&oacute;digo.</td>
        </tr>
</tr>
</tbody>
</table>
</div>
</form>