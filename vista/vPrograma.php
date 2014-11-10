<?php
include ("controlador/cPrograma.php");
?>

<div>
<h3>INGRESAR PROGRAMA</h3>

<form name="programa" action="" method="post">     
<label for="idprograma">Identificador del Programa&nbsp;&nbsp;&nbsp;</label>     
<input type="text" id="idprograma" class="form-control" onblur="fnValidarPrograma(this.value)" name="idprograma" required="required" pattern="[0-9][0-9]{1,10}" oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Debe Ingresar Solo N&uacute;meros')">
<div id="divmsg" style = "display:none"><span id='resultado' style='color:red'><strong><?php echo is_null($mensaje)?'':$mensaje;?></strong></span><br/></div>
<br/><label for="programa">Descripci&oacute;n del Programa&nbsp;&nbsp;&nbsp;</label>     
<input class="form-control" type="text" name="programa" id="programa" required="required" ><br/>
<label for="version">Versi&oacute;n del Programa&nbsp;&nbsp;&nbsp;</label>
<input class="form-control" type="text" name="version" id="version" required="required" pattern ="[0-9]+([\.|,][0-9]+)?" oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Debe Ingresar Solo N&uacute;meros')" /><br/>
<label for="areaid">Area a la que pertenece el Programa</label>
<select class="form-control" id="areaid" name="areaid" required="required">
     <option value="" selected="selected">Seleccione </option>
<?php for($i = 0; $i<count($area); $i++){  ?>     
<option value="<?php echo $area[$i]['idarea']; ?>"> <?php echo $area[$i]['area']; ?></option>     
<?php         }     ?>     
</select><br/>     
<input type="submit" value="Guardar" class="btn btn-default">
<label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>     
<a href="home.php"><input type="button" value="Cancelar" class="btn btn-default"></a>

    
</form>
</div>

<br/>
<br/>


<div class="table-responsive">
<h3>PROGRAMAS ACTIVOS</h3>

<br/>
<div align="right"><table width="650"><tr>
    <td>
        <form id="formfil" name="formfil" method="GET" action="home.php">
            <input name="pac" type="hidden" value="<?php echo $pac; ?>" />
            No. Programa
            <input type="text" name="filtro" value="<?php echo $filtro;?>" onChange="this.form.submit();">
            <input id="boton2" type="submit" name="busca" value="Buscar" />
        </form>
    </td>
    <td align="right" valign="bottom">
        <?php
            $bo = "<input type='hidden' name='filtro' value='".$filtro."' />";
            $pag->spag($conp,$nreg,$pac,$bo); 
            $dat=$ins->selpro2($filtro, $pag->rvalini(), $pag->rvalfin());
        ?>
    </td>
</tr></table></div>
<br/>
<br/>
<form name="tablaPrograma" action="" method="GET" onSubmit="return confirm('¿Desea eliminar?')">
<table class="table table-bordered table-hover table-striped">
<thead>
<tr>
<th>Identificador</th>
<th>Descripci&oacute;n</th>
<th>Versi&oacute;n</th>
<th>Area</th>
<th>Acciones</th>
</tr>
</thead>
<tbody>
<input name="pac" type="hidden" id="pac" value="106"/>
<?php 
for($i = 0; $i<count($dat); $i++){
 ?>
 <tr>
    <td align = "left"><?php echo $dat[$i]['idprograma'] ?></td>
    <td><?php echo $dat[$i]['programa']?></td>
    <td><?php echo $dat[$i]['version']?></td>
    <td><?php echo $tabla[$i]['area']?></td>
    <td align = "center"><a href = "home.php?pr=<?php echo $dat[$i]['idprograma'] ?>&pac=<?php echo $pac; ?>&up=11"><input type="button" name="del" value="Editar"/></a>
    <a href = "home.php?del=<?php echo $dat[$i]['idprograma'] ?>&pac=<?php echo $pac; ?>"><button value="<?php echo $dat[$i]['idprograma'] ?>" name="del">Eliminar</button></a></td>
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
<script>
    function fnValidarPrograma(num_programa){
        var postForm = { //Fetch form data
            'datos'  : num_programa,
            'funcion' : 'programa'
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
                $("#idprograma").focus();
                $("#idprograma").select();
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