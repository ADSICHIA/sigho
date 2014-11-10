<?php
include ("controlador/cambiente.php");
?>

<div>
    <h3>INGRESAR AMBIENTE</h3>

    <form name="ambiente" action="" method="post">     
           
        <label for="ambiente">Ambiente&nbsp;&nbsp;&nbsp;</label>     
        <input class="form-control" type="text" name="ambiente" id="ambiente" required="required" >
         <?php         
            if ($mensaje){ 

                echo "<span id='resultado' style='color:red'><strong>".$mensaje."</strong></span><br/>";         }
        ?>     

                //echo "<span id='resultado' style='color:red'><strong>".$mensaje."</strong></span><br/>";         
            }
        ?>

        <br/>
        <label for="especializado">Especializado del Ambiente&nbsp;&nbsp;&nbsp;</label>     
        <input class="form-control" type="checkbox" name="especializado" id="especializado" style = "width: 10px;"><br/>
        <label for="observacion">Observaci&oacute;n del Ambiente&nbsp;&nbsp;&nbsp;</label>     
        <input class="form-control" type="text" name="observacion" id="observacion" required="required" ><br/>
        <label for="sedeid">Sede a la que pertenece el Ambiente</label>
        <select class="form-control" id="sedeid" name="sedeid" required="required">
             <option value="" selected="selected">Seleccione </option>
                <?php
                    for($i = 0; $i<count($arraySede); $i++){  
                ?>     
                        <option value="<?php echo $arraySede[$i]['idsede']; ?>"> <?php echo $arraySede[$i]['sede']; ?></option>     
                <?php
                    }     
                ?>     
        </select><br/>     
        <input type="submit" value="Guardar" class="btn btn-default">
        <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>     
        <input type="button" value="Cancelar" class="btn btn-default">
    </form>
</div>

<form name="tablaAmbiente" action="" method="GET" onSubmit="return confirm('¿Desea eliminar?')">
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
            <input name="pac" type="hidden" id="pac" value="115"/>
                <?php 
                    for($i = 0; $i<count($tabla); $i++){
                ?>
                 <tr>

                    <td align = "left"><input type="submit" name="del" value="<?php// echo $tabla[$i]['idambiente'] ?>"/></td>
                    <td><?php// echo $tabla[$i]['ambiente']?></td>
                    <td><?php// echo $tabla[$i]['especializado']?></td>
                    <td><?php// echo $tabla[$i]['observacion']?></td>
                    <td><?php// echo $tabla[$i]['sede']?></td>
                    <td align = "center"><a href = "home.php?pr=<?php// echo $tabla[$i]['idambiente'] ?>&pac=<?php //echo $pac; ?>&up=11"><img src="vista/imagenes/editar.png"/></a></td>

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
