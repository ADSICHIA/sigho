<?php
include ("../controlador/cambiente.php");
?>

<div>
    <h3>INGRESAR AMBIENTE</h3>

    <form name="ambiente" action="" method="post">     
        <label for="idambiente">Identificador del Ambiente&nbsp;&nbsp;&nbsp;</label>     
        <input type="text" id="idambiente" class="form-control" name="idambiente" required="required" pattern="[0-9][0-9]{1,10}" oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Debe Ingresar Solo N&uacute;meros')" >
        <?php         
            if ($mensaje){ 
                echo "<span id='resultado' style='color:red'><strong>".$mensaje."</strong></span><br/>";         }
        ?>     
        <br/>
        <label for="ambiente">Descripci&oacute;n del Ambiente&nbsp;&nbsp;&nbsp;</label>     
        <input class="form-control" type="text" name="ambiente" id="ambiente" required="required" ><br/>
        <label for="especializado">Especializado del Ambiente&nbsp;&nbsp;&nbsp;</label>     
        <input class="form-control" type="text" name="especializado" id="especializado" required="required" ><br/>
        <label for="observacion">Observaci&oacute;n del Ambiente&nbsp;&nbsp;&nbsp;</label>     
        <input class="form-control" type="text" name="observacion" id="observacion" required="required" ><br/>
        <label for="sedeid">Sede a la que pertenece el Ambiente</label>
        <select class="form-control" id="sedeid" name="sedeid" required="required">
             <option value="" selected="selected">Seleccione </option>
                <?php
                    for($i = 0; $i<count($area); $i++){  
                ?>     
                        <option value="<?php echo $area[$i]['sedeid']; ?>"> <?php echo $area[$i]['sede']; ?></option>     
                <?php
                    }     
                ?>     
        </select><br/>     
        <input type="submit" value="Guardar" class="btn btn-default">
        <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>     
        <input type="button" value="Cancelar" class="btn btn-default">
    </form>
</div>

<!--<form name="tablaPrograma" action="" method="GET" onSubmit="return confirm('¿Desea eliminar?')">
    <div class="table-responsive">
        <h3>AMBIENTES</h3>
        <table class="table table-bordered table-hover table-striped">
            <thead>
            <tr>
            <th>Identificador</th>
            <th>Descripci&oacute;n</th>
            <th>Especializado</th>
            <th>Observaci&oacute;</th>
            <th>Editar</th>
            </tr>
            </thead>
            <tbody>
            <input name="pac" type="hidden" id="pac" value="106"/>
                <?php 
                    //for($i = 0; $i<count($tabla); $i++){
                ?>
                 <tr>
                    <td align = "left"><input type="submit" name="del" value="<?php// echo $tabla[$i]['idambiente'] ?>"/></td>
                    <td><?php// echo $tabla[$i]['ambiente']?></td>
                    <td><?php// echo $tabla[$i]['especializado']?></td>
                    <td><?php// echo $tabla[$i]['observacion']?></td>
                    <td><?php// echo $tabla[$i]['sede']?></td>
                    <td align = "center"><a href = "home.php?pr=<?php// echo $tabla[$i]['idambiente'] ?>&pac=<?php //echo $pac; ?>&up=11"><img src="vista/imagenes/editar.png"/></a></td>
                </tr>
                <?php
                    //}
                ?>
            <tr>
             <tr>
                        <td colspan=8 class="style2">Para eliminar presione el n&uacute;mero del c&oacute;digo.</td>
                    </tr>
            </tr>
            </tbody>
        </table>
    </div>
</form>-->