<?php
include ("controlador/cCompetencia.php");

$usuario = isset($_SESSION["idUser"]) ? $_SESSION["idUser"]:NULL;
?>

<div>
<h3>AGREGAR COMPETENCIA</h3>

<form name= "competencia" action="" method = "POST">
<br/>
    <label for="programaid">Programa</label>
    <select class="form-control" id="programaid" name="programaid" required="required">
    <option value="" selected="selected">Seleccione </option>
    <?php 
        for($i = 0; $i<count($programa); $i++){
    ?>
 
    <option value="<?php echo $programa[$i]['idprograma']; ?>"> <?php echo $programa[$i]['programa'];?> </option>
    <?php
       }
    ?>
    </select><br/>
Totalmente Calificado&nbsp;&nbsp;&nbsp;
<input type="radio" name="calificado" value="1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Parcialmente Calificado&nbsp;&nbsp;&nbsp;<input type="radio" name="calificado" value="0">	<br/>
<br/>     
<input type="submit" value="Guardar" class="btn btn-default">
<label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>     
<input type="button" value="Cancelar" class="btn btn-default">
</form>
</div>

<?php echo $usuario ?>