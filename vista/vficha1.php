<?php
include ("controlador/cficha.php");
?>

<div>

<h3>EDITAR FICHAS</h3>

<form name="ficha" action="home.php?pac=112" method="post">
	<label for= "idficha">No. Ficha &nbsp;&nbsp;&nbsp;</label>
    <input type="text" id="ficha" disabled="disbled" class="form-control" name="ficha" required="required" value = "<?php echo $editar[0]['idficha']; ?>" pattern="[0-9][0-9]{1,10}" oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Debe Ingresar Solo N&uacute;meros')"/>
    <input type="hidden" id="idficha" name="idficha" value = "<?php echo $editar[0]['idficha']; ?>"/>
    <input type="hidden" id="actu" name="actu" value="actu"/>
    <br/><label for="fecha_inicio">Fecha Inicio&nbsp;&nbsp;&nbsp;</label>
    <input class="form-control" type="date" name="fecha_inicio" id="fecha_inicio" onblur="fnValidarFechas()" required="required" value = "<?php echo $editar[0]['fecha_inicio']; ?>"><br/>
    <label for="fecha_fin">Fecha Fin&nbsp;&nbsp;&nbsp;</label>
    <input class="form-control" type="date" name="fecha_fin" id="fecha_fin" required="required" value = "<?php echo $editar[0]['fecha_fin']; ?>"><br/>
    <br/><label for="oferta">Oferta</label>
    <select class="form-control" id="oferta" name="oferta" required="required">
    <option value="0" selected="selected"></option>
    <?php 
        for($i = 0; $i<count($selOferta); $i++){
    ?>
        <option value="<?php echo $selOferta[$i]['idvalor']; ?>" <?php if($editar[0]['oferta'] == $selOferta[$i]['idvalor']) echo 'selected'; ?> >
    <?php echo $selOferta[$i]['valor'];?> </option>
    
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
    <option value="<?php echo $programa[$i]['idprograma']; ?>" <?php if($editar[0]['programaid'] == $programa[$i]['idprograma']) echo 'selected';?> /> <?php echo $programa[$i]['programa'];?> </option>
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
    <option value="<?php echo $jornada[$i]['idjornada']; ?>"  <?php if($editar[0]['jornadaid'] == $jornada[$i]['idjornada']) echo 'selected';?>/> <?php echo $jornada[$i]['jornada']; ?> </option>
    <?php
        }
    ?>
    </select><br/>
     <label for="cant_aprendices">Cantidad de Aprendices</label>
    <input class="form-control" type="text" name="cant_aprendices" id="cant_aprendices" required="required" value="<?php echo $editar[0]['cant_aprendices']; ?>" pattern="[0-9]{1,3}" oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Debe Ingresar Solo N&uacute;meros')"/><br/>
    <input type="submit" value="Guardar" class="btn btn-default">
    <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <a href="home.php?pac=112"><input type="button" value="Cancelar" class="btn btn-default"></a>

    
</form>
</div>

<br/>
<br/>

<div class="table-responsive">
<h3>FICHAS ACTIVAS</h3>
<br/>
<div align="right"><table width="650"><tr>
    <td>
        <form id="formfil" name="formfil" method="GET" action="home.php">
            <input name="pac" type="hidden" value="<?php echo $pac; ?>" />
            No. Ficha
            <input type="text" name="filtro" value="<?php echo $filtro;?>" onChange="this.form.submit();">
            <input id="boton2" type="submit" name="busca" value="Buscar" />
        </form>
    </td>
    <td align="right" valign="bottom">
        <?php
            $bo = "<input type='hidden' name='filtro' value='".$filtro."' />";
            $pag->spag($conp,$nreg,$pac,$bo); 
            $dat=$ins->selFicha($filtro, $pag->rvalini(), $pag->rvalfin());
        ?>
    </td>
</tr></table></div>
<br/>
<br/>
<form  name="form2" method="get" action="home.php?pac=106" onSubmit="return confirm('¿Desea eliminar?')">
<table class="table table-bordered table-hover table-striped">
<thead>
<tr>
<th>No Ficha</th>
<th>Fecha Inicio</th>
<th>Fecha Fin</th>
<th>Oferta</th>
<th>Jornada</th>
<th>Programa</th>
<th>Cant. Aprendices</th>
<th>Acciones</th>
</tr>
</thead>
<tbody>
<input name="pac" type="hidden" id="pac" value="112"/>
<?php 
for($i = 0; $i<count($dat); $i++){
 ?>
 <tr>
    <td><?php echo $dat[$i]['idficha']?></td>
    <td><?php echo $dat[$i]['fecha_inicio']?></td>
    <td><?php echo $dat[$i]['fecha_fin']?></td>
    <td><?php echo $dat[$i]['oferta']?></td>
    <td><?php echo $dat[$i]['jornada']?></td>
    <td><?php echo $dat[$i]['programa']?></td>
    <td><?php echo $dat[$i]['cant_aprendices']?></td>
    <td align = "center"><a href = "home.php?pr=<?php echo $dat[$i]['idficha'] ?>&pac=<?php echo $pac; ?>&up=12"><input type="button" name="del" value="Editar"/></a>
    <a href = "home.php?del=<?php echo $dat[$i]['idficha'] ?>&pac=<?php echo $pac; ?>"><button value="<?php echo $dat[$i]['idficha'] ?>" name="del">Eliminar</button></a></td>
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


<script>
    function fnValidarFechas(){
      var fmin = $("#fecha_inicio").val();
      $("#fecha_fin").attr({"min" : fmin});
    }
</script>