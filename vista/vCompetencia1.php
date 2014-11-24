<?php
include ("controlador/cCompetencia.php");

$usuario = isset($_SESSION["idUser"]) ? $_SESSION["idUser"]:NULL;
?>

<div>
<h3>AGREGAR COMPETENCIA</h3>

<form name= "competencia" action="home.php?pac=108" method = "POST">
<br/>
    <input type= "hidden" name="usuario" value="<?php echo $usuario ?>">
       <input type="hidden" id="actu" name="actu" value="actu"/>
       <input type="hidden" id="idcompetencia" name="idcompetencia" value="<?php echo $editar[0]['idcompetencia'];?>" >
    <label for="programaid">Programa</label>
    <select class="form-control" id="programaid" name="programaid" required="required">
    <option value="" selected="selected">Seleccione </option>
    <?php 
        for($i = 0; $i<count($programa); $i++){
    ?>
    <option value="<?php echo $editar[0]['programaid']; ?>" selected><?php echo $editar[0]['programa'];?> </option>
    <?php
       }
    ?>
    </select><br/>
Totalmente Calificado&nbsp;&nbsp;&nbsp;
<input type="radio" name="calificado" value=1 <?php if ($editar[0]['calificado']==1) echo 'checked'; ?> required="required">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Parcialmente Calificado&nbsp;&nbsp;&nbsp;<input type="radio" name="calificado" value=0 required="required" <?php if ($editar[0]['calificado']==0) echo 'checked'; ?>>	<br/>
<br/>    
<input type="submit" id="Guardar" value="Guardar" class="btn btn-default" >
<label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>     
<a href="home.php"><input type="button" value="Cancelar" class="btn btn-default"></a>
</form>
</div>


<br/>
<br/>


<div class="table-responsive">
<h3>COMPETENCIAS AGREGADAS</h3>

<br/>
<div align="right"><table width="650"><tr>
    <td>
        <form id="formfil" name="formfil" method="GET" action="home.php">
            <input name="pac" type="hidden" value="<?php echo $pac; ?>" />
            Nombre Programa
            <input type="text" name="filtro" value="<?php echo $filtro;?>" onChange="this.form.submit();">
            <input id="boton2" type="submit" name="busca" value="Buscar" />
        </form>
    </td>
    <td align="right" valign="bottom">
        <?php
            $bo = "<input type='hidden' name='filtro' value='".$filtro."' />";
            $pag->spag($conp,$nreg,$pac,$bo); 
            $dat=$ins->selCom($filtro, $pag->rvalini(), $pag->rvalfin());
        ?>
    </td>
</tr></table></div>

<br/>
<br/>
<form name="tablaPrograma" action="" method="GET" onSubmit="return confirm('¿Desea eliminar?')">
<table class="table table-bordered table-hover table-striped">
<thead>
<tr>
<th>Programa</th>
<th>Totalmente Calificado</th>
<th>Parcialmente Calificado</th>
<th>Acciones</th>
</tr>
</thead>
<tbody>
<input name="pac" type="hidden" id="pac" value="108"/>
<?php 
for($i = 0; $i<count($dat); $i++){
 ?>
 <tr>
    <td align = "left"><?php echo $dat[$i]['programa'] ?></td>
    <td align = "center"><?php if ($dat[$i]['calificado'] == 1) echo "<img src='image/activa.png'>"; else echo "" ?></td>
 <td align = "center"><?php if ($dat[$i]['calificado'] == 0) echo "<img src='image/activa.png'>"; else echo "" ?></td>
    <td align = "center"><a href = "home.php?pr=<?php echo $dat[$i]['idcompetencia'] ?>&pac=<?php echo $pac; ?>&up=15"><input type="button" name="del" value="Editar"/></a>
    <a href = "home.php?del=<?php echo $dat[$i]['idcompetencia'] ?>&pac=<?php echo $pac; ?>"><button value="<?php echo $dat[$i]['idcompetencia'] ?>" name="del">Eliminar</button></a></td>
</tr>
    <?php
        }
    ?>
<tr>
</tr>
</tbody>
</table>
</div>
</form>
