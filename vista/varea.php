<?php
include ("controlador/carea.php");
?>

<div>
<br/>
<br/>
<h3>INGRESAR &Aacute;REA</h3>

<form name="area" action="" method="post">
	<label for= "area">&Aacute;rea &nbsp;&nbsp;&nbsp;</label>
    <input type="text" id="area" class="form-control" name="area" required="required">
       <?php         
        if ($mensaje){ 
            echo "<span id='resultado' style='color:red'><strong>" .$mensaje."</strong></span><br/>";         
        }
    ?> 
    <br/><label for="usuarioid">Usuario a Cargo&nbsp;&nbsp;&nbsp;</label>
     <select class="form-control" id="usuarioid" name="usuarioid" required="required">
    <option value="0" selected="selected"> </option>
    <?php 
        for($i = 0; $i<count($usuario); $i++){
    ?>
    <option value="<?php echo $usuario[$i]['idusuario']; ?>"> <?php echo $usuario[$i]['nombres'];?>&nbsp;<?php echo $usuario[$i]['apellidos'];?> </option>
    <?php
        }
    ?>
    </select><br/>
 
    <input type="submit" value="Guardar" class="btn btn-default">
    <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <input type="button" value="Cancelar" class="btn btn-default">

    
</form>
</div>

<div class="table-responsive">
<h3>&Aacute;REAS ACTIVAS</h3>
<form  name="form2" method="get" action="home.php?pac=104" onSubmit="return confirm('¿Desea eliminar?')">
<table class="table table-bordered table-hover table-striped">
<thead>
<tr>
<th>No &Aacute;rea</th>
<th>&Aacute;rea</th>
<th>Usuario a Cargo</th>
<th>Editar</th>
</tr>
</thead>
<tbody>
<input name="pac" type="hidden" id="pac" value="104"/>
<?php 
for($i = 0; $i<count($area); $i++){
 ?>
 <tr>
    <td> <input type="submit" name="del" value="<?php echo$area[$i]['idarea']?>" /> </td>
    <td><?php echo $area[$i]['area']?></td>
    <td><?php echo $area[$i]['nombres']." ".$area[$i]['apellidos']?></td>
    <td align = "center"><a href = "home.php?pr=<?php echo $area[$i]['idarea'] ?>&pac=<?php echo $pac; ?>&up=13"><img src="vista/imagenes/editar.png"/></a></td>
</tr>
    <?php
        }
    ?>
<tr>

</tr>
</tbody>
</table>
</form>
</div>