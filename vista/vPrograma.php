<?php
include ("../controlador/cPrograma.php");
?>
<link href="../css/bootstrap.css" rel="stylesheet">
<div>
<h3>INGRESAR PROGRAMA</h3>

<form name="programa" action="" method="post">
	<label for= "idprograma">Identificador del Programa&nbsp;&nbsp;&nbsp;</label>
    <input type="text" id="idprograma" name="idprograma" required="required"><br/>
    <label for="programa">Descripci&oacute;n del Programa&nbsp;&nbsp;&nbsp;</label>
    <input type="text" name="programa" id="programa" required="required"><br/>
    <label for="version">Versi&oacute;n del Programa&nbsp;&nbsp;&nbsp;</label>
    <input type="text" name="version" id="version" required="required"><br/>
    <label for="areaid">Area a la que pertenece el Programa</label>
    <select id="areaid" name="areaid" required="required">
    <option value="0" selected="selected"> </option>
    <?php 
        for($i = 0; $i<count($area); $i++){
    ?>
    <option value="<?php echo $area[$i]['idarea']; ?>"> <?php echo $area[$i]['area']; ?> </option>
    <?php
        }
    ?>
    </select><br/>
    <input type="submit" value="Guardar">
    <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <input type="button" value="Cancelar">
</form>
</div>

<div class="table-responsive">
<h3>PROGRAMAS ACTIVOS</h3>
<table class="table table-bordered table-hover table-striped">
<thead>
<tr>
<th>Identificador</th>
<th>Descripci&oacute;n</th>
<th>Versi&oacute;n</th>
<th>Area</th>
</tr>
</thead>
<tbody>
<?php 
for($i = 0; $i<count($tabla); $i++){
 ?>
 <tr>
    <td><?php echo $tabla[$i]['idprograma']?></td>
    <td><?php echo $tabla[$i]['programa']?></td>
    <td><?php echo $tabla[$i]['version']?></td>
    <td><?php echo $tabla[$i]['areaid']?></td>
</tr>
    <?php
        }
    ?>
<tr>

</tr>
</tbody>
</table>
</div>