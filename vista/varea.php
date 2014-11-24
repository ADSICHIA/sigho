<?php
include ("controlador/carea.php");
?>

<div>
<br/>
<br/>
<h3>INGRESAR &Aacute;REA</h3>

<form name="area" action="" method="post">
	<label for= "area">&Aacute;rea &nbsp;&nbsp;&nbsp;</label>
    <input type="text" id="area" class="form-control" name="area" required="required" onblur="fnValidarPrograma(this.value)">
    <div id="divmsg" style = "display:none"><span id='resultado' style='color:red'><strong><?php echo is_null($mensaje)?'':$mensaje;?></strong></span><br/></div>
    <br/><label for="usuarioid">Usuario a Cargo&nbsp;&nbsp;&nbsp;</label>
     <select class="form-control" id="usuarioid" name="usuarioid" required="required">
    <option value="0" selected="selected"> Seleccione </option>
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

<br/>
<br/>
<div class="table-responsive">
<h3>&Aacute;REAS ACTIVAS</h3>
<div align="right"><table width="650"><tr>
    <td>
        <form id="formfil" name="formfil" method="GET" action="home.php">
            <input name="pac" type="hidden" value="<?php echo $pac; ?>" />
            &Aacute;rea
            <input type="text" name="filtro" value="<?php echo $filtro;?>" onChange="this.form.submit();">
            <input id="boton2" type="submit" name="busca" value="Buscar" />
        </form>
    </td>
    <td align="right" valign="bottom">
        <?php
            $bo = "<input type='hidden' name='filtro' value='".$filtro."' />";
            $pag->spag($conp,$nreg,$pac,$bo); 
            $dat=$ins->selArea2($filtro, $pag->rvalini(), $pag->rvalfin());
        ?>
    </td>
</tr></table></div>
<br/>
<form  name="form2" method="get" action="home.php?pac=104" onSubmit="return confirm('¿Desea eliminar?')">
<table class="table table-bordered table-hover table-striped">
<thead>
<tr>
<th>No &Aacute;rea</th>
<th>&Aacute;rea</th>
<th>Usuario a Cargo</th>
<th>Acciones</th>
</tr>
</thead>
<tbody>
<input name="pac" type="hidden" id="pac" value="104"/>  
<?php 
for($i = 0; $i<count($dat); $i++){
 ?>
 <tr>
    <td><?php echo$dat[$i]['idarea']?></td>
    <td><?php echo $dat[$i]['area']?></td>
    <td><?php echo $dat[$i]['nombres']." ".$dat[$i]['apellidos']?></td>
    <td align = "center"><a href = "home.php?pr=<?php echo $dat[$i]['idarea'] ?>&pac=<?php echo $pac; ?>&up=13"><input type="button" name="del" value="Editar"/></a>
    <a href = "home.php?del=<?php echo $dat[$i]['idprograma'] ?>&pac=<?php echo $pac; ?>"><button value="<?php echo$dat[$i]['idarea']?>" name="del">Eliminar</button></a></td>
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
    function fnValidarPrograma(area){
        var postForm = { //Fetch form data
            'datos'  : area,
            'funcion' : 'area'
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
                $("#area").focus();
                $("#area").select();
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