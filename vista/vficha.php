<?php
include ("controlador/cficha.php");
?>

<div>

<h3>INGRESAR FICHAS</h3>
<br/>
<form name="ficha" action="" method="post">
	<br/><label for= "idficha">No. Ficha &nbsp;&nbsp;&nbsp;</label>
    <input type="text" id="idficha" class="form-control" onblur="fnValidarPrograma(this.value)" name="idficha" required="required" pattern="[0-9][0-9]{1,10}" oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Debe Ingresar Solo N&uacute;meros')">
    <div id="divmsg" style = "display:none"><span id='resultado' style='color:red'><strong><?php echo is_null($mensaje)?'':$mensaje;?></strong></span><br/></div>
    <br/>
    <label for="fecha_inicio">Fecha Inicio&nbsp;&nbsp;&nbsp;</label>
    <input class="form-control" type="date" name="fecha_inicio" id="fecha_inicio" required="required" onblur="fnValidarFechas()"><br/>
    <label for="fecha_fin">Fecha Fin&nbsp;&nbsp;&nbsp;</label>
    <input class="form-control" type="date" name="fecha_fin" id="fecha_fin" required="required"><br/>
    <label for="oferta">Oferta</label>
    <select class="form-control" id="oferta" name="oferta" required="required">
    <option value="" selected="selected">Seleccione </option>
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
    <option value="" selected="selected">Seleccione </option>
    <?php 
        for($i = 0; $i<count($programa); $i++){
    ?>
    <option value="<?php echo $programa[$i]['idprograma']; ?>"> <?php echo utf8_encode($programa[$i]['programa']);?> </option>
    <?php
        }
    ?>
    </select><br/>
    <label for="jornadaid">Jornada</label>
    <select class="form-control" id="jornadaid" name="jornadaid" required="required">
    <option value="" selected="selected">Seleccione </option>
    <?php 
        for($i = 0; $i<count($jornada); $i++){
    ?>
    <option value="<?php echo $jornada[$i]['idjornada']; ?>"> <?php echo $jornada[$i]['jornada']; ?> </option>
    <?php
        }
    ?>
    </select><br/>
     <label for="cant_aprendices">Cantidad de Aprendices</label>
    <input class="form-control" type="text" name="cant_aprendices" id="cant_aprendices" required="required" pattern="[0-9]{1,3}" oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Debe Ingresar Solo N&uacute;meros')"><br/>
    <input type="submit" value="Guardar" class="btn btn-default">
    <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <input type="button" value="Cancelar" class="btn btn-default">

    
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
<form  name="form2" method="get" action="home.php?pac=106" onSubmit="return confirm('Â¿Desea eliminar?')">
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
    <td><?php echo utf8_encode($dat[$i]['programa']);?></td>
    <td><?php echo $dat[$i]['cant_aprendices']?></td>
    <td align = "center"><a href = "home.php?pr=<?php echo $dat[$i]['idficha'] ?>&pac=<?php echo $pac; ?>&up=12"><input type="button" name="del" value="Editar"/></a>
    <a href = "home.php?pr=<?php echo $dat[$i]['idficha'] ?>&pac=815&up=12"><input type="button" name="comp" value="Competencia"/></a>
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
    function fnValidarPrograma(num_ficha){
        var postForm = { //Fetch form data
            'datos'  : num_ficha,
            'funcion' : 'ficha'
        };
        $.ajax({
        url: "controlador/ajaxcPrograma.php",
        type: "post",
        data: postForm,
        success: function(response){
            //alert("success");
            $("#resultado").html(response);
            var val=$.trim(response);
            if(val!= ""){
                $("#divmsg").css({'display':'block',});
                $("#idficha").focus();
                $("#idficha").select();
            }else
                $("#divmsg").css({'display':'none',});
        },
        error:function(){
            alert("failure");
            $("#result").html('There is error while submit');
        }
    });
    }
</script>

<script>
    function fnValidarFechas(){
      var fmin = $("#fecha_inicio").val();
      $("#fecha_fin").attr({"min" : fmin});
    }
</script>