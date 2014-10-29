<?php
include_once ("controlador/cgrupo.php");
?>
<center>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Grupos</h3>
                </div>
                <div class="panel-body">

                    <form name="frm_grupo" action="" method="post" onSubmit="return confirm('Por  favor primero  verifique  los datos ingresados  antes de hacer clic en  !aceptar!')"  >
                        <fieldset> 
                            
                                <div class="form-group">
                                    <input class="form-control" placeholder="nombre grupo" name="nombre" maxlength="45" type="text" required="required">
                                </div>
                            <div class="form-group">
                                    <select name="director" required class="form-control" >
                  <option value>Director</option>
       
       <?php 
		
		for ($i=0; $i < count($seldirector); $i++){
		
		?>
       
         <option value=" <?php 	echo $seldirector[$i]['idusuario'] ?>" /> <?php echo $seldirector[$i]['identificacion'] ?> <?php echo $seldirector[$i]['nombres'] ?> </option>
		
		 <?php } ?>
			
	   </select>
                                
                                </div>
                                 <div class="form-group">
                                    <select name="ambiente" required class="form-control" >
                  <option value>Ambiente</option>
       
       <?php 
		
		for ($i=0; $i < count($selambiente); $i++){
		
		?>
       
         <option value=" <?php 	echo $selambiente[$i]['idambiente'] ?>" /> <?php echo $selambiente[$i]['ambiente'] ?> </option>
		
		 <?php } ?>
			
	   </select>
                                
                                </div>
                             <a href="#" onclick="frm_grupo.submit();" class="btn btn-lg btn-success btn-block">Guardar</a>
                            
                            
                              
                        </fieldset> 

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<form id="form2" name="form2" method="GET" action="" onSubmit="return confirm('Desea eliminar?')">

    <div align="center" id="tabint">
        <table width="700" border="1" cellspacing="0" cellpadding="5">


            <tr>
                <th class="style1" align="center" width="80">No.ruta<input name="acceso" type="hidden" id="acceso" value="102" /></th>


                <th class="style1" align="center" width="120">Placa del veh&iacute;culo</th>
                <th class="style1" align="center" width="120">N&uacute;mero de puestos</th>
                <th class="style1" align="center" width="400">Conductor</th> 
                <th class="style1" align="center" width="160">Marca</th>
                <th class="style1" align="center" width="120">Modelo</th> 
                <th class="style1" align="center" width="160">Editar</th>
            </tr>
            <?php
//Select
//echo json_encode ($datos);
            for ($i = 0; $i < count($datos); $i++) {
                ?>
                <tr>

                    <td class="style2" align="center"><input type="submit" name="del" value= <?php echo $datos[$i]['idruta'] ?>></td>

                    <td class="style2" align="left"> <?php echo $datos[$i]['placa'] ?></td>  
                    <td class="style2" align="left"> <?php echo $datos[$i]['npuesto'] ?></td> 
                    <td class="style2" align="left"> <?php echo $datos[$i]['idconductor'] ?> <?php echo $datos[$i]['nombre'] ?> <?php echo $datos[$i]['apellido'] ?></td>
                    <td class="style2" align="left"> <?php echo $datos[$i]['marca'] ?></td>
                    <td class="style2" align="left"> <?php echo $datos[$i]['modelo'] ?></td>



                    <td align="center"><a href="home.php?pr=<?php echo $datos[$i]['idruta'] ?>&acceso=102&up=34"><img border=0 src="image/editar.png" width="16" height="16" /></a></td>

                </tr>
            <?php } ?>

            <tr>
                <td colspan=17 class="style2">Para eliminar presione el n&uacute;mero del c&oacute;digo.</td>
            </tr>
        </table>
        <p>&nbsp; </p>
    </div>
</form>

</center>