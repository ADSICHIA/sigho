<?php
include ("controlador/cambiente.php");
?>

<div>
    <h3>EDITAR AMBIENTE</h3>

    <form name="ambiente" action="home.php?pac=115" method="post">     
           
        <label for="ambiente">Ambiente&nbsp;&nbsp;&nbsp;</label>     
        <input class="form-control" type="text" name="ambiente" id="ambiente" required="required" value = "<?php echo $editar[0]['ambiente']; ?>">
        <div id="divmsg" style = "display:none"><span id='resultado' style='color:red'><strong><?php echo is_null($mensaje)?'':$mensaje;?></strong></span><br/></div>
        <input type="hidden" id="idambiente" name="idambiente" value="<?php echo $editar[0]['idambiente']; ?>"/>
    	<input type="hidden" id="actu" name="actu" value="actu"/>
    	<br/>
        <label for="especializado">Especializado del Ambiente&nbsp;&nbsp;&nbsp;</label>     
        <input class="form-control" type="checkbox" name="especializado" id="especializado" style = "width: 15px;" <?php if($editar[0]['especializado']==1) echo 'checked'; ?>><br/>
        <label for="observacion">Observaci&oacute;n del Ambiente&nbsp;&nbsp;&nbsp;</label>     
        <input class="form-control" type="text" name="observacion" id="observacion" required="required" value = "<?php echo $editar[0]['observacion']; ?>"><br/>
        <label for="sedeid">Sede a la que pertenece el Ambiente</label>
        <select class="form-control" id="sedeid" name="sedeid" required="required">
             <option value="0" selected="selected">Seleccione </option>
                <?php
                    for($i = 0; $i<count($arraySede); $i++){  
                ?>     
                    <option value="<?php echo $arraySede[$i]['idsede']; ?>" <?php if($editar[0]['sedeid']==$arraySede[$i]['idsede']) echo 'selected'?>> <?php  echo $arraySede[$i]['sede']; ?></option>  
                <?php
                    }     
                ?>     
        </select><br/>     
        <input type="submit" value="Guardar" class="btn btn-default">
        <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>   
        <a href="home.php?pac=115"><input type="button" value="Cancelar" class="btn btn-default"></a>
    </form>
</div>
<div class="table-responsive">
	<form name="tablaAmbiente" action="" method="GET" onSubmit="return confirm('¿Desea eliminar?')">
		<div class="table-responsive">
			<h3>AMBIENTES</h3>
			<table class="table table-bordered table-hover table-striped">
				<thead>
				<tr>
				<th>Identificador</th>
				<th>Descripci&oacute;n</th>
				<th>Especializado</th>
				<th>Observaci&oacute;n</th>
				<th>Sede</th>
				<th>Editar</th>
				</tr>
				</thead>

				<tbody>
				<input name="pac" type="hidden" id="pac" value="115"/>
					<?php 
						for($i = 0; $i<count($tabla); $i++){
					?>
					 <tr>
						<td align = "left"><input type="submit" name="del" value="<?php echo $tabla[$i]['idambiente'] ?>"/></td>
						<td><?php echo $tabla[$i]['ambiente']?></td>
						<td><?php echo $tabla[$i]['especializado']?></td>
						<td><?php echo $tabla[$i]['observacion']?></td>
						<td><?php echo $tabla[$i]['sede']?></td>
						<td align = "center"><a href = "home.php?pr=<?php echo $tabla[$i]['idambiente'] ?>&pac=<?php echo $pac; ?>&up=15"><img src="vista/imagenes/editar.png"/></a></td>
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
</div>
