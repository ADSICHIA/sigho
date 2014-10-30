<?php
include ("controlador/cficha.php");
?>

<div>

<h3>INGRESAR FICHAS</h3>

<form name="ficha" action="" method="post">
	<label for= "idficha">No. Ficha &nbsp;&nbsp;&nbsp;</label>
    <input type="text" id="idficha" class="form-control" name="idficha" required="required">
    <?php         
        if ($mensaje){ 
            echo "<span id='resultado' style='color:red'><strong>" .$mensaje."</strong></span><br/>";         
        }
    ?>  
    <br/><label for="fecha_inicio">Fecha Inicio&nbsp;&nbsp;&nbsp;</label>
    <input class="form-control" type="date" name="fecha_inicio" id="fecha_inicio" required="required"><br/>
    <label for="fecha_fin">Fecha Fin&nbsp;&nbsp;&nbsp;</label>
    <input class="form-control" type="date" name="fecha_fin" id="fecha_fin" required="required"><br/>
    <label for="oferta">Oferta</label>
    <select class="form-control" id="oferta" name="oferta" required="required">
    <option value="0" selected="selected"> </option>
    <?php 
        for($i = 0; $i<count($selOferta); $i++){
    ?>

    <option value="<?php echo $selOferta[$i]['idvalor']; ?>"> <?php echo $selOferta[$i]['valor'];?> </option>
    
    <?php
        }
    ?>
    </select>
    <br/>
    <label for="programaid">Programa</label>
    <select class="form-control" id="programaid" name="programaid" required="required">
    <option value="0" selected="selected"> </option>
    <?php 
        for($i = 0; $i<count($programa); $i++){
    ?>
    <option value="<?php echo $programa[$i]['idprograma']; ?>"> <?php echo $programa[$i]['programa'];?> </option>
    <?php
        }
    ?>
    </select><br/>
    <label for="jornadaid">Jornada</label>
    <select class="form-control" id="jornadaid" name="jornadaid" required="required">
    <option value="0" selected="selected"> </option>
    <?php 
        for($i = 0; $i<count($jornada); $i++){
    ?>
    <option value="<?php echo $jornada[$i]['idjornada']; ?>"> <?php echo $jornada[$i]['jornada']; ?> </option>
    <?php
        }
    ?>
    </select><br/>
     <label for="cant_aprendices">Cantidad de Aprendices</label>
    <input class="form-control" type="text" name="cant_aprendices" id="cant_aprendices" required="required"><br/>
    <input type="submit" value="Guardar" class="btn btn-default">
    <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <input type="button" value="Cancelar" class="btn btn-default">

    
</form>
</div>

<div class="table-responsive">
<h3>FICHAS ACTIVAS</h3>
<form  name="form2" method="get" action="" onSubmit="return confirm('¿Desea eliminar?')">
<table class="table table-bordered table-hover table-striped">
<thead>
<tr>
<th>No Ficha</th>
<th>Fecha Inicio</th>
<th>Fecha Fin</th>
<th>Jornada</th>
<th>Cant. Aprendices</th>
</tr>
</thead>
<tbody>
<input name="pac" type="hidden" id="pac" value="107"/>
<?php 
for($i = 0; $i<count($tabla); $i++){
 ?>
 <tr>
    <td> <input type="submit" name="del" value=<?php echo $tabla[$i]['idficha']?>></td>
    <td><?php echo $tabla[$i]['fecha_inicio']?></td>
    <td><?php echo $tabla[$i]['fecha_fin']?></td>
    <td><?php echo $tabla1[$i]['jornada']?></td>
    <td><?php echo $tabla[$i]['cant_aprendices']?></td>
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