<?php
include ("controlador/carea.php");
?>

<div>
<br/>
<br/>
<h3>INGRESAR AREA</h3>

<form name="area" action="" method="post">
	<label for= "area">Area &nbsp;&nbsp;&nbsp;</label>
    <input type="text" id="area" class="form-control" name="area" required="required">
    <br/><label for="usuarioid">Usuario Administrador&nbsp;&nbsp;&nbsp;</label>
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
<h3>AREAS ACTIVAS</h3>
<form  name="form2" method="get" action="home.php?pac=107" onSubmit="return confirm('¿Desea eliminar?')">
<table class="table table-bordered table-hover table-striped">
<thead>
<tr>
<th>No Area</th>
<th>Area</th>
<th>Usuario Administrador</th>
</tr>
</thead>
<tbody>
<?php 
for($i = 0; $i<count($area); $i++){
 ?>
 <tr>
    <td> <input type="submit" name="del" value=<?php echo$area[$i]['idarea']?>></td>
    <td><?php echo $area[$i]['area']?></td>
    <td><?php echo $usuario[$i]['nombres']?> &nbsp;<?php echo $usuario[$i]['apellidos']?></td>
    
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